<?php

namespace AntonAm\JsonLD;

use AntonAm\JsonLD\ContextTypes\Article;
use AntonAm\JsonLD\ContextTypes\BlogPosting;
use AntonAm\JsonLD\ContextTypes\BreadcrumbList;
use AntonAm\JsonLD\ContextTypes\EmploymentType;
use AntonAm\JsonLD\ContextTypes\JobPosting;
use AntonAm\JsonLD\ContextTypes\Organization;
use AntonAm\JsonLD\ContextTypes\Person;
use AntonAm\JsonLD\ContextTypes\WebSite;

require_once("vendor/autoload.php");


echo '== WebSite ==' . PHP_EOL .
    Context::create(WebSite::class, [
        'name'            => 'Google',
        'url'             => 'https://google.com/',
        'potentialAction' => [
            'target'      => 'https://google.com/results?q={search_term_string}',
            'query'       => 'required name=search_term_string',
            'query-input' => 'required name=search_term_string'
        ]
    ])
    . PHP_EOL . '== /WebSite ==' . PHP_EOL . PHP_EOL;

echo '== Person ==' . PHP_EOL .
    Context::create(Person::class, [
        'name'                      => 'John Doe',
        'alternateName'             => 'Джон Дое',
        'description'               => 'Expert',
        'disambiguatingDescription' => 'Co-founder of CodeCore Bootcamp',
        'url'                       => 'https://google.com/john-doe',
        'image'                     => 'https://google.com/john-doe/logo.jpg',
        'sameAs'                    => [
            'https://twitter.com/johndoe',
            'https://facebook.com/johndoe',
        ],
        'alumniOf'                  => [
            [
                'name'   => 'Vancouver Film School',
                'sameAs' => 'https://en.wikipedia.org/wiki/Vancouver_Film_School'
            ],
            [
                'name' => 'CodeCore Bootcamp'
            ]
        ],
        'jobTitle'                  => 'Executive',
        'worksFor'                  => [
            [
                'name'   => 'Skunkworks Creative Group Inc.',
                'sameAs' => [
                    'https://twitter.com/skunkworks_ca',
                    'https://www.facebook.com/skunkworks.ca',
                    'https://www.linkedin.com/company/skunkworks-creative-group-inc',
                    'https://plus.google.com/+SkunkworksCa'
                ]
            ]
        ]
    ])
    . PHP_EOL . '== /Person ==' . PHP_EOL . PHP_EOL;


echo '== Organization ==' . PHP_EOL .
    Context::create(Organization::class, [
        'name'   => 'Your Company',
        'url'    => 'https://google.com/partners/your-company',
        'logo'   => 'https://google.com/partners/your-company.jpg',
        'sameAs' => [
            'https://your-company.com/',
            'https://t.me/your-company'
        ]
    ])
    . PHP_EOL . '== /Organization ==' . PHP_EOL . PHP_EOL;


echo '== JobPosting ==' . PHP_EOL .
    Context::create(JobPosting::class, [
        'title'                         => 'CEO',
        'directApply'                   => false,
        'description'                   => 'Company name<br>Company details',
        'identifier'                    => [
            '@type' => 'PropertyValue',
            'name'  => 'Company',
            'value' => '1234'
        ],
        'hiringOrganization'            => [
            '@type'  => 'Organization',
            'name'   => 'Company',
            'sameAs' => 'https://google.com/partners/company',
            'logo'   => 'https://google.com/partners/company.png'
        ],
        'employmentType'                => [EmploymentType::FULL_TIME, EmploymentType::CONTRACTOR],
        'datePosted'                    => '2023-03-09',
        'validThrough'                  => '2023-03-31',
        'applicantLocationRequirements' => [
            '@type' => 'Country',
            'name'  => 'RU'
        ],
        'jobLocationType'               => 'TELECOMMUTE',
        'jobLocation'                   => [
            '@type'   => 'Place',
            'address' => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => '',
                'addressLocality' => 'Moscow',
                'postalCode'      => '123456',
                'addressCountry'  => 'RU'
            ]
        ],
        'baseSalary'                    => [
            '@type'    => 'MonetaryAmount',
            'currency' => 'RUB',
            'value'    => [
                '@type'    => 'QuantitativeValue',
                'minValue' => 100000,
                'maxValue' => 200000,
                'unitText' => 'MONTH'
            ]
        ],
        'experienceRequirements'        => 'Requirements details'
    ])
    . PHP_EOL . '== /JobPosting ==' . PHP_EOL . PHP_EOL;


