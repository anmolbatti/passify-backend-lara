<?php

namespace App\Http\Middleware;

use App\Models\Pass;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImageCountCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $passId = $request->route('id');

        // Replace YourModel with the actual model used for pass_id
        $pass = Pass::where('id', $passId)->with('pass_images')->first();

        $required_stamps = $pass->no_of_stamps + 1;
        $images_created = $pass->pass_images->count();
        if($required_stamps != $images_created ){
            return redirect()->route('manage.image',['id' => $passId]);
        }

        return $next($request);
    }
}
