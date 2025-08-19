# PUP Club Organization Database Setup Guide

## Overview
This guide provides step-by-step instructions to set up the database for your PUP (Polytechnic University of the Philippines) club organization system.

## Database Structure Created

### Tables Created:
1. **categories** - Organization categories for filtering
2. **organizations** - Club/organization information
3. **roles** - Member roles (President, Secretary, etc.)
4. **organization_user** - Pivot table for member relationships
5. **news** - News & announcements
6. **events** - Events calendar
7. **media** - Gallery/media files

## Setup Instructions

### 1. Configure Database Connection
Update your `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pup_club_organization
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 2. Run Migrations
Execute these commands in order:

```bash
# Navigate to project directory
cd pup-club-organization

# Run all migrations
php artisan migrate
```

### 3. Seed Initial Data (Optional)
Create a seeder for initial data:

```bash
php artisan make:seeder ClubOrganizationSeeder
```

### 4. Test Database Connection
```bash
php artisan tinker
>>> \App\Models\Organization::count()
```

## Database Schema Relationships

### Organization → Users (Many-to-Many)
- Organizations have many members through organization_user pivot
- Users can belong to multiple organizations

### Organization → News (One-to-Many)
- Each organization can have multiple news/announcements

### Organization → Events (One-to-Many)
- Each organization can have multiple events

### Organization → Media (One-to-Many)
- Each organization can have multiple media files

### User → Role (Many-to-One)
- Each user has a specific role in an organization

## Key Features Supported

✅ **News & Announcements** - news table
✅ **Events Calendar** - events table with datetime fields
✅ **Gallery/Media** - media table with file management
✅ **Role assignments** - roles table + organization_user pivot
✅ **Organization List** - organizations table
✅ **Search & Filter** - categories table + indexed columns

## Sample Queries

### Get all organizations with their members
```php
$organizations = \App\Models\Organization::with(['users', 'category'])->get();
```

### Get upcoming events for an organization
```php
$events = \App\Models\Event::where('organization_id', 1)
    ->where('start_datetime', '>', now())
    ->orderBy('start_datetime')
    ->get();
```

### Get organization members with their roles
```php
$members = \App\Models\Organization::find(1)
    ->users()
    ->withPivot('role_id')
    ->get();
```

## Next Steps
1. Run the migrations
2. Create seeders for initial data
3. Set up API endpoints
4. Create frontend components
