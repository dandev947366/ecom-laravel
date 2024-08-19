const axios = require('axios');
const cheerio = require('cheerio'); // For parsing HTML

describe('CSRF Token Test', () => {
  const baseUrl = 'http://127.0.0.1:8000'; // Ensure this is the correct URL for your application
  let csrfToken;

  beforeAll(async () => {
    try {
      // Fetch the page where the CSRF token is embedded
      const response = await axios.get(`${baseUrl}/test-csrf-form`);
      const $ = cheerio.load(response.data);
      csrfToken = $('meta[name="csrf-token"]').attr('content');
    } catch (error) {
      console.error('Error fetching CSRF token:', error.response ? error.response.data : error.message);
      throw error;
    }
  });

  test('should post data with CSRF token', async () => {
    try {
      // Make a POST request to submit data with CSRF token
      const postResponse = await axios.post(
        `${baseUrl}/test-csrf`,
        { name: 'Test Name' },
        {
          headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json',
          },
          withCredentials: true,
        }
      );

      expect(postResponse.status).toBe(200); // Adjust based on expected response
      expect(postResponse.data.success).toBe(true);
    } catch (error) {
      console.error('Error posting data:', error.response ? error.response.data : error.message);
      throw error;
    }
  });
});
