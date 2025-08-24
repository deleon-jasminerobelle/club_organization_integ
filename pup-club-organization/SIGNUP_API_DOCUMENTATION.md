# Signup API Documentation

## Overview
This API endpoint allows users to sign up by validating their information and sending it to an external API for storage.

## Endpoint
**POST** `/api/signup`

## Request Headers
```http
Content-Type: application/json
Accept: application/json
X-API-Key: [Your API Key] (if required by external API)
```

## Request Body
The request body must be a JSON object with the following fields:

| Field | Type | Validation Rules | Description |
|-------|------|------------------|-------------|
| `email` | string | Required, valid email format | User's email address (must be unique) |
| `first_name` | string | Required, min 2 chars, letters only | User's first name |
| `last_name` | string | Required, min 2 chars, letters only | User's last name |
| `student_number` | string | Required | Student identification number (must be unique) |
| `program` | string | Required | Academic program/course name |
| `year` | string | Required, must be one of: `1st Year`, `2nd Year`, `3rd Year`, `4th Year` | Academic year level |
| `section` | integer | Required, between 1-10 | Class section number |
| `birthdate` | string (YYYY-MM-DD) | Required, valid date, age 15-100 years | User's birthdate |

## Example Request
```json
{
    "email": "jane.smith@example.com",
    "first_name": "Jane",
    "last_name": "Smith",
    "student_number": "2024-00567",
    "program": "Information Technology",
    "year": "2nd Year",
    "section": 3,
    "birthdate": "2004-08-22"
}
```

## Response

### Success Response (201 Created)
```json
{
    "success": true,
    "message": "Signup successful",
    "data": {
        // Response data from external API
    }
}
```

### Validation Error Response (422 Unprocessable Entity)
```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "field_name": ["Error message"],
        "email": ["The email field is required."]
    }
}
```

### External API Error Response (varies)
```json
{
    "success": false,
    "message": "Error message from external API"
}
```

### Server Error Response (500 Internal Server Error)
```json
{
    "success": false,
    "message": "Internal server error. Please try again later."
}
```

## Validation Rules Details

### Email
- Must be a valid email format
- Checked for uniqueness against external API

### First Name & Last Name
- Minimum 2 characters
- Only letters and spaces allowed (no numbers or special characters)
- Regex pattern: `/^[a-zA-Z\s]+$/`

### Student Number
- Required field
- Uniqueness checked against external API
- Length validation depends on admin configuration

### Program
- Required field
- Accepts any valid course/program name

### Year
- Must be one of the predefined values:
  - `1st Year`
  - `2nd Year`
  - `3rd Year`
  - `4th Year`

### Section
- Integer between 1 and 10 (inclusive)

### Birthdate
- Must be a valid date in YYYY-MM-DD format
- Age must be between 15 and 100 years
- Validation uses server's current date for calculation

## Usage Examples

### Using curl
```bash
curl -X POST http://localhost:8000/api/signup \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "email": "test@example.com",
    "first_name": "John",
    "last_name": "Doe",
    "student_number": "2024-00123",
    "program": "Computer Science",
    "year": "1st Year",
    "section": 1,
    "birthdate": "2005-01-15"
  }'
```

### Using JavaScript (fetch)
```javascript
const response = await fetch('http://localhost:8000/api/signup', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    },
    body: JSON.stringify({
        email: 'test@example.com',
        first_name: 'John',
        last_name: 'Doe',
        student_number: '2024-00123',
        program: 'Computer Science',
        year: '1st Year',
        section: 1,
        birthdate: '2005-01-15'
    })
});

const data = await response.json();
console.log(data);
```

## Environment Configuration

The API requires the following environment variables to be set in your `.env` file:

```env
API_URL=http://pupt-registration.site
API_KEY=your_api_key_here
```

## Error Handling

The API provides comprehensive error handling:
1. **Validation errors**: Returns detailed field-specific error messages
2. **External API errors**: Forwards error messages from the external API
3. **Network errors**: Returns generic error messages for connectivity issues
4. **Server errors**: Returns 500 status for internal server issues

## Logging

All signup attempts and API responses are logged for debugging purposes. Check your Laravel logs for:
- Signup attempt details
- External API responses
- Error messages and stack traces
