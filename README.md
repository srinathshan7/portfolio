# Laravel Portfolio Project

A modern, responsive portfolio website built with Laravel, Bootstrap, and jQuery. This project allows you to showcase your skills, projects, and personal information in a professional manner.

## Features

- **Responsive Design**: Built with Bootstrap 5 for mobile-first responsive design
- **Admin Panel**: Complete CRUD operations for managing profile, skills, and projects
- **File Upload**: Support for profile photos and project images
- **Contact Form**: Interactive contact form with jQuery validation
- **Modern UI**: Clean and professional design with smooth animations
- **Authentication**: Laravel Breeze authentication system

## Sections

1. **Hero Section**: Introduction with profile photo and call-to-action buttons
2. **About Section**: Personal information and key features
3. **Skills Section**: Technical skills with progress bars
4. **Projects Section**: Portfolio projects with images and links
5. **Contact Section**: Contact form for visitors

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd portfolio
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed --class=PortfolioSeeder
   ```

5. **Storage setup**
   ```bash
   php artisan storage:link
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

## Usage

### Frontend
- Visit `http://localhost:8000` to view the portfolio
- Navigate through different sections using the navigation menu
- Use the contact form to send messages

### Admin Panel
- Register/Login at `http://localhost:8000/register` or `http://localhost:8000/login`
- Access the dashboard at `http://localhost:8000/dashboard`
- Manage your portfolio content:
  - **Profile**: Update personal information, bio, and profile photo
  - **Skills**: Add/edit skills with percentage levels
  - **Projects**: Add/edit projects with descriptions, links, and images

## Admin Features

### Profile Management
- Update name, tagline, and bio
- Upload profile photo (recommended: 400x400px)
- Real-time image preview

### Skills Management
- Add technical skills with proficiency levels (0-100%)
- Interactive slider for setting skill percentages
- Visual progress bars

### Projects Management
- Add project details (title, description, link)
- Upload project images (recommended: 800x600px)
- Link to live demos or GitHub repositories

## File Structure

```
resources/views/
├── welcome.blade.php          # Portfolio homepage
├── dashboard.blade.php        # Admin dashboard
├── layouts/
│   ├── app.blade.php         # Main layout with Bootstrap
│   └── navigation.blade.php  # Navigation component
└── admin/
    ├── profiles/             # Profile management views
    ├── skills/              # Skills management views
    └── projects/            # Projects management views
```

## Technologies Used

- **Backend**: Laravel 12, PHP 8.2+
- **Frontend**: Bootstrap 5, jQuery 3.7
- **Database**: SQLite (default), MySQL/PostgreSQL supported
- **Authentication**: Laravel Breeze
- **File Storage**: Laravel Storage with public disk

## Customization

### Styling
- Modify CSS in `resources/views/layouts/app.blade.php`
- Update Bootstrap classes for different color schemes
- Customize animations and transitions

### Content
- Update sample data in `database/seeders/PortfolioSeeder.php`
- Modify text content in Blade templates
- Add new sections as needed

### Features
- Extend models with additional fields
- Add new admin sections for blog, testimonials, etc.
- Integrate with external APIs (GitHub, LinkedIn, etc.)

## Deployment

1. **Production environment setup**
   ```bash
   composer install --optimize-autoloader --no-dev
   npm run build
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

2. **Database setup**
   ```bash
   php artisan migrate --force
   ```

3. **File permissions**
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support and questions, please open an issue in the repository or contact the maintainer.

---

**Happy coding! 🚀**
