<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf997b9f772caf6cd660a44e3dc61cce1
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'cornelius\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'cornelius\\' => 
        array (
            0 => __DIR__ . '/../..' . '/config',
        ),
    );

    public static $classMap = array (
        'cornelius\\Init' => __DIR__ . '/../..' . '/config/init.php',
        'cornelius\\api\\Customizer' => __DIR__ . '/../..' . '/config/api/customizer.php',
        'cornelius\\api\\Settings' => __DIR__ . '/../..' . '/config/api/settings.php',
        'cornelius\\api\\callback\\SocialMediaCallbacks' => __DIR__ . '/../..' . '/config/api/callback/socialMediaCallbacks.php',
        'cornelius\\core\\CPT' => __DIR__ . '/../..' . '/config/core/cpt.php',
        'cornelius\\core\\Post' => __DIR__ . '/../..' . '/config/core/post.php',
        'cornelius\\core\\Widgets' => __DIR__ . '/../..' . '/config/core/widgets.php',
        'cornelius\\custom\\ACFLoader' => __DIR__ . '/../..' . '/config/custom/acfLoader.php',
        'cornelius\\custom\\AMP' => __DIR__ . '/../..' . '/config/custom/amp.php',
        'cornelius\\custom\\Contact' => __DIR__ . '/../..' . '/config/custom/contact.php',
        'cornelius\\custom\\ThemeSettings' => __DIR__ . '/../..' . '/config/custom/themeSettings.php',
        'cornelius\\custom\\skills\\Skills' => __DIR__ . '/../..' . '/config/custom/skills/skills.php',
        'cornelius\\custom\\skills\\SkillsPage' => __DIR__ . '/../..' . '/config/custom/skills/skillsPage.php',
        'cornelius\\setup\\Enqueue' => __DIR__ . '/../..' . '/config/setup/enqueue.php',
        'cornelius\\setup\\Login' => __DIR__ . '/../..' . '/config/setup/login.php',
        'cornelius\\setup\\Menus' => __DIR__ . '/../..' . '/config/setup/menus.php',
        'cornelius\\setup\\Remove' => __DIR__ . '/../..' . '/config/setup/remove.php',
        'cornelius\\setup\\Setup' => __DIR__ . '/../..' . '/config/setup/setup.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf997b9f772caf6cd660a44e3dc61cce1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf997b9f772caf6cd660a44e3dc61cce1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf997b9f772caf6cd660a44e3dc61cce1::$classMap;

        }, null, ClassLoader::class);
    }
}