echo '== Article ==' . PHP_EOL .
    Context::create(Article::class, [
        'mainEntityOfPage' => [
            'url' => 'https://google.com/article/503'
        ],
        'name'             => 'Article name',
        'headline'         => 'Article name',
        'description'      => 'Article details',
        'articleSection'   => 'Article details',
        'image'            => 'https://google.com/article/503.png',
        'author'           => [
            'name' => 'Author Name',
            'url'  => 'https://google.com/users/author'
        ],
        'publisher'        => [
            'name' => 'Google',
            'logo' => [
                'url' => 'https://google.com/logo.png'
            ]
        ],
        'datePublished'    => '2023-03-03',
        'dateModified'     => '2023-04-03',
        'keywords'         => 'seo sales b2b'
    ])
    . PHP_EOL . '== /Article ==' . PHP_EOL . PHP_EOL;

echo '== BlogPosting ==' . PHP_EOL .
    Context::create(BlogPosting::class, [
        'mainEntityOfPage' => [
            'url' => 'https://google.com/post/505'
        ],
        'headline'         => 'Post header',
        'description'      => 'Post text',
        'image'            => [
            ['url' => 'https://google.com/article/503.png'],
            ['url' => 'https://google.com/article/504.png'],
        ],
        'author'           => [
            'name' => 'Author Name',
            'url'  => 'https://google.com/users/author'
        ],
        'publisher'        => [
            'name' => 'Google',
            'logo' => [
                'url' => 'https://google.com/logo.png'
            ]
        ],
        'datePublished'    => '2023-03-03',
        'dateModified'     => '2023-04-03',
    ])
    . PHP_EOL . '== /BlogPosting ==' . PHP_EOL . PHP_EOL;

echo '== BreadcrumbList ==' . PHP_EOL .
    Context::create(BreadcrumbList::class, [
        'itemListElement' => [
            [
                'name' => 'Main',
                'url'  => 'https://google.com'
            ],
            [
                'name' => 'Section',
                'url'  => 'https://google.com/section'
            ],
            [
                'name' => 'Article title',
                'url'  => 'https://google.com/section/article'
            ]
        ]
    ])
    . PHP_EOL . '== /BreadcrumbList ==' . PHP_EOL . PHP_EOL;


$context = [
    [
        'context' => WebSite::class,
        'data'    => [
            'name'            => 'Google',
            'url'             => 'https://google.com/',
            'potentialAction' => [
                'target'      => 'https://google.com/results?q={search_term_string}',
                'query'       => 'required name=search_term_string',
                'query-input' => 'required name=search_term_string'
            ]
        ]
    ],
    [
        'context' => BreadcrumbList::class,
        'data'    => [
            'itemListElement' => [
                [
                    'name' => 'Main',
                    'url'  => 'https://google.com'
                ],
                [
                    'name' => 'Section',
                    'url'  => 'https://google.com/section'
                ],
                [
                    'name' => 'Article title',
                    'url'  => 'https://google.com/section/article'
                ]
            ]
        ]
    ]
];
echo '== Multiple Context Graph ==' . PHP_EOL .
    MultiContext::create($context)
    . PHP_EOL . '== /Multiple Context Graph ==' . PHP_EOL . PHP_EOL;

echo '== Multiple Context Array ==' . PHP_EOL .
    MultiContext::create($context, MultiContext::TYPE_ARRAY)
    . PHP_EOL . '== /Multiple Context Array ==' . PHP_EOL . PHP_EOL;

echo '== Multiple Context Scripts ==' . PHP_EOL .
    MultiContext::create($context, MultiContext::TYPE_SCRIPTS)
    . '== /Multiple Context Scripts ==' . PHP_EOL . PHP_EOL;