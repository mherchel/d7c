Encoding.default_external = "utf-8"

# Require any additional compass plugins here.
require 'toolkit'
require 'susy'
require 'breakpoint'
require 'sass-globbing'
require 'singularitygs'

# Set this to the root of your project when deployed:
http_path = "/sites/all/themes/bluecheese/"
css_dir = "css"
sass_dir = "sass"
images_dir = "images"
javascripts_dir = "js"

# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed

# To enable relative paths to assets via compass helper functions. Uncomment:
relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
line_comments = false

# Disable cache busting on image assets
asset_cache_buster :none

# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass
