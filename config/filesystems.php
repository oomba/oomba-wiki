<?php


$storage_type = !is_null(getenv('STORAGE_TYPE')) ? getenv('STORAGE_TYPE') : env('STORAGE_TYPE', 'local');
$storage_url = !is_null(getenv('STORAGE_URL')) ? getenv('STORAGE_URL') : env('STORAGE_URL', false);
$storage_s3_key = !is_null(getenv('STORAGE_S3_KEY')) ? getenv('STORAGE_S3_KEY') : env('STORAGE_S3_KEY', 'your-key');
$storage_s3_secret = !is_null(getenv('STORAGE_S3_SECRET')) ? getenv('STORAGE_S3_SECRET') : env('STORAGE_S3_SECRET', 'your-secret');
$storage_s3_region = !is_null(getenv('STORAGE_S3_REGION')) ? getenv('STORAGE_S3_REGION') : env('STORAGE_S3_REGION', 'your-region');
$storage_s3_bucket = !is_null(getenv('STORAGE_S3_BUCKET')) ? getenv('STORAGE_S3_BUCKET') : env('STORAGE_S3_BUCKET', 'your-bucket');

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. A "local" driver, as well as a variety of cloud
    | based drivers are available for your choosing. Just store away!
    |
    | Supported: "local", "ftp", "s3", "rackspace"
    |
    */

    'default' => $storage_type,

    /*
    |--------------------------------------------------------------------------
    | Storage URL
    |--------------------------------------------------------------------------
    |
    | This is the url to where the storage is located for when using an external
    | file storage service, such as s3, to store publicly accessible assets.
    |
    */
    'url' => $storage_url,

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => 's3',

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root'   => public_path(),
        ],

        'ftp' => [
            'driver'   => 'ftp',
            'host'     => 'ftp.example.com',
            'username' => 'your-username',
            'password' => 'your-password',

            // Optional FTP Settings...
            // 'port'     => 21,
            // 'root'     => '',
            // 'passive'  => true,
            // 'ssl'      => true,
            // 'timeout'  => 30,
        ],

        's3' => [
            'driver' => 's3',
            'key'    => $storage_s3_key,
            'secret' => $storage_s3_secret,
            'region' => $storage_s3_region,
            'bucket' => $storage_s3_bucket,
        ],

        'rackspace' => [
            'driver'    => 'rackspace',
            'username'  => 'your-username',
            'key'       => 'your-key',
            'container' => 'your-container',
            'endpoint'  => 'https://identity.api.rackspacecloud.com/v2.0/',
            'region'    => 'IAD',
            'url_type'  => 'publicURL',
        ],

    ],

];
