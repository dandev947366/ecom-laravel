const axios = require('axios');
const cheerio = require('cheerio'); // For parsing HTML

describe('Permission Creation', () => {
  const baseUrl = 'http://127.0.0.1:8000';
  let csrfToken;

  beforeAll(async () => {
    try {
      // Fetch the page where the CSRF token is embedded
      const response = await axios.get(`${baseUrl}/permissions/create`);
      const $ = cheerio.load(response.data);
      csrfToken = $('meta[name="csrf-token"]').attr('content');
    } catch (error) {
      console.error('Error fetching CSRF token:', error.response ? error.response.data : error.message);
      throw error;
    }
  });

  test('should create a permission successfully', async () => {
    try {
      // Make a POST request to create a permission
      const createResponse = await axios.post(
        `${baseUrl}/permissions`,
        { name: 'Test Permission' },
        {
          headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
          },
          withCredentials: true
        }
      );

      const permissionsResponse = await axios.get(`${baseUrl}/permissions`);
      const permissions = permissionsResponse.data;
      expect(permissions).toContainEqual(expect.objectContaining({ name: 'Test Permission' }));
    } catch (error) {
      console.error('Error creating permission:', error.response ? error.response.data : error.message);
      throw error;
    }
  });
});
