<?php

namespace App\Http\Controllers;

use App\Enums\TitleType;
use App\Models\Title;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    /**
     * Display the user's interactive saved watchlist.
     */
    public function index(Request $request)
    {
        $watchlistIds = session()->get('watchlist', []);

        $titles = collect();
        if (! empty($watchlistIds)) {
            $titles = Title::query()
                ->whereIn('id', $watchlistIds)
                ->with(['genres:id,name,slug', 'streamingPlatforms:id,name,slug'])
                ->get()
                // Preserve the order in which items were saved
                ->sortBy(function ($item) use ($watchlistIds) {
                    return array_search($item->id, array_reverse($watchlistIds));
                })
                ->values();
        }

        $filter = $request->input('type', 'all');
        $filteredTitles = $titles;
        if ($filter === 'movie') {
            $filteredTitles = $titles->filter(fn($t) => 
                ($t->type instanceof TitleType ? $t->type === TitleType::MOVIE : $t->type === 'movie')
            )->values();
        } elseif ($filter === 'tv_series') {
            $filteredTitles = $titles->filter(fn($t) => 
                ($t->type instanceof TitleType ? $t->type === TitleType::TV_SERIES : $t->type === 'tv_series')
            )->values();
        }

        $movieCount = $titles->filter(fn($t) => 
            ($t->type instanceof TitleType ? $t->type === TitleType::MOVIE : $t->type === 'movie')
        )->count();

        $seriesCount = $titles->filter(fn($t) => 
            ($t->type instanceof TitleType ? $t->type === TitleType::TV_SERIES : $t->type === 'tv_series')
        )->count();

        return view('watchlist.index', [
            'titles' => $filteredTitles,
            'totalCount' => $titles->count(),
            'movieCount' => $movieCount,
            'seriesCount' => $seriesCount,
            'activeFilter' => $filter,
        ]);
    }

    /**
     * Toggle a title into or out of the user's watchlist.
     */
    public function toggle(Request $request): JsonResponse
    {
        $request->validate([
            'title_id' => 'required|integer|exists:titles,id',
        ]);

        $titleId = (int) $request->input('title_id');
        $watchlist = session()->get('watchlist', []);

        if (in_array($titleId, $watchlist, true)) {
            $watchlist = array_values(array_diff($watchlist, [$titleId]));
            $inWatchlist = false;
            $message = 'Removed from your watchlist';
        } else {
            $watchlist[] = $titleId;
            $inWatchlist = true;
            $message = 'Saved to your watchlist';
        }

        session()->put('watchlist', $watchlist);

        return response()->json([
            'success' => true,
            'in_watchlist' => $inWatchlist,
            'count' => count($watchlist),
            'message' => $message,
        ]);
    }

    /**
     * Clear the entire watchlist.
     */
    public function clear(): RedirectResponse
    {
        session()->forget('watchlist');

        return redirect()->route('watchlist.index')->with('status', 'Your watchlist has been cleared.');
    }
}
