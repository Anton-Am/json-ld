<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/employmentType
 * https://developers.google.com/search/docs/appearance/structured-data/job-posting#job-posting-definition
 */
class EmploymentType
{
    /**
     * The job is a full-time position.
     */
    public const FULL_TIME = 'FULL_TIME';

    /**
     * The job is a part-time position.
     */
    public const PART_TIME = 'PART_TIME';


    /**
     * The job is a contractor position.
     */
    public const CONTRACTOR = 'CONTRACTOR';


    /**
     * The job is a temporary position.
     */
    public const TEMPORARY = 'TEMPORARY';


    /**
     * The job is an internship position.
     */
    public const INTERN = 'INTERN';


    /**
     * The job is a volunteer position.
     */
    public const VOLUNTEER = 'VOLUNTEER';

    /**
     * The job is paid by the day.
     */
    public const PER_DIEM = 'PER_DIEM';

    /**
     * The job is a different type of position that's not covered by the other possible values.
     */
    public const OTHER = 'OTHER';
}