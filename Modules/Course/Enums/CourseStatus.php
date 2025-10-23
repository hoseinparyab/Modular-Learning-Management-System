<?php

namespace Modules\Course\Enums;

enum CourseStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';
    case REJECTED = 'rejected';
    case PENDING = 'pending';
    case APPROVED = 'approved';


}
