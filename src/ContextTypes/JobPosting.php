<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/JobPosting
 */
class JobPosting extends Intangible
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'title'                         => null,
        'directApply'                   => null,
        'identifier'                    => PropertyValue::class,
        'hiringOrganization'            => Organization::class,
        'employmentType'                => null,
        'datePosted'                    => null,
        'validThrough'                  => null,
        'applicantLocationRequirements' => Country::class,
        'jobLocationType'               => null,
        'jobLocation'                   => Place::class,
        'baseSalary'                    => MonetaryAmount::class,
        'experienceRequirements'        => null
    ];
}
