## WordPress Facebook Timestamp (WPFBTimestamp)
A FaceBook inspired "Time Ago" time stamp plugin. Examples: "Yesterday at 1:42pm", "About an hour ago", "August 14 at 4:00am", and more! It automagically selects to display more/less data depending on how recent the post was.

## Installation
To install the plugin, download the zipball from GitHub and unzip. Upload the `WPFBTimestamp` folder to `wp/wp-content/plugins/`

## Usage
To use WPFBTimestamp simply insert this code into your WordPress theme where you'd like the timestamp to appear: `<?php if (function_exists("wpfbts")) print_r(wpfbts(get_the_time('U')));?>`


~Current Version:1.2.3~