# Featured Post Guide

## Overview
You can now manually select which post appears as the featured article on the home page. **Only one post can be featured at a time** - this ensures a clean, focused home page experience.

## Important Rule: One Featured Post Only
- ✅ **Only one post can be featured at a time**
- ✅ **When you set a new featured post, all others are automatically unfeatured**
- ✅ **This rule applies to both admin panel and command line operations**
- ✅ **The system prevents duplicate featured posts**

## How to Set a Featured Post

### Method 1: Through Admin Panel (Recommended)
1. Go to **Admin Panel** → **Posts**
2. Click **Edit** on any post you want to feature
3. Check the **"Featured Post (Show on Home Page)"** checkbox
4. Click **Update**
5. The post will now appear as the featured article on the home page
6. **All other posts will automatically be unfeatured**

### Method 2: Through Command Line
```bash
# List all featured posts
php artisan posts:featured list

# Set a post as featured (replace 1 with the actual post ID)
php artisan posts:featured set 1

# Remove featured status from a post
php artisan posts:featured unset 1

# Fix any duplicate featured posts (if they exist)
php artisan posts:fix-featured
```

## How It Works
- **Automatic management** - when you set a new featured post, the previous one is automatically unfeatured
- **Featured posts must be published** - draft posts won't appear on the home page even if marked as featured
- **Fallback behavior** - if no post is marked as featured, the home page will show the latest published post
- **Automatic cache clearing** - the home page cache is automatically updated when you change featured posts

## Admin Panel Features
- **Featured column** in the posts list shows which posts are currently featured (⭐ Featured badge)
- **Featured checkbox** in create/edit forms allows easy selection
- **Visual indicators** help you quickly identify featured content
- **Automatic unfeaturing** - when you check the featured box, all other posts are automatically unchecked

## Troubleshooting Commands
```bash
# Check current featured posts
php artisan posts:featured list

# Fix any duplicate featured posts
php artisan posts:fix-featured

# Clear cache if needed
php artisan cache:clear
```

## Best Practices
1. **Choose high-quality content** - featured posts get prime visibility
2. **Use compelling images** - the featured image is prominently displayed
3. **Keep it current** - update the featured post regularly to keep content fresh
4. **Consider timing** - feature posts that are relevant to current events or trends
5. **One at a time** - remember, only one post can be featured at any given time

## Troubleshooting
- **Post not showing on home page?** Make sure it's published and marked as featured
- **Multiple featured posts?** Run `php artisan posts:fix-featured` to fix this
- **Cache issues?** Run `php artisan cache:clear` to refresh the cache
- **Check featured status?** Use `php artisan posts:featured list` to see current featured posts 