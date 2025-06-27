# Contributing to KP Daily Log

Thank you for your interest in contributing to KP Daily Log! This document provides guidelines for contributing to this project.

## 🤝 Ways to Contribute

- 🐛 **Bug Reports**: Report bugs via GitHub Issues
- ✨ **Feature Requests**: Suggest new features or improvements
- 📝 **Documentation**: Improve or add documentation
- 💻 **Code Contributions**: Submit pull requests for bug fixes or features
- 🎨 **Design**: Contribute to UI/UX improvements
- 🧪 **Testing**: Help improve test coverage

## 🚀 Getting Started

### Prerequisites

- PHP >= 8.2
- Composer >= 2.0
- Node.js >= 18.x
- NPM >= 9.x
- Git

### Development Setup

1. **Fork the repository**
   ```bash
   # Click the "Fork" button on GitHub
   ```

2. **Clone your fork**
   ```bash
   git clone https://github.com/yourusername/KP-Daily.git
   cd KP-Daily
   ```

3. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

4. **Set up environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   php artisan migrate
   ```

5. **Start development server**
   ```bash
   php artisan serve
   npm run dev
   ```

## 📋 Development Guidelines

### Code Style

- **PHP**: Follow PSR-12 coding standards
- **Laravel**: Follow Laravel conventions and best practices
- **JavaScript**: Use modern ES6+ syntax
- **CSS**: Use TailwindCSS utility classes
- **Blade**: Keep templates clean and readable

### Naming Conventions

- **Files**: kebab-case for Blade templates
- **Classes**: PascalCase
- **Methods**: camelCase
- **Variables**: camelCase
- **Constants**: UPPER_SNAKE_CASE

### Design System

- **Colors**: Stick to purple/blue/pink gradient palette
- **Components**: Use glass morphism design
- **Shadows**: Use `shadow-lg` for performance
- **Animations**: Keep duration to 0.15s max
- **Spacing**: Follow TailwindCSS spacing scale

### Glass Morphism Guidelines

```css
/* Use this class for containers */
.glass-container {
    @apply backdrop-blur-sm bg-white/10 border border-white/20 rounded-xl;
}

/* Color palette */
Purple gradient: from-purple-500 to-pink-500
Blue gradient: from-blue-500 to-cyan-500
Green gradient: from-green-400 to-emerald-500
```

## 🔧 Making Changes

### Branch Naming

- `feature/description` - for new features
- `bugfix/description` - for bug fixes
- `hotfix/description` - for urgent fixes
- `docs/description` - for documentation
- `refactor/description` - for refactoring

### Commit Messages

Use conventional commit format:

```
type(scope): description

[optional body]

[optional footer]
```

**Types:**
- `feat`: new feature
- `fix`: bug fix
- `docs`: documentation
- `style`: formatting, missing semicolons, etc.
- `refactor`: code change that neither fixes a bug nor adds a feature
- `test`: adding missing tests
- `chore`: maintain

**Examples:**
```
feat(dashboard): add real-time progress tracking
fix(auth): resolve login redirect issue
docs(readme): update installation instructions
style(profile): improve glass morphism consistency
```

### Testing

Before submitting a PR:

```bash
# Run PHP tests
php artisan test

# Check for code style issues
./vendor/bin/pint --test

# Build assets
npm run build

# Test in browser
php artisan serve
```

## 📤 Submitting Changes

### Pull Request Process

1. **Create a feature branch**
   ```bash
   git checkout -b feature/amazing-feature
   ```

2. **Make your changes**
   ```bash
   # Make changes
   git add .
   git commit -m "feat: add amazing feature"
   ```

3. **Push to your fork**
   ```bash
   git push origin feature/amazing-feature
   ```

4. **Create Pull Request**
   - Go to GitHub and create a PR
   - Use the PR template
   - Link any related issues

### Pull Request Template

```markdown
## Description
Brief description of changes

## Type of Change
- [ ] Bug fix
- [ ] New feature
- [ ] Breaking change
- [ ] Documentation update

## Testing
- [ ] Tests pass
- [ ] Manual testing completed
- [ ] UI/UX reviewed

## Screenshots (if applicable)
Add screenshots here

## Checklist
- [ ] Code follows style guidelines
- [ ] Self-review completed
- [ ] Documentation updated
```

## 🐛 Bug Reports

### Bug Report Template

```markdown
**Describe the bug**
A clear description of what the bug is.

**To Reproduce**
Steps to reproduce the behavior:
1. Go to '...'
2. Click on '....'
3. Scroll down to '....'
4. See error

**Expected behavior**
What you expected to happen.

**Screenshots**
If applicable, add screenshots.

**Environment:**
- OS: [e.g. Windows 10]
- Browser: [e.g. Chrome 91]
- PHP Version: [e.g. 8.2]
- Laravel Version: [e.g. 11.x]

**Additional context**
Any other context about the problem.
```

## ✨ Feature Requests

### Feature Request Template

```markdown
**Is your feature request related to a problem?**
A clear description of what the problem is.

**Describe the solution you'd like**
A clear description of what you want to happen.

**Describe alternatives you've considered**
Any alternative solutions or features considered.

**Additional context**
Any other context or screenshots about the feature request.
```

## 🎨 Design Contributions

### UI/UX Guidelines

- Maintain glass morphism aesthetic
- Keep performance in mind (avoid heavy effects)
- Ensure mobile responsiveness
- Follow accessibility best practices
- Use consistent spacing and typography

### Asset Guidelines

- Use SVG icons when possible
- Optimize images for web
- Follow color palette guidelines
- Maintain visual hierarchy

## 📚 Documentation

### Documentation Style

- Use clear, concise language
- Include code examples
- Add screenshots for UI changes
- Keep README.md updated
- Update CHANGELOG.md for releases

## ❓ Questions?

If you have questions about contributing:

1. Check existing GitHub Issues
2. Read this contributing guide
3. Create a new Issue with the "question" label
4. Join our discussions at [KP-Daily](https://github.com/Jezz76/KP-Daily)

## 🏆 Recognition

Contributors will be recognized in:
- README.md contributors section
- Release notes
- GitHub contributors graph

Thank you for helping make KP Daily Log better! 🚀

---

## 👨‍💻 Maintainer

**Jeskris** - [@Jezz76](https://github.com/Jezz76)
