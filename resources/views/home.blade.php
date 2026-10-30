<x-layouts.app>
    <!-- 1. Hero Section -->
    <x-hero />

    <!-- 2. Category Quick Nav Bar -->
    <x-category-bar />

    <!-- 3. What's Hot Right Now (Trending) -->
    <x-trending-section :trending="$trending" />

    <!-- 4. Upcoming Movies (Coming Soon in Next 2 Months) -->
    <x-upcoming-section :upcomingMovies="$upcomingMovies" />

    <!-- 5. Today's Celebrity Birthdays (Celebrity Spotlight) -->
    <x-birthdays-section :todayBirthdays="$todayBirthdays" :upcomingBirthdays="$upcomingBirthdays" />

    <!-- 6. Featured Talent (Meet the Stars) -->
    <x-talent-section :talents="$featuredTalents" />

    <!-- 5. Explore by Genre & Popular Collections -->
    <x-genre-collections-section :genres="$genres" :collections="$collections" />

    <!-- 6. Entertainment News & Stay Updated Newsletter -->
    <x-news-newsletter-section :articles="$articles" />
</x-layouts.app>
