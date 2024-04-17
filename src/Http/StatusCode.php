<?php

namespace Styx\Http;

class StatusCode
{
    public const OK = 200;
    public const CREATED = 201;
    public const ACCEPTED = 202;

    public const REDIRECT_PERMAMENT = 301;
    public const REDIRECT_TEMPORARY = 302;
    public const REDIRECT_NOT_MODIFIED = 304;

    public const BAD_REQUEST = 400;
    public const UNAUTHORIZED = 401;
    public const FORBIDDEN = 403;
    public const NOT_FOUND = 404;
    public const REQUEST_TIMEOUT = 408;
    public const TOO_MANY_REQUESTS = 429;

    public const INTERNAL_SERVER_ERROR = 500;
    public const NOT_IMPLEMENTED = 501;
    public const BAD_GATEWAY = 502;
}