<?php

namespace App\Utilities;


class Constant
{
    // For Gallery
    const ALL = 'all';
    const ALBUM = 'album';
    const PHOTOS = 'photos';
    const ALL_PHOTO = 'all_photos';

    // For Forms
    const ADD = 'Add';
    const EDIT = 'Edit';

    // For Gate
    const SCORE_ENTRY = 'score_entry';
    const MANAGE_SITE = 'manage_site';
    const CURATE_ENTRY = 'curate_entry';


    static public function album_cache_key($id): string
    {
        return "album_$id";
    }
}
