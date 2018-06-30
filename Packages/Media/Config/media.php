<?php
return [
    'package'   => 'Media',
    // Upload folder which store in public/{upload_folder}
    'upload_folder' => 'uploads',
    // Unit MB
    'max_file_size' => 10,
    // allow extensions
    'allow' => 'jpg,jpeg,bmp,png,gif,xls,xlsx,doc,docx,ppt,pptx,zip,rar',

    // Thumbnail size for image upload
    'thumbnail' => [
        'medium'    => [300, 300],
        'small'     => [32, 32]
    ]
];