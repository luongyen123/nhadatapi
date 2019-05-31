# Nhà đất á châu
# API prefix router api
# backend prefix router admin
#frontend prefix router none
# using microservice Lumen
if (!function_exists('public_path')) {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function public_path($path = null)
    {
        return rtrim(app()->basePath('public/' . $path), '/');
    }
}
if (! function_exists('asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool    $secure
     * @return string
     */
    function asset($path, $secure = null)
    {
        return app('url')->asset($path, $secure);
    }
}