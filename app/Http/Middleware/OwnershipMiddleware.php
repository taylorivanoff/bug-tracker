<?php

namespace App\Http\Middleware;

use Closure;

class OwnershipMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->route('projects') ; // For example, the current URL is: /posts/1/edit

        $project = App\Project::where('user_id', $this->auth()->id)
                        ->where('id', $id)
                        ->first();

        if($post) return $next($request); // They're the owner, lets continue...

        return redirect()->to('/'); // Nope! Get outta' here.
    }
}
