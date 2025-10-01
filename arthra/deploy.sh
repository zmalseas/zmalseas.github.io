#!/bin/bash

# Nerally WordPress Blog Deployment Script
# Χρήση: ./deploy.sh

echo "🚀 Nerally WordPress Blog Deployment"
echo "=================================="

# Check if WordPress core files exist
if [ ! -f "wp-blog-header.php" ]; then
    echo "❌ WordPress core files not found!"
    echo "📥 Please download WordPress core files first:"
    echo "   wget https://wordpress.org/latest.tar.gz"
    echo "   tar -xzf latest.tar.gz --strip-components=1"
    echo "   rm latest.tar.gz"
    exit 1
fi

# Set file permissions
echo "🔧 Setting file permissions..."
find . -type d -exec chmod 755 {} \;
find . -type f -exec chmod 644 {} \;
chmod 600 wp-config.php 2>/dev/null || echo "⚠️ wp-config.php not found - create from wp-config-sample.php"

# Create wp-config.php if it doesn't exist
if [ ! -f "wp-config.php" ]; then
    echo "📝 Creating wp-config.php from sample..."
    cp wp-config-sample.php wp-config.php
    echo "⚠️ Remember to edit wp-config.php with your database settings!"
fi

# Create uploads directory if it doesn't exist
if [ ! -d "wp-content/uploads" ]; then
    echo "📁 Creating uploads directory..."
    mkdir -p wp-content/uploads
    chmod 755 wp-content/uploads
fi

# Check theme files
if [ ! -d "wp-content/themes/nerally-theme" ]; then
    echo "❌ Nerally theme not found!"
    exit 1
else
    echo "✅ Nerally theme found"
fi

# Validate .htaccess
if [ ! -f ".htaccess" ]; then
    echo "⚠️ .htaccess not found - WordPress permalinks may not work"
else
    echo "✅ .htaccess found"
fi

echo ""
echo "✅ Deployment preparation complete!"
echo ""
echo "📋 Next steps:"
echo "1. Upload all files to your hosting server"
echo "2. Create MySQL database 'nerally_blog'"
echo "3. Edit wp-config.php with database credentials"
echo "4. Visit https://yourdomain.com/arthra/wp-admin/install.php"
echo "5. Activate the 'Nerally Blog Theme'"
echo ""
echo "📚 For detailed instructions, see INSTALLATION_GUIDE.md"