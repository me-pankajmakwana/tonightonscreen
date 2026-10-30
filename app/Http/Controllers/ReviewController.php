<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Title;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Store a new user review and community rating for a title.
     */
    public function store(Request $request, Title $title)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:10',
            'headline' => 'required|string|min:3|max:150',
            'content' => 'required|string|min:10|max:3000',
            'author_name' => 'required|string|min:2|max:80',
            'contains_spoilers' => 'nullable|boolean',
        ]);

        $review = new Review();
        $review->title_id = $title->id;
        $review->user_id = auth()->id();
        $review->author_name = strip_tags(trim($validated['author_name']));
        $review->rating = (int) $validated['rating'];
        $review->headline = strip_tags(trim($validated['headline']));
        $review->content = strip_tags(trim($validated['content']));
        $review->contains_spoilers = $request->boolean('contains_spoilers');
        $review->is_approved = true; // Auto-approved with Filament moderation
        $review->save();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your review and rating have been published!',
                'review' => [
                    'id' => $review->id,
                    'author_name' => $review->author_name,
                    'rating' => $review->rating,
                    'rating_label' => $review->rating_label,
                    'headline' => $review->headline,
                    'content' => $review->content,
                    'contains_spoilers' => $review->contains_spoilers,
                    'helpful_votes' => 0,
                    'created_at' => $review->created_at->format('M d, Y'),
                ],
                'new_rating' => (float) $title->fresh()->rating,
            ]);
        }

        return back()->with('review_success', 'Thank you! Your review has been submitted and published.');
    }

    /**
     * Mark a review as helpful (AJAX).
     */
    public function helpful(Request $request, Review $review): JsonResponse
    {
        $voted = session()->get('helpful_reviews', []);

        if (in_array($review->id, $voted, true)) {
            return response()->json([
                'success' => false,
                'message' => 'You already found this review helpful.',
                'helpful_votes' => $review->helpful_votes,
            ], 422);
        }

        $review->increment('helpful_votes');
        $voted[] = $review->id;
        session()->put('helpful_reviews', $voted);

        return response()->json([
            'success' => true,
            'message' => 'Thanks for your feedback!',
            'helpful_votes' => $review->helpful_votes,
        ]);
    }
}
