<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category Wordpress
        $wpTitle1 = "How to install Wordpress";
        $wpTitle2 = 'How to choose a good host';
        $wpTitle3 = 'Wordpress Dashboard Tutorial';
        $wpTitle4 = 'How to choose good theme for blog';
        $wpTitle5 = 'Best 5 plugins you should use on wordpress';
        $wpTitle6 = 'Create a form using wordpress';

        $wp1 = [
            'title' => $wpTitle1,
            'img' => 'uploads/posts/wp1.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '5',
            'user_id' => '1',
            'slug' => Str::slug($wpTitle1)
        ];

        $wp2 = [
            'title' => $wpTitle2,
            'img' => 'uploads/posts/wp2.png',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '5',
            'user_id' => '2',
            'slug' => Str::slug($wpTitle2)
        ];

        $wp3 = [
            'title' => $wpTitle3,
            'img' => 'uploads/posts/wp3.png',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '5',
            'user_id' => '1',
            'slug' => Str::slug($wpTitle3)
        ];

        $wp4 = [
            'title' => $wpTitle4,
            'img' => 'uploads/posts/wp4.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '5',
            'user_id' => '2',
            'slug' => Str::slug($wpTitle4)
        ];

        $wp5 = [
            'title' => $wpTitle5,
            'img' => 'uploads/posts/wp5.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '5',
            'user_id' => '1',
            'slug' => Str::slug($wpTitle5)
        ];

        $wp6 = [
            'title' => $wpTitle6,
            'img' => 'uploads/posts/wp6.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '5',
            'user_id' => '2',
            'slug' => Str::slug($wpTitle6)
        ];

        Post::create($wp1);
        Post::create($wp2);
        Post::create($wp3);
        Post::create($wp4);
        Post::create($wp5);
        Post::create($wp6);

        // Category Javascript
        $jsTitle1 = 'How to console.log javascript';
        $jsTitle2 = 'How to change style using JS';
        $jsTitle3 = 'Best javascript libraries can use to project';
        $jsTitle4 = 'Remove Elements Using Javascript';
        $jsTitle5 = 'Javascript OOP Tutorial for bigginer';
        $jsTitle6 = 'Animate Elements Using Javascript';

        $js1 = [
            'title' => $jsTitle1,
            'img' => 'uploads/posts/js1.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '3',
            'user_id' => '1',
            'slug' => Str::slug($jsTitle1)
        ];

        $js2 = [
            'title' => $jsTitle2,
            'img' => 'uploads/posts/js2.png',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '3',
            'user_id' => '2',
            'slug' => Str::slug($jsTitle2)
        ];

        $js3 = [
            'title' => $jsTitle3,
            'img' => 'uploads/posts/js3.png',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '3',
            'user_id' => '1',
            'slug' => Str::slug($jsTitle3)
        ];

        $js4 = [
            'title' => $jsTitle4,
            'img' => 'uploads/posts/js4.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '3',
            'user_id' => '2',
            'slug' => Str::slug($jsTitle4)
        ];

        $js5 = [
            'title' => $jsTitle5,
            'img' => 'uploads/posts/js5.png',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '3',
            'user_id' => '1',
            'slug' => Str::slug($jsTitle5)
        ];

        $js6 = [
            'title' => $jsTitle6,
            'img' => 'uploads/posts/js6.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '3',
            'user_id' => '2',
            'slug' => Str::slug($jsTitle6)
        ];

        Post::create($js1);
        Post::create($js2);
        Post::create($js3);
        Post::create($js4);
        Post::create($js5);
        Post::create($js6);

        // Category Php
        $phpTitle1 = 'PHP Tutorial for beginner';
        $phpTitle2 = 'Best PHP Frameworks in 2020';
        $phpTitle3 = 'How to change PHP version on xamp';
        $phpTitle4 = 'PHP Array Tutorial for beginner';
        $phpTitle5 = 'How to secure your website using PHP';
        $phpTitle6 = 'PHP Functional Programming Tutorial';

        $php1 = [
            'title' => $phpTitle1,
            'img' => 'uploads/posts/php1.png',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '1',
            'user_id' => '1',
            'slug' => Str::slug($phpTitle1)
        ];

        $php2 = [
            'title' => $phpTitle2,
            'img' => 'uploads/posts/php2.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '1',
            'user_id' => '2',
            'slug' => Str::slug($phpTitle2)
        ];

        $php3 = [
            'title' => $phpTitle3,
            'img' => 'uploads/posts/php3.png',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '1',
            'user_id' => '1',
            'slug' => Str::slug($phpTitle3)
        ];

        $php4 = [
            'title' => $phpTitle4,
            'img' => 'uploads/posts/php4.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '1',
            'user_id' => '2',
            'slug' => Str::slug($phpTitle4)
        ];

        $php5 = [
            'title' => $phpTitle5,
            'img' => 'uploads/posts/php5.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '1',
            'user_id' => '1',
            'slug' => Str::slug($phpTitle5)
        ];

        $php6 = [
            'title' => $phpTitle6,
            'img' => 'uploads/posts/php6.png',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id aliquet risus feugiat in ante. Nulla facilisi etiam dignissim diam quis enim lobortis. Massa ultricies mi quis hendrerit. Morbi leo urna molestie at elementum eu. Sed viverra tellus in hac. Convallis tellus id interdum velit laoreet id donec. At urna condimentum mattis pellentesque id nibh tortor id aliquet. Lectus mauris ultrices eros in cursus. Vel facilisis volutpat est velit egestas dui. Vel turpis nunc eget lorem. Massa enim nec dui nunc mattis enim ut tellus.',
            'category_id' => '1',
            'user_id' => '2',
            'slug' => Str::slug($phpTitle6)
        ];

        Post::create($php1);
        Post::create($php2);
        Post::create($php3);
        Post::create($php4);
        Post::create($php5);
        Post::create($php6);

    }
}
