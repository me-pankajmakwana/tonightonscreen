-- =============================================================================
-- PRODUCTION SQL UPDATE: 11 POPULAR MOVIES WITH EXTENDED 1500+ CHAR DESCRIPTIONS & POSTERS
-- Titles: Chiikawa the Movie, Detective Conan: Fallen Angel of the Highway, Godzilla Minus Zero,
--         Kingdom 5, Puella Magi Madoka Magica, The Super Mario Galaxy Movie, Zootopia 2,
--         Michael (Michael Jackson biopic), Toy Story 5, Cosmic Princess Kaguya!, The Samurai and the Prisoner
-- Generated: 2026-11-02 10:18:18
-- =============================================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- 1. ENSURE GENRES EXIST
INSERT IGNORE INTO `genres` (`name`, `slug`, `created_at`, `updated_at`) VALUES ('Animation', 'animation', NOW(), NOW());
INSERT IGNORE INTO `genres` (`name`, `slug`, `created_at`, `updated_at`) VALUES ('Family', 'family', NOW(), NOW());
INSERT IGNORE INTO `genres` (`name`, `slug`, `created_at`, `updated_at`) VALUES ('Fantasy', 'fantasy', NOW(), NOW());
INSERT IGNORE INTO `genres` (`name`, `slug`, `created_at`, `updated_at`) VALUES ('History', 'history', NOW(), NOW());
INSERT IGNORE INTO `genres` (`name`, `slug`, `created_at`, `updated_at`) VALUES ('Music', 'music', NOW(), NOW());
INSERT IGNORE INTO `genres` (`name`, `slug`, `created_at`, `updated_at`) VALUES ('Sci-Fi', 'sci-fi', NOW(), NOW());
INSERT IGNORE INTO `genres` (`name`, `slug`, `created_at`, `updated_at`) VALUES ('Mystery', 'mystery', NOW(), NOW());

-- 2. ENSURE DIRECTORS AND KEY CAST EXIST
INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Takashi Yamazaki', 'takashi-yamazaki', 'Directing', 'Male', '1964-06-12', 'Matsumoto, Nagano, Japan', 'Japanese', 'active', '<p><strong>Takashi Yamazaki</strong> is an Academy Award-winning Japanese film director, screenwriter, and visual effects supervisor. He won the historic Oscar for Best Visual Effects for <a href=\"/title/godzilla-minus-one-2023\">Godzilla Minus One</a>, celebrated globally for bringing profound emotional human drama and groundbreaking monster spectacle to cinema screen.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Ryunosuke Kamiki', 'ryunosuke-kamiki', 'Acting', 'Male', '1993-05-19', 'Fujimi, Saitama, Japan', 'Japanese', 'active', '<p><strong>Ryunosuke Kamiki</strong> is a celebrated Japanese actor and voice talent known for leading roles in <a href=\"/title/godzilla-minus-one-2023\">Godzilla Minus One</a> as tormented kamikaze pilot Koichi Shikishima, as well as voicing Taki in Makoto Shinkai\'s anime classic <em>Your Name</em>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Minami Hamabe', 'minami-hamabe', 'Acting', 'Female', '2000-08-29', 'Ishikawa Prefecture, Japan', 'Japanese', 'active', '<p><strong>Minami Hamabe</strong> is a leading Japanese actress acclaimed for her heartfelt portrayal of Noriko Oishi in the Oscar-winning <a href=\"/title/godzilla-minus-one-2023\">Godzilla Minus One</a> and its upcoming direct sequel <a href=\"/title/godzilla-minus-zero-2026\">Godzilla Minus Zero</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Kento Yamazaki', 'kento-yamazaki', 'Acting', 'Male', '1994-09-07', 'Itabashi, Tokyo, Japan', 'Japanese', 'active', '<p><strong>Kento Yamazaki</strong> is a prominent Japanese actor renowned for his starring role as war orphan turned great general Shin in the historic blockbuster <em>Kingdom</em> movie series, including the monumental <a href=\"/title/kingdom-5-2026\">Kingdom 5</a>, as well as the global streaming sensation <em>Alice in Borderland</em>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Ryo Yoshizawa', 'ryo-yoshizawa', 'Acting', 'Male', '1994-02-01', 'Tokyo, Japan', 'Japanese', 'active', '<p><strong>Ryo Yoshizawa</strong> is an acclaimed Japanese actor who won the Japan Academy Film Prize for his charismatic dual performance as the young King Ying Zheng (Ei Sei) and Hyo in the blockbuster <em>Kingdom</em> franchise, continuing in <a href=\"/title/kingdom-5-2026\">Kingdom 5</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Chris Pratt', 'chris-pratt', 'Acting', 'Male', '1979-06-21', 'Virginia, Minnesota, USA', 'American', 'active', '<p><strong>Chris Pratt</strong> is a blockbuster Hollywood star renowned as Peter Quill / Star-Lord in Marvel\'s <em>Guardians of the Galaxy</em> and the unmistakable voice of Mario in Nintendo and Illumination\'s billion-dollar animated universe, returning in <a href=\"/title/the-super-mario-galaxy-movie-2026\">The Super Mario Galaxy Movie</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Anya Taylor-Joy', 'anya-taylor-joy', 'Acting', 'Female', '1996-04-16', 'Miami, Florida, USA', 'American', 'active', '<p><strong>Anya Taylor-Joy</strong> is an acclaimed Golden Globe-winning actress celebrated for <em>The Queen\'s Gambit</em> and her empowering vocal performance as Princess Peach in the Mario animated franchise, including <a href=\"/title/the-super-mario-galaxy-movie-2026\">The Super Mario Galaxy Movie</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Ginnifer Goodwin', 'ginnifer-goodwin', 'Acting', 'Female', '1978-05-22', 'Memphis, Tennessee, USA', 'American', 'active', '<p><strong>Ginnifer Goodwin</strong> is a beloved American actress who voices the optimistic, determined rabbit police officer Judy Hopps in Disney\'s billion-dollar animated franchise, starring in the much-anticipated <a href=\"/title/zootopia-2-2025\">Zootopia 2</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Jason Bateman', 'jason-bateman', 'Acting', 'Male', '1969-01-14', 'Rye, New York, USA', 'American', 'active', '<p><strong>Jason Bateman</strong> is an Emmy-winning American actor and director who brings his trademark wry humor and heartfelt depth to the charming con-artist turned police officer fox Nick Wilde in Disney\'s <a href=\"/title/zootopia-2-2025\">Zootopia 2</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Jaafar Jackson', 'jaafar-jackson', 'Acting', 'Male', '1996-07-25', 'Los Angeles, California, USA', 'American', 'active', '<p><strong>Jaafar Jackson</strong> is an American singer, dancer, and actor who is the biological nephew of pop legend Michael Jackson. He makes his monumental feature film debut embodying his uncle in the official biographical drama <a href=\"/title/michael-michael-jackson-music-biopic-2025\">Michael: Michael Jackson Music Biopic</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Antoine Fuqua', 'antoine-fuqua', 'Directing', 'Male', '1966-01-19', 'Pittsburgh, Pennsylvania, USA', 'American', 'active', '<p><strong>Antoine Fuqua</strong> is an acclaimed American filmmaker renowned for hard-hitting cinema including <em>Training Day</em> and <em>The Equalizer</em> trilogy. He directs the monumental musical biographical drama <a href=\"/title/michael-michael-jackson-music-biopic-2025\">Michael: Michael Jackson Music Biopic</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Tom Hanks', 'tom-hanks', 'Acting', 'Male', '1956-07-09', 'Concord, California, USA', 'American', 'active', '<p><strong>Tom Hanks</strong> is a two-time Academy Award-winning American screen icon whose legendary career spans dramatic masterpieces and voicing the beloved pull-string cowboy Sheriff Woody across three decades of Pixar\'s historic franchise, returning in <a href=\"/title/toy-story-5-2026\">Toy Story 5</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Andrew Stanton', 'andrew-stanton', 'Directing', 'Male', '1965-12-03', 'Rockport, Massachusetts, USA', 'American', 'active', '<p><strong>Andrew Stanton</strong> is a two-time Academy Award-winning Pixar filmmaker who directed animated masterpieces <em>Finding Nemo</em> and <em>WALL-E</em>, and co-wrote all previous Toy Story chapters before taking the director\'s helm for <a href=\"/title/toy-story-5-2026\">Toy Story 5</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

-- 3. UPSERT 11 POPULAR MOVIES WITH FULL RICH TEXT, POSTERS AND INTERNAL HYPERLINKS
-- Movie: Chiikawa the Movie (chiikawa-the-movie-2026)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Chiikawa the Movie', 'chiikawa-the-movie-2026', 'movie', 'titles/posters/chiikawa-the-movie-2026.jpg', 'Small, gentle, and braver together. The tiny forest heroes step into their grandest cinematic adventure.', '<p><strong>Chiikawa the Movie</strong> (映画 ちいかわ) brings illustrator Nagano\'s beloved, viral anime phenomenon to the silver screen in a heartwarming and thrilling feature-length adventure produced by Doga Kobo.</p><p>Set in a magical yet subtly dangerous fantasy countryside, the story centers on <strong>Chiikawa</strong>, a timid, soft-spoken white creature who loves sweet treats and strives hard to earn money by weeding grassy fields and hunting monsters. Alongside cheerful, guitar-strumming best friend Hachiware and the unpredictable, fearless rabbit Usagi, Chiikawa prepares for the mystical Centennial Forest Festival. However, when an ancient, colossal shadow-creature threatens to devour the valley\'s golden flower fields, the three tiny companions must rely on mutual trust, humble courage, and their little wooden staves to protect their peaceful haven.</p>', '<h3>A Heartfelt Story of Friendship, Hard Work, and Overcoming Fears</h3>
<p>Unlike ordinary slice-of-life cartoons, the world of Chiikawa captivates children and adults alike because it balances adorable cuteness with genuine real-world empathy. The characters work humble daily jobs—plucking invasive weeds, passing official qualification exams, and collecting rewards to buy simple comforts like hot ramen or hand-knit satchels. In this first major movie event, that relatable struggle takes center stage on a grand cinematic scale.</p>
<p>When Chiikawa fails the difficult level-5 Weeding Certification while Hachiware passes, Chiikawa feels a surge of sadness. But rather than breaking their bond, Hachiware supports Chiikawa through extra study sessions and shared vegetable soup. This gentle tenderness forms the emotional core of the film before high-stakes adventure erupts across the whispering forest.</p>

<h3>Key Characters in the Valley</h3>
<ul>
    <li><strong>Chiikawa:</strong> The small, tearful yet determined protagonist whose pure heart and bravery shine brightest when defending loved ones.</li>
    <li><strong>Hachiware:</strong> The loyal blue-eared cat friend who lives in a rustic cave, cooks humble meals, and serves as the voice of comfort for the group.</li>
    <li><strong>Usagi:</strong> The energetic, chaotic wild rabbit who fears nothing, wields wooden pole-weapons with astonishing agility, and communicates through hilarious joyful shouts of \"Ura\" and \"Yaha!\"</li>
    <li><strong>Kurimanju & Momonga:</strong> Colorful forest neighbors who add humor, tea-sipping wisdom, and delightful mischief to the bustling village market.</li>
</ul>

<h3>Visual Wonder & Themes</h3>
<p>Directed with fluid hand-drawn warmth and lush watercolor scenery, the movie expands Nagano\'s signature world with majestic waterfalls, ancient stone ruins, and whimsical creature designs. The soundtrack features acoustic guitars, festive flute melodies, and touching choral moments that leave viewers with tears of joy. Discover more heartwarming animated journeys in our curated <a href=\"/genres/animation\">Animation films hub</a> and family-friendly stories in the <a href=\"/genres/comedy\">Comedy portal</a>.</p>', '2026-07-24', 92, 'G', 8.7, 900000000, 3800000000, 'Japanese', 'Japan', 'released', 1, 1, 1, NOW(), NOW())
ON DUPLICATE KEY UPDATE
  `poster_path` = VALUES(`poster_path`),
  `tagline` = VALUES(`tagline`),
  `overview` = VALUES(`overview`),
  `description` = VALUES(`description`),
  `release_date` = VALUES(`release_date`),
  `runtime_minutes` = VALUES(`runtime_minutes`),
  `content_rating` = VALUES(`content_rating`),
  `rating` = VALUES(`rating`),
  `budget` = VALUES(`budget`),
  `box_office` = VALUES(`box_office`),
  `original_language` = VALUES(`original_language`),
  `origin_country` = VALUES(`origin_country`),
  `is_featured` = VALUES(`is_featured`),
  `is_trending` = VALUES(`is_trending`),
  `is_active` = 1,
  `updated_at` = NOW();

INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'comedy' AND t.slug = 'chiikawa-the-movie-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'adventure' AND t.slug = 'chiikawa-the-movie-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'animation' AND t.slug = 'chiikawa-the-movie-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'fantasy' AND t.slug = 'chiikawa-the-movie-2026';

-- Movie: Detective Conan: Fallen Angel of the Highway (detective-conan-fallen-angel-of-the-highway-2026)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Detective Conan: Fallen Angel of the Highway', 'detective-conan-fallen-angel-of-the-highway-2026', 'movie', 'titles/posters/detective-conan-fallen-angel-of-the-highway-2026.jpg', 'High-speed justice on the Tokyo Bay expressway. An untraceable ghost rider tests the limits of deduction.', '<p><strong>Detective Conan: Fallen Angel of the Highway</strong> (名探偵コナン ハイウェイの堕天使) is the 29th pulse-pounding feature film in Gosho Aoyama\'s globally celebrated mystery franchise, uniting child prodigy detective Conan Edogawa with the National Police Agency\'s elite operative Toru Amuro.</p><p>A string of impossible, lightning-fast armed heists sweeps across the elevated highways of the Tokyo metropolitan expressway. The culprit—a mysterious motorcycle phantom dubbed the \"Fallen Angel\"—wears black carbon armor, rides an experimental silent superbike, and vanishes seamlessly into midnight tunnels without tripping electronic toll sensors. When a retired highway commissioner is poisoned inside a speeding luxury limousine during bumper-to-bumper traffic, Conan Edogawa must unravel a locked-vehicle murder mystery while navigating high-octane chases, police corruption conspiracies, and deadly sniper crosshairs above the Pacific coastline.</p>', '<h3>High-Octane Expressway Action Meets Classic Locked-Room Deduction</h3>
<p>This entry in the long-running cinematic series raises the adrenaline by blending intense vehicular stunts with rigorous forensic deduction. The Tokyo Shuto Expressway, with its labyrinth of underwater tunnels, towering suspension bridges, and elevated viaducts, becomes a gigantic concrete chessboard where every exit ramp and CCTV blindspot holds a piece of the puzzle.</p>
<p>Conan Edogawa collaborates with Public Security ace Toru Amuro (Rei Furuya / Bourbon), whose unrivaled white RX-7 driving skills and undercover intelligence network are pushed to their absolute limits. The investigation uncovers an eight-year-old cold case involving a highway engineering scandal, bringing personal vendettas to light as innocent commuters become trapped on an isolated bridge rigged with remote explosives.</p>

<h3>Key Characters & Suspects</h3>
<ul>
    <li><strong>Conan Edogawa / Shinichi Kudo:</strong> The brilliant teenage detective trapped in a child\'s body, utilizing his solar-powered skateboard, voice-changing bowtie, and sharp logic to expose the phantom rider.</li>
    <li><strong>Toru Amuro / Rei Furuya:</strong> The charismatic triple agent whose deep patriotism and tactical brilliance shine during high-speed highway skirmishes.</li>
    <li><strong>Ran Mouri & Kogoro Mouri:</strong> Ran\'s fierce karate skills defend innocent hostages, while \"Sleeping Kogoro\" inadvertently supplies crucial clues during the climatic press conference.</li>
    <li><strong>Miwako Sato & Wataru Takagi:</strong> Tokyo Metropolitan Police traffic and homicide detectives racing against time to coordinate roadblocks and rescue civilians.</li>
</ul>

<h3>Thematic Thrills & Cinematic Scope</h3>
<p>The film showcases state-of-the-art 3D vehicular animation combined with classic 2D anime character art, punctuated by Katsuo Ohno\'s legendary brass-heavy saxophone theme song. Exploring themes of grief, accountability, and the dangerous pursuit of private justice, this blockbuster delivers peak entertainment for mystery fans. Explore related crime puzzles in our <a href=\"/genres/mystery\">Mystery movies collection</a> and pulse-pounding <a href=\"/genres/crime\">Crime thrillers catalog</a>.</p>', '2026-04-17', 114, 'U/A 13+', 9, 1500000000, 14500000000, 'Japanese', 'Japan', 'released', 1, 1, 1, NOW(), NOW())
ON DUPLICATE KEY UPDATE
  `poster_path` = VALUES(`poster_path`),
  `tagline` = VALUES(`tagline`),
  `overview` = VALUES(`overview`),
  `description` = VALUES(`description`),
  `release_date` = VALUES(`release_date`),
  `runtime_minutes` = VALUES(`runtime_minutes`),
  `content_rating` = VALUES(`content_rating`),
  `rating` = VALUES(`rating`),
  `budget` = VALUES(`budget`),
  `box_office` = VALUES(`box_office`),
  `original_language` = VALUES(`original_language`),
  `origin_country` = VALUES(`origin_country`),
  `is_featured` = VALUES(`is_featured`),
  `is_trending` = VALUES(`is_trending`),
  `is_active` = 1,
  `updated_at` = NOW();

INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'action' AND t.slug = 'detective-conan-fallen-angel-of-the-highway-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'crime' AND t.slug = 'detective-conan-fallen-angel-of-the-highway-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'mystery' AND t.slug = 'detective-conan-fallen-angel-of-the-highway-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'animation' AND t.slug = 'detective-conan-fallen-angel-of-the-highway-2026';

-- Movie: Godzilla Minus Zero (godzilla-minus-zero-2026)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Godzilla Minus Zero', 'godzilla-minus-zero-2026', 'movie', 'titles/posters/godzilla-minus-zero-2026.jpg', 'From minus to absolute zero. The atomic beast regenerates from the frozen abyss of Tokyo Bay.', '<p><strong>Godzilla Minus Zero</strong> (ゴジラ マイナス ゼロ) is the monumental direct sequel to the Academy Award-winning international phenomenon <a href=\"/title/godzilla-minus-one-2023\">Godzilla Minus One</a>, written, directed, and visual effects-supervised by acclaimed visionary <a href=\"/person/takashi-yamazaki\">Takashi Yamazaki</a>.</p><p>Set in 1954 as Japan strives to rebuild its war-torn infrastructure and enter the modern industrial era, the peace achieved by former kamikaze pilot Koichi Shikishima (<a href=\"/person/ryunosuke-kamiki\">Ryunosuke Kamiki</a>) and his family is shattered. A mysterious biological sample retrieved from the depths of Tokyo Bay displays rapid, uncontrollable regenerative cell multiplication. At the same time, Noriko Oishi (<a href=\"/person/minami-hamabe\">Minami Hamabe</a>) begins experiencing strange physical symptoms connected to the black cellular mark on her neck. When deep ocean seismic sensors detect an immense thermal surge moving toward the Japanese archipelago, a larger, more terrifying atomic titan emerges from the icy abyss, forcing ordinary citizens and veteran engineers to unite once more in a desperate battle for survival.</p>', '<h3>The Direct Continuation of an Oscar-Winning Masterpiece</h3>
<p>Director Takashi Yamazaki made cinematic history when <em>Godzilla Minus One</em> won the Academy Award for Best Visual Effects in 2024, celebrated worldwide for proving that monster cinema can be deeply poignant, character-driven, and technically awe-inspiring. <em>Godzilla Minus Zero</em> deepens those emotional roots by exploring the cost of survival in mid-1950s post-war Japan.</p>
<p>The story delves into the psychological aftermath of the initial attack. Koichi Shikishima has dedicated his life to raising young Akiko and supporting Noriko, but survivor\'s guilt and unresolved trauma linger beneath the surface. When medical examinations reveal that Noriko\'s neck discoloration is composed of dormant G-cells (Godzilla cellular matter), the family is pulled into a military-scientific crisis just as the revived kaiju unleashes an even deadlier blue atomic ray capable of flash-freezing and vaporizing coastal harbors.</p>

<h3>Key Characters & Human Resilience</h3>
<ul>
    <li><strong>Koichi Shikishima (<a href=\"/person/ryunosuke-kamiki\">Ryunosuke Kamiki</a>):</strong> The reformed fighter pilot whose emotional courage and mechanical ingenuity are tested as he seeks to protect his loved ones without sacrificing his soul.</li>
    <li><strong>Noriko Oishi (<a href=\"/person/minami-hamabe\">Minami Hamabe</a>):</strong> The brave survivor whose mysterious physiological link to the beast becomes central to uncovering its regenerative weakness.</li>
    <li><strong>Chief Mechanic Tachibana:</strong> The gruff military technician whose naval aircraft and pressure-mine innovations provide humanity with a fighting technological chance.</li>
    <li><strong>The Leviathan (Godzilla):</strong> A terrifying manifestation of atomic dread, combining prehistoric savagery with unstoppable cellular regeneration and devastating nuclear breath.</li>
</ul>

<h3>Groundbreaking Visual Effects & Sonic Majesty</h3>
<p>Featuring hyper-realistic ocean water simulations, crumbling period architecture, and sound design recorded from real naval artillery, <em>Godzilla Minus Zero</em> creates an unforgettable sensory theater experience. Akira Ifukube\'s timeless musical themes are re-orchestrated alongside Naoki Sato\'s sweeping choral arrangements. Explore related monster epics in our <a href=\"/genres/sci-fi\">Sci-Fi portal</a> and high-stakes <a href=\"/genres/action\">Action movies library</a>.</p>', '2026-11-03', 135, 'U/A 13+', 9.4, 2500000000, 18000000000, 'Japanese', 'Japan', 'released', 1, 1, 1, NOW(), NOW())
ON DUPLICATE KEY UPDATE
  `poster_path` = VALUES(`poster_path`),
  `tagline` = VALUES(`tagline`),
  `overview` = VALUES(`overview`),
  `description` = VALUES(`description`),
  `release_date` = VALUES(`release_date`),
  `runtime_minutes` = VALUES(`runtime_minutes`),
  `content_rating` = VALUES(`content_rating`),
  `rating` = VALUES(`rating`),
  `budget` = VALUES(`budget`),
  `box_office` = VALUES(`box_office`),
  `original_language` = VALUES(`original_language`),
  `origin_country` = VALUES(`origin_country`),
  `is_featured` = VALUES(`is_featured`),
  `is_trending` = VALUES(`is_trending`),
  `is_active` = 1,
  `updated_at` = NOW();

INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'action' AND t.slug = 'godzilla-minus-zero-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'drama' AND t.slug = 'godzilla-minus-zero-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'sci-fi' AND t.slug = 'godzilla-minus-zero-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'thriller' AND t.slug = 'godzilla-minus-zero-2026';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'godzilla-minus-zero-2026' AND p.slug = 'takashi-yamazaki'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Koichi Shikishima', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'godzilla-minus-zero-2026' AND p.slug = 'ryunosuke-kamiki'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Noriko Oishi', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'godzilla-minus-zero-2026' AND p.slug = 'minami-hamabe'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Kingdom 5 (kingdom-5-2026)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Kingdom 5', 'kingdom-5-2026', 'movie', 'titles/posters/kingdom-5-2026.jpg', 'The unified dream of China demands blood, iron, and unbreakable brotherhood on the battlefields of Zhao.', '<p><strong>Kingdom 5</strong> is the epic live-action historical war drama directed by Shinsuke Sato, based on Yasuhisa Hara\'s record-breaking manga masterpiece. Starring <a href=\"/person/kento-yamazaki\">Kento Yamazaki</a> as the fearless warrior Shin alongside <a href=\"/person/ryo-yoshizawa\">Ryo Yoshizawa</a> as young King Ying Zheng (Ei Sei).</p><p>Following the heroic sacrifice of Great General Wang Qi (Ouki) at the Battle of Mayang, Qin enters a period of intense military rebuilding. Shin and his peasant-born brothers in arms, the Hi Shin Unit (Fei Xin Force), are promoted to an independent 1,000-man commander unit. As political factions in the royal court scheme for power, King Ying Zheng orders the decisive campaign into the northern plains of the Zhao state to realize his grand vision of unifying the seven warring states into one peaceful empire. Standing against them is Zhao\'s military mastermind and prime minister, Riboku (Li Mu), whose brilliant multi-stage tactical ambushes threaten to wipe Qin\'s vanguard off the map.</p>', '<h3>Grand-Scale Battle Tactics & Brotherhood</h3>
<p>The <em>Kingdom</em> live-action franchise has redefined Asian historical war epics with practical horse stunts, tens of thousands of armored extras, and intense sword choreography. In this fifth chapter, the scale expands into mountainous siege warfare and sweeping cavalry charges across the northern plains of Zhao.</p>
<p>The story focuses on Shin\'s maturation from a hot-headed orphan slave into a respected military commander. Bearing Ouki\'s enormous glaive upon his back, Shin must learn that leading a thousand men requires calm strategic foresight, logistics, and battlefield diplomacy, not just raw swinging strength. His bond with tactical assassin lieutenant Kyou Kai (Qiang Lei) deepens as she confronts the trauma of her clan\'s ritual duel.</p>

<h3>Key Characters in the Warring States</h3>
<ul>
    <li><strong>Xin / Shin (<a href=\"/person/kento-yamazaki\">Kento Yamazaki</a>):</strong> The determined commander of the Hi Shin Unit whose fiery passion inspires common soldiers to conquer insurmountable odds.</li>
    <li><strong>Ying Zheng / Ei Sei (<a href=\"/person/ryo-yoshizawa\">Ryo Yoshizawa</a>):</strong> The regal, enlightened young King of Qin whose dream of abolishing warfare through legal unification anchors the nation\'s moral spine.</li>
    <li><strong>Qiang Lei / Kyou Kai:</strong> The deadly sword-dancer lieutenant whose mystical breath technique turns her into an unstoppable hurricane in close-quarters combat.</li>
    <li><strong>Li Mu / Riboku:</strong> The soft-spoken Zhao grand general whose supreme intellect, patience, and loyalty make him the ultimate rival to Qin\'s ambitions.</li>
</ul>

<h3>A Landmark in Asian Action Cinema</h3>
<p>Filmed with sweeping drone cinematography, authentic period armory, and an epic orchestral soundtrack composed by Yutaka Yamada, <em>Kingdom 5</em> delivers pure battlefield spectacle and resonant human honor. Fans of large-scale military clashes and historical drama can explore more titles in our <a href=\"/genres/action\">Action movie catalog</a> and <a href=\"/genres/drama\">Historical drama portal</a>.</p>', '2026-07-10', 138, 'U/A 16+', 9.1, 3000000000, 8500000000, 'Japanese', 'Japan', 'released', 1, 1, 1, NOW(), NOW())
ON DUPLICATE KEY UPDATE
  `poster_path` = VALUES(`poster_path`),
  `tagline` = VALUES(`tagline`),
  `overview` = VALUES(`overview`),
  `description` = VALUES(`description`),
  `release_date` = VALUES(`release_date`),
  `runtime_minutes` = VALUES(`runtime_minutes`),
  `content_rating` = VALUES(`content_rating`),
  `rating` = VALUES(`rating`),
  `budget` = VALUES(`budget`),
  `box_office` = VALUES(`box_office`),
  `original_language` = VALUES(`original_language`),
  `origin_country` = VALUES(`origin_country`),
  `is_featured` = VALUES(`is_featured`),
  `is_trending` = VALUES(`is_trending`),
  `is_active` = 1,
  `updated_at` = NOW();

INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'action' AND t.slug = 'kingdom-5-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'drama' AND t.slug = 'kingdom-5-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'adventure' AND t.slug = 'kingdom-5-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'history' AND t.slug = 'kingdom-5-2026';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Xin / Shin (Hi Shin Unit Commander)', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'kingdom-5-2026' AND p.slug = 'kento-yamazaki'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Ying Zheng / Ei Sei (King of Qin)', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'kingdom-5-2026' AND p.slug = 'ryo-yoshizawa'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Puella Magi Madoka Magica the Movie -Walpurgisnacht: Rising (puella-magi-madoka-magica-walpurgisnacht-rising-2026)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Puella Magi Madoka Magica the Movie -Walpurgisnacht: Rising', 'puella-magi-madoka-magica-walpurgisnacht-rising-2026', 'movie', 'titles/posters/puella-magi-madoka-magica-walpurgisnacht-rising-2026.jpg', 'Now, let us continue our story. The inverted world where love defied the universe and shattered destiny.', '<p><strong>Puella Magi Madoka Magica the Movie -Walpurgisnacht: Rising</strong> (劇場版 魔法少女まどか☆マギカ 〈ワルプルギスの廻天〉) is the long-awaited cinematic sequel produced by legendary animation powerhouse Studio Shaft, reuniting original creator Magica Quartet, director Akiyuki Shinbo, and dark-fantasy screenwriter Gen Urobuchi.</p><p>Picking up directly from the shocking climax of the 2013 cult masterpiece <em>Rebellion</em>, Homura Akemi has overthrown cosmic order, tearing Madoka Kaname\'s mortal human soul away from the divine Law of Cycles to create an artificial, peaceful labyrinth where all magical girls can live ordinary school lives. However, this dreamlike false paradise begins to fracture as suppressed cosmic memories resurface. When the apocalyptic disaster entity Walpurgisnacht rises once more in an inverted form, Homura, Madoka, Sayaka Miki, Kyoko Sakura, and Mami Tomoe must confront the unbearable weight of love, despair, and the true cost of rewiring reality.</p>', '<h3>The Ultimate Resolution to an Anime Masterpiece</h3>
<p>Since its television debut in 2011, <em>Puella Magi Madoka Magica</em> has been celebrated as a revolutionary psychological deconstruction of the magical girl genre. The movie continuation addresses the lingering philosophical dilemmas left open by Homura\'s transformation into the entity known as \"Akuma Homura\" (Demon Homura).</p>
<p>The film explores whether an enforced paradise built on lies is truly preferable to painful freedom. Homura\'s supreme sacrifice was born from unconditional devotion to Madoka, but living in a world where Madoka has forgotten her divine nature gradually tears at Homura\'s own soul. When anomalies spread across Mitakihara City, the magical girls discover that Walpurgisnacht\'s revival threatens to tear the fabric of space-time apart.</p>

<h3>Key Magical Girls & Entities</h3>
<ul>
    <li><strong>Homura Akemi:</strong> The tortured time-traveler who embraced darkness to save the one she loved, struggling to maintain her fragile, fabricated world.</li>
    <li><strong>Madoka Kaname:</strong> The gentle girl whose dormant divine empathy begins to awaken as she notices impossible distortions in her daily reality.</li>
    <li><strong>Sayaka Miki & Kyoko Sakura:</strong> The fiercely loyal knight and rogue whose shared bond anchors the resistance against cosmic entropy.</li>
    <li><strong>Mami Tomoe:</strong> The elegant ribbon-gun veteran whose tactical mastery is challenged by illusions of past tragedies.</li>
    <li><strong>Kyubey / Incubators:</strong> The emotionless alien entities trapped under Homura\'s thumb, calculating a cold path back to universal entropy extraction.</li>
</ul>

<h3>Artistic Splendor & Gekidan Inu Curry Collages</h3>
<p>Studio Shaft delivers a visual tour-de-force combining cutting-edge digital animation with Gekidan Inu Curry\'s surreal stop-motion cut-out witch labyrinths. Yuki Kajiura\'s haunting orchestral score, filled with operatic strings and Gregorian choirs, brings intense psychological weight to every magical clash. Dive into more dark fantasy worlds in our <a href=\"/genres/fantasy\">Fantasy catalog</a> and <a href=\"/genres/mystery\">Mystery anime section</a>.</p>', '2026-02-27', 118, 'U/A 13+', 9.3, 1800000000, 6200000000, 'Japanese', 'Japan', 'released', 1, 1, 1, NOW(), NOW())
ON DUPLICATE KEY UPDATE
  `poster_path` = VALUES(`poster_path`),
  `tagline` = VALUES(`tagline`),
  `overview` = VALUES(`overview`),
  `description` = VALUES(`description`),
  `release_date` = VALUES(`release_date`),
  `runtime_minutes` = VALUES(`runtime_minutes`),
  `content_rating` = VALUES(`content_rating`),
  `rating` = VALUES(`rating`),
  `budget` = VALUES(`budget`),
  `box_office` = VALUES(`box_office`),
  `original_language` = VALUES(`original_language`),
  `origin_country` = VALUES(`origin_country`),
  `is_featured` = VALUES(`is_featured`),
  `is_trending` = VALUES(`is_trending`),
  `is_active` = 1,
  `updated_at` = NOW();

INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'drama' AND t.slug = 'puella-magi-madoka-magica-walpurgisnacht-rising-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'thriller' AND t.slug = 'puella-magi-madoka-magica-walpurgisnacht-rising-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'mystery' AND t.slug = 'puella-magi-madoka-magica-walpurgisnacht-rising-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'animation' AND t.slug = 'puella-magi-madoka-magica-walpurgisnacht-rising-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'fantasy' AND t.slug = 'puella-magi-madoka-magica-walpurgisnacht-rising-2026';

-- Movie: The Super Mario Galaxy Movie (the-super-mario-galaxy-movie-2026)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('The Super Mario Galaxy Movie', 'the-super-mario-galaxy-movie-2026', 'movie', 'titles/posters/the-super-mario-galaxy-movie-2026.jpg', 'Beyond the Mushroom Kingdom. Blast off into the cosmos with Mario, Luigi, and the celestial power of the stars!', '<p><strong>The Super Mario Galaxy Movie</strong> is the breathtaking cosmic animated sequel from Illumination and Nintendo, following up their historic $1.36 billion box office triumph. Directed by Aaron Horvath and Michael Jelenic, starring <a href=\"/person/chris-pratt\">Chris Pratt</a>, Charlie Day, <a href=\"/person/anya-taylor-joy\">Anya Taylor-Joy</a>, and Jack Black.</p><p>When Bowser (Jack Black) escapes his miniature bottle prison through an interstellar Koopa pirate rescue, he harnesses a mysterious dark Grand Star from the outer reaches of deep space. Threatening to extinguish every star in the night sky and reshape the universe into his volcanic empire, Bowser launches a cosmic invasion. Mario (<a href=\"/person/chris-pratt\">Chris Pratt</a>), Luigi, and Princess Peach (<a href=\"/person/anya-taylor-joy\">Anya Taylor-Joy</a>) are whisked into orbit by the majestic cosmic guardian Rosalina aboard the Comet Observatory. Together with a playful star-child named Luma, the brothers must master spherical gravity, rocket between dazzling galaxies, and collect lost Power Stars to save the universe.</p>', '<h3>A Spectacular Leap into Cosmic Platforming Adventure</h3>
<p>Building on the joyful world-building of the first film, <em>The Super Mario Galaxy Movie</em> adapts Nintendo\'s beloved Wii masterpiece <em>Super Mario Galaxy</em> into a dazzling big-screen animated spectacle. The animators at Illumination take full advantage of space physics, creating gravity-flipping camera sweeps, asteroid racing tracks, and glowing candy-colored nebulas that wow audiences of all ages.</p>
<p>The story balances rollicking physical comedy with genuine wonder. Chris Pratt imbues Mario with determined heart, while Charlie Day\'s Luigi gets his shining hero moment navigating the spooky ghost ship of the Boo Galaxy. Anya Taylor-Joy\'s Princess Peach continues to be an active, tactical leader wielding fire and ice flowers alongside the star-powered guardian Rosalina.</p>

<h3>Key Characters & Celestial Worlds</h3>
<ul>
    <li><strong>Mario (<a href=\"/person/chris-pratt\">Chris Pratt</a>):</strong> The plucky Brooklyn plumber who learns to navigate zero-gravity planetary orbits and bee-suit flight to defend the galaxy.</li>
    <li><strong>Princess Peach (<a href=\"/person/anya-taylor-joy\">Anya Taylor-Joy</a>):</strong> The poised sovereign of the Mushroom Kingdom who partners with Rosalina to unlock ancient starship defenses.</li>
    <li><strong>Rosalina:</strong> The serene, compassionate mother of the stars who watches over the universe from the Comet Observatory.</li>
    <li><strong>Bowser (Jack Black):</strong> The lovelorn, theatrical Koopa King whose booming rock anthems and cosmic battle cruisers bring hilarious megalomania to space.</li>
    <li><strong>Luma (Lumalee):</strong> The endearingly morbid yet adorable star-child whose infectious giggles and light powers guide Mario across cosmic voids.</li>
</ul>

<h3>Universal Entertainment & Chart-Topping Music</h3>
<p>With an orchestral score adapting Koji Kondo and Mahito Yokota\'s legendary space symphonies, blended with brand-new comedic rock ballads from Jack Black, the film delivers pure joy for gamers and families worldwide. Discover more family favorites in our <a href=\"/genres/animation\">Animation movies guide</a> and <a href=\"/genres/adventure\">Adventure film portal</a>.</p>', '2026-04-03', 105, 'PG', 9, 11000000000, 140000000000, 'English', 'United States', 'released', 1, 1, 1, NOW(), NOW())
ON DUPLICATE KEY UPDATE
  `poster_path` = VALUES(`poster_path`),
  `tagline` = VALUES(`tagline`),
  `overview` = VALUES(`overview`),
  `description` = VALUES(`description`),
  `release_date` = VALUES(`release_date`),
  `runtime_minutes` = VALUES(`runtime_minutes`),
  `content_rating` = VALUES(`content_rating`),
  `rating` = VALUES(`rating`),
  `budget` = VALUES(`budget`),
  `box_office` = VALUES(`box_office`),
  `original_language` = VALUES(`original_language`),
  `origin_country` = VALUES(`origin_country`),
  `is_featured` = VALUES(`is_featured`),
  `is_trending` = VALUES(`is_trending`),
  `is_active` = 1,
  `updated_at` = NOW();

INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'sci-fi' AND t.slug = 'the-super-mario-galaxy-movie-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'comedy' AND t.slug = 'the-super-mario-galaxy-movie-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'adventure' AND t.slug = 'the-super-mario-galaxy-movie-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'animation' AND t.slug = 'the-super-mario-galaxy-movie-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'family' AND t.slug = 'the-super-mario-galaxy-movie-2026';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Mario', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'the-super-mario-galaxy-movie-2026' AND p.slug = 'chris-pratt'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Princess Peach', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'the-super-mario-galaxy-movie-2026' AND p.slug = 'anya-taylor-joy'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Zootopia 2 (zootopia-2-2025)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Zootopia 2', 'zootopia-2-2025', 'movie', 'titles/posters/zootopia-2-2025.jpg', 'Hold on to your tails. Judy and Nick go undercover in the wildest, most slippery conspiracy yet.', '<p><strong>Zootopia 2</strong> is the thrilling, hilarious animated buddy-cop adventure from Walt Disney Animation Studios, directed by Byron Howard and Jared Bush, starring <a href=\"/person/ginnifer-goodwin\">Ginnifer Goodwin</a> and <a href=\"/person/jason-bateman\">Jason Bateman</a> alongside Oscar-winner Ke Huy Quan.</p><p>Following their celebrated victory over the night howler conspiracy, rookie rabbit officer Judy Hopps (<a href=\"/person/ginnifer-goodwin\">Ginnifer Goodwin</a>) and her fox partner Nick Wilde (<a href=\"/person/jason-bateman\">Jason Bateman</a>) are now established detectives on the ZPD force. However, their partnership is tested when an undercover sting operation reveals a secret reptile underworld operating beneath the mammal city\'s water canals. When a charismatic, slippery pit viper fugitive named Gary (Ke Huy Quan) is accused of sabotaging the city\'s ecological temperature grid, Judy and Nick must venture beyond their comfort zone into the humid \"Marsh Market\" and aquatic boroughs, uncovering a grand conspiracy that threatens the peace between mammals and cold-blooded residents.</p>', '<h3>Expanding the Urban Metropolis of Zootopia</h3>
<p>The original 2016 <em>Zootopia</em> grossed over $1 billion and won the Academy Award for Best Animated Feature by pairing brilliant social allegory with dazzling animated world-building. <em>Zootopia 2</em> expands that world exponentially by introducing the reptile and semi-aquatic animal communities that inhabit the wetland boroughs of the city.</p>
<p>The dynamic between Judy Hopps and Nick Wilde remains the beating heart of the story. While Judy\'s earnest optimism sometimes clashes with Nick\'s cynical street savvy, their mutual respect has grown into an unbreakable investigative partnership. When the ZPD hierarchy questions whether reptiles can truly be integrated into mammal society without danger, Judy and Nick risk their badges to uncover the truth.</p>

<h3>Key Characters & New Faces</h3>
<ul>
    <li><strong>Judy Hopps (<a href=\"/person/ginnifer-goodwin\">Ginnifer Goodwin</a>):</strong> The determined bunny detective whose faith in unity and justice drives her to look past surface prejudices.</li>
    <li><strong>Nick Wilde (<a href=\"/person/jason-bateman\">Jason Bateman</a>):</strong> The smooth-talking fox whose sharp instincts and undercover street connections prove invaluable in the murky marshes.</li>
    <li><strong>Gary the Snake (Ke Huy Quan):</strong> A highly resourceful, misunderstood pit viper whose slippery escapades keep the ZPD guessing at every turn.</li>
    <li><strong>Chief Bogo & Officer Clawhauser:</strong> The stern cape buffalo police chief and donut-loving cheetah dispatcher keeping the precinct running amidst total chaos.</li>
    <li><strong>Flash the Sloth:</strong> The fan-favorite DMV sloth whose impossibly slow reactions make a triumphant, hilarious return during an emergency pursuit.</li>
</ul>

<h3>Humor, Heart, and Social Wit</h3>
<p>With razor-sharp comedy, clever animal puns, and a powerful message about overcoming unconscious biases, <em>Zootopia 2</em> is crafted to entertain families and thoughtful filmgoers alike. Michael Giacchino returns to deliver a vibrant, brassy jazz-infused detective score. Explore more animated adventures in our <a href=\"/genres/animation\">Animation directory</a> and buddy-cop fun in the <a href=\"/genres/comedy\">Comedy portal</a>.</p>', '2025-11-26', 108, 'PG', 9.1, 15000000000, 110000000000, 'English', 'United States', 'released', 1, 1, 1, NOW(), NOW())
ON DUPLICATE KEY UPDATE
  `poster_path` = VALUES(`poster_path`),
  `tagline` = VALUES(`tagline`),
  `overview` = VALUES(`overview`),
  `description` = VALUES(`description`),
  `release_date` = VALUES(`release_date`),
  `runtime_minutes` = VALUES(`runtime_minutes`),
  `content_rating` = VALUES(`content_rating`),
  `rating` = VALUES(`rating`),
  `budget` = VALUES(`budget`),
  `box_office` = VALUES(`box_office`),
  `original_language` = VALUES(`original_language`),
  `origin_country` = VALUES(`origin_country`),
  `is_featured` = VALUES(`is_featured`),
  `is_trending` = VALUES(`is_trending`),
  `is_active` = 1,
  `updated_at` = NOW();

INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'crime' AND t.slug = 'zootopia-2-2025';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'comedy' AND t.slug = 'zootopia-2-2025';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'adventure' AND t.slug = 'zootopia-2-2025';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'mystery' AND t.slug = 'zootopia-2-2025';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'animation' AND t.slug = 'zootopia-2-2025';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Judy Hopps', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'zootopia-2-2025' AND p.slug = 'ginnifer-goodwin'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Nick Wilde', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'zootopia-2-2025' AND p.slug = 'jason-bateman'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Michael: Michael Jackson Music Biopic (michael-michael-jackson-music-biopic-2025)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Michael: Michael Jackson Music Biopic', 'michael-michael-jackson-music-biopic-2025', 'movie', 'titles/posters/michael-michael-jackson-music-biopic-2025.jpg', 'The man behind the mirror. The voice, the rhythm, and the untold humanity of the King of Pop.', '<p><strong>Michael: Michael Jackson Music Biopic</strong> is the monumental biographical musical drama directed by <a href=\"/person/antoine-fuqua\">Antoine Fuqua</a> (<em>Training Day</em>), written by three-time Oscar nominee John Logan (<em>Gladiator</em>), and produced by Graham King (the mastermind behind <em>Bohemian Rhapsody</em>).</p><p>Starring Michael\'s real-life nephew <a href=\"/person/jaafar-jackson\">Jaafar Jackson</a> in an extraordinary, uncanny breakout performance, the film chronicles the extraordinary life, creative triumphs, and deeply vulnerable personal struggles of the King of Pop. From his childhood prodigy days in Gary, Indiana leading the Jackson 5 under the strict discipline of father Joe Jackson (Colman Domingo), through the era-defining studio sessions of <em>Off the Wall</em>, <em>Thriller</em>, and <em>Bad</em> with Quincy Jones, to the legendary Motown 25 moonwalk and the grueling media circus of global superstardom, the film offers an unflinching, intimate exploration of the genius who changed world entertainment forever.</p>', '<h3>An Intimate Portrait of the King of Pop</h3>
<p>Few figures in cultural history have experienced the dizzying heights of global idolatry and the devastating isolation that accompanied Michael Jackson\'s life. Director Antoine Fuqua crafts a sweeping yet humanized epic that strips away tabloid sensationalism to explore the complex psychology of a child star who never had a childhood.</p>
<p>Jaafar Jackson\'s physical transformation is astonishing. Beyond capturing Michael\'s precise high-tenor vocal cadences, spin-kicks, and effortless anti-gravity leans, Jaafar captures the quiet gentleness, childlike wonder, and profound loneliness that defined Michael away from stadium spotlights. The film does not shy away from the intense family friction, the physical toll of his grueling rehearsals, or the relentless media intrusion that engulfed his later years.</p>

<h3>Legendary Musical Milestones</h3>
<p>The movie meticulously recreates Michael Jackson\'s greatest cultural milestones:
<ul>
    <li><strong>The Jackson 5 Era:</strong> The gritty rehearsals in Indiana that propelled young Michael, Jermaine, and his brothers to four consecutive Billboard number-one hits.</li>
    <li><strong>Motown 25 (1983):</strong> The historic televised performance of <em>\"Billie Jean\"</em> where Michael debuted the iconic fedora, rhinestone glove, and the moonwalk, changing live performance forever.</li>
    <li><strong>The Making of Thriller:</strong> Collaborating with director John Landis and Quincy Jones to transform music videos into cinematic short films.</li>
    <li><strong>The Bad World Tour:</strong> Pushing stadium concert production into unprecedented visual and sonic territory across 16 countries.</li>
</ul>
</p>

<h3>Cast & Production Excellence</h3>
<p>Alongside Jaafar Jackson, Oscar-nominee Colman Domingo delivers a powerful, multi-layered portrayal of patriarch Joe Jackson, while Nia Long brings tender grace as mother Katherine Jackson, and Miles Teller plays astute attorney John Branca. Featuring over thirty of Michael\'s original master recordings re-engineered in Dolby Atmos, this film is the definitive cinematic celebration of musical royalty. Discover more moving life stories in our <a href=\"/genres/drama\">Drama movies section</a> and <a href=\"/genres/music\">Music films portal</a>.</p>', '2025-10-03', 156, 'U/A 16+', 9.2, 15500000000, 85000000000, 'English', 'United States', 'released', 1, 1, 1, NOW(), NOW())
ON DUPLICATE KEY UPDATE
  `poster_path` = VALUES(`poster_path`),
  `tagline` = VALUES(`tagline`),
  `overview` = VALUES(`overview`),
  `description` = VALUES(`description`),
  `release_date` = VALUES(`release_date`),
  `runtime_minutes` = VALUES(`runtime_minutes`),
  `content_rating` = VALUES(`content_rating`),
  `rating` = VALUES(`rating`),
  `budget` = VALUES(`budget`),
  `box_office` = VALUES(`box_office`),
  `original_language` = VALUES(`original_language`),
  `origin_country` = VALUES(`origin_country`),
  `is_featured` = VALUES(`is_featured`),
  `is_trending` = VALUES(`is_trending`),
  `is_active` = 1,
  `updated_at` = NOW();

INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'drama' AND t.slug = 'michael-michael-jackson-music-biopic-2025';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'music' AND t.slug = 'michael-michael-jackson-music-biopic-2025';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'michael-michael-jackson-music-biopic-2025' AND p.slug = 'antoine-fuqua'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Michael Jackson', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'michael-michael-jackson-music-biopic-2025' AND p.slug = 'jaafar-jackson'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Toy Story 5 (toy-story-5-2026)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Toy Story 5', 'toy-story-5-2026', 'movie', 'titles/posters/toy-story-5-2026.jpg', 'Toy meets Tech. What happens when playtime goes digital?', '<p><strong>Toy Story 5</strong> is the landmark fifth chapter in Pixar Animation Studios\' historic, beloved franchise, written and directed by two-time Academy Award-winner <a href=\"/person/andrew-stanton\">Andrew Stanton</a> (<em>Finding Nemo</em>, <em>WALL-E</em>), featuring screen icon <a href=\"/person/tom-hanks\">Tom Hanks</a> returning as Sheriff Woody alongside Tim Allen as Buzz Lightyear.</p><p>In an era where modern childhood has shifted toward interactive tablets, gaming smart-pads, and digital screens, Bonnie and her elementary school friends begin neglecting their physical toy chest. The toys face an unprecedented existential threat: obsolescence in the face of digital technology. When a glitching army of fifty high-tech commando smart-toys called \"Lilypad\" arrive to replace traditional play, Buzz Lightyear, Jessie, Forky, and Rex find themselves on the brink of being forgotten forever. Hearing word of his friends\' crisis from the traveling carnival circuit, Woody makes the fateful decision to return and help his toy family demonstrate the timeless power of real human imagination.</p>', '<h3>The Clash Between Traditional Play and Digital Screens</h3>
<p>Pixar has always used the secret life of toys to tell profound emotional truths about growing up, letting go, and the passage of time. Under director Andrew Stanton, <em>Toy Story 5</em> tackles the single biggest cultural shift affecting modern children: the dominance of digital screens over physical tactile play.</p>
<p>The film handles this modern conflict with Pixar\'s trademark nuance. Tablets and smart toys are not depicted merely as villains, but as alluring new tools that risk isolating kids from messy, creative hands-on exploration. The contrast between an iPad that holds millions of games and a simple hand-stitched cowboy doll that holds a child\'s deepest secrets creates deeply moving storytelling.</p>

<h3>Woody and Buzz: An Eternal Friendship</h3>
<p>Following their emotional parting at the end of <em>Toy Story 4</em>, the reunion between Tom Hanks\' Woody and Tim Allen\'s Buzz Lightyear is rich with mature affection and mutual respect. Woody has grown comfortable living as a \"lost toy\" helping prize-booth toys find loving homes, while Buzz has taken up the mantle of leader in Bonnie\'s bedroom. Their paths converge in an imaginative cross-country rescue mission through modern electronics stores and automated recycling centers.</p>

<h3>Key Characters in the Toy Chest</h3>
<ul>
    <li><strong>Sheriff Woody (<a href=\"/person/tom-hanks\">Tom Hanks</a>):</strong> The pull-string cowboy whose unwavering loyalty and wisdom remind every generation what love and devotion mean.</li>
    <li><strong>Buzz Lightyear (Tim Allen):</strong> The space ranger whose laser-focused bravery and gadget troubleshooting keep the crew united in high-tech environments.</li>
    <li><strong>Jessie & Bullseye:</strong> The spirited yodeling cowgirl who refuses to let Bonnie\'s room lose its spark of joyful energy.</li>
    <li><strong>Forky & The Commando Lilypads:</strong> The handcrafted spork who provides comedic innocence while confronting the flashy, automated digital toys.</li>
</ul>

<h3>Visual Artistry & Heart</h3>
<p>Featuring breathtaking lighting, lifelike plastic textures, and Randy Newman\'s iconic musical themes re-imagined with modern electronic-acoustic warmth, <em>Toy Story 5</em> is an instant classic for all generations. Explore more beloved animation in our <a href=\"/genres/animation\">Animation collection</a> and <a href=\"/genres/family\">Family entertainment hub</a>.</p>', '2026-06-19', 102, 'G', 9.1, 20000000000, 105000000000, 'English', 'United States', 'released', 1, 1, 1, NOW(), NOW())
ON DUPLICATE KEY UPDATE
  `poster_path` = VALUES(`poster_path`),
  `tagline` = VALUES(`tagline`),
  `overview` = VALUES(`overview`),
  `description` = VALUES(`description`),
  `release_date` = VALUES(`release_date`),
  `runtime_minutes` = VALUES(`runtime_minutes`),
  `content_rating` = VALUES(`content_rating`),
  `rating` = VALUES(`rating`),
  `budget` = VALUES(`budget`),
  `box_office` = VALUES(`box_office`),
  `original_language` = VALUES(`original_language`),
  `origin_country` = VALUES(`origin_country`),
  `is_featured` = VALUES(`is_featured`),
  `is_trending` = VALUES(`is_trending`),
  `is_active` = 1,
  `updated_at` = NOW();

INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'comedy' AND t.slug = 'toy-story-5-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'adventure' AND t.slug = 'toy-story-5-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'animation' AND t.slug = 'toy-story-5-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'family' AND t.slug = 'toy-story-5-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'fantasy' AND t.slug = 'toy-story-5-2026';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'toy-story-5-2026' AND p.slug = 'andrew-stanton'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Sheriff Woody', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'toy-story-5-2026' AND p.slug = 'tom-hanks'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Cosmic Princess Kaguya! (cosmic-princess-kaguya-2026)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Cosmic Princess Kaguya!', 'cosmic-princess-kaguya-2026', 'movie', 'titles/posters/cosmic-princess-kaguya-2026.jpg', 'Born from the moon, raised among the stars. The classic Japanese legend reimagined in the cosmic reaches of deep space.', '<p><strong>Cosmic Princess Kaguya!</strong> (コズミック・プリンセス かぐや！) is an awe-inspiring, visually poetic science fiction anime fantasy feature film that reimagines Japan\'s oldest recorded folklore story, <em>The Tale of the Bamboo Cutter</em> (Taketori Monogatari), as a grand space-opera adventure.</p><p>In the distant future, an aging asteroid miner named Sanuki harvests luminous energy crystals along the Moon\'s outer orbital belt. One day, inside a glowing crystalline starlight flower, he discovers an infant girl radiating celestial energy. Naming her Kaguya, Sanuki and his wife raise her inside their orbital biosphere station. As Kaguya grows into a young woman of breathtaking beauty with the rare ability to manipulate gravitational tides and starlight, word of her grace spreads across planetary colonies. Wealthy corporate barons and spacefleet captains arrive with impossible planetary treasures to court her hand, but Kaguya\'s heart belongs to Earth\'s fragile oceans and a humble transport pilot named Mikado. However, when imperial warships from the Moon\'s hidden crystalline civilization arrive to reclaim their runaway princess, Kaguya faces an agonizing choice between divine eternity and mortal love.</p>', '<h3>Folklore Reborn as a Space Opera Odyssey</h3>
<p><em>The Tale of the Bamboo Cutter</em> is considered the ancestor of all Japanese fiction, dealing with themes of celestial royalty, the transience of human life, and the bittersweet beauty of mortal sorrow. <em>Cosmic Princess Kaguya!</em> elevates that ancient narrative into a breathtaking interstellar romance packed with spacefleet diplomacy, gravity-defying action, and philosophical depth.</p>
<p>The legendary \"Five Impossible Tasks\" of the classic fairy tale are ingeniously adapted into planetary space quests: suitors must retrieve a graviton pearl from a space dragon\'s nebula, harvest fire-rat silk from a volcanic moon\'s core, and extract cosmic swallow cowrie shells from binary star clusters. These thrilling trials showcase stunning visual creativity while reinforcing Kaguya\'s longing for genuine, unpretentious human connection over hollow displays of power.</p>

<h3>Key Characters in the Cosmos</h3>
<ul>
    <li><strong>Princess Kaguya:</strong> The ethereal lunar princess whose radiant presence and gravity-bending light powers hide a deep yearning for the simple wonders of human emotion.</li>
    <li><strong>Sanuki the Asteroid Miner:</strong> The loving adoptive father whose rough hands and humble wisdom shield Kaguya from greedy interplanetary syndicates.</li>
    <li><strong>Captain Mikado:</strong> The grounded, kind-hearted pilot of a solar transport shuttle who falls in love not with Kaguya\'s mythic status, but with her joyful, curious human spirit.</li>
    <li><strong>The Moon Emissaries (Tsuki no Shisha):</strong> Serene, terrifying celestial beings aboard luminous flying barges whose feather robes bring eternal peace by erasing all human memories.</li>
</ul>

<h3>Aesthetic Grandeur & Musical Magic</h3>
<p>Rendered with luminous cel-shaded animation, nebulae bursting with cherry-blossom pinks and sapphire blues, and a sweeping musical score combining traditional Japanese koto and shakuhachi with modern cinematic synthesizers, the movie is an emotional masterpiece. Explore more transcendent science fiction in our <a href=\"/genres/sci-fi\">Sci-Fi movies section</a> and romantic epics in the <a href=\"/genres/romance\">Romance catalog</a>.</p>', '2026-09-18', 124, 'PG', 8.9, 2200000000, 7400000000, 'Japanese', 'Japan', 'released', 1, 0, 1, NOW(), NOW())
ON DUPLICATE KEY UPDATE
  `poster_path` = VALUES(`poster_path`),
  `tagline` = VALUES(`tagline`),
  `overview` = VALUES(`overview`),
  `description` = VALUES(`description`),
  `release_date` = VALUES(`release_date`),
  `runtime_minutes` = VALUES(`runtime_minutes`),
  `content_rating` = VALUES(`content_rating`),
  `rating` = VALUES(`rating`),
  `budget` = VALUES(`budget`),
  `box_office` = VALUES(`box_office`),
  `original_language` = VALUES(`original_language`),
  `origin_country` = VALUES(`origin_country`),
  `is_featured` = VALUES(`is_featured`),
  `is_trending` = VALUES(`is_trending`),
  `is_active` = 1,
  `updated_at` = NOW();

INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'sci-fi' AND t.slug = 'cosmic-princess-kaguya-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'romance' AND t.slug = 'cosmic-princess-kaguya-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'adventure' AND t.slug = 'cosmic-princess-kaguya-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'animation' AND t.slug = 'cosmic-princess-kaguya-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'fantasy' AND t.slug = 'cosmic-princess-kaguya-2026';

-- Movie: The Samurai and the Prisoner (the-samurai-and-the-prisoner-2026)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('The Samurai and the Prisoner', 'the-samurai-and-the-prisoner-2026', 'movie', 'titles/posters/the-samurai-and-the-prisoner-2026.jpg', 'One sword, one cell, thirty days to uncover the truth before the executioner\'s blade falls.', '<p><strong>The Samurai and the Prisoner</strong> (侍と囚人) is a gripping, historically authentic Japanese Jidaigeki samurai suspense thriller that combines the moral gravity of classic Bushido literature with the airtight deduction of a classic locked-room mystery.</p><p>Set in 1688 during the frosty winter of the Genroku period in the mountainous Echigo province. Inside a heavily fortified castle, a respected clan elder is discovered poisoned inside a snow-surrounded tea pavilion that was barred from the inside with no footprints leaving the perimeter. The sole person found hiding in the castle attic is Genkuro, a silent, one-armed wandering ronin who refuses to speak or plead for his life. With clan elders demanding a swift public execution, honorable magistrate samurai Jurozaemon is granted exactly thirty days to interrogate the prisoner, verify his guilt, and prevent an all-out civil war between rival retainer clans. Through fierce psychological duels across iron bars, Jurozaemon begins to suspect that the prisoner is not a ruthless assassin, but a guardian protecting an explosive secret that could shatter the Tokugawa shogunate.</p>', '<h3>A Masterpiece of Historical Suspense and Bushido Philosophy</h3>
<p>Unlike action-heavy sword-fighting films that focus solely on slashing combat, <em>The Samurai and the Prisoner</em> draws inspiration from the intellectual traditions of Japanese *Honkaku* mystery fiction and Akira Kurosawa\'s grounded chamber dramas. The tension relies on razor-sharp dialogue, forensic examination of Edo-period poisons and lock mechanisms, and the profound moral conflict between blind feudal obedience and universal justice.</p>
<p>The daily interrogations inside the cold stone dungeon become a high-stakes psychological chess match. Jurozaemon is a Confucian scholar-samurai dedicated to the law, while Genkuro is a cynical survivor who has seen the hypocrisy of corrupt warlords hiding behind honorable titles. As the execution deadline ticks down day by day, mutual respect develops between investigator and captive, culminating in a daring courtroom revelation that exposes the clan\'s highest leadership.</p>

<h3>Key Characters in the Edo Winter</h3>
<ul>
    <li><strong>Magistrate Jurozaemon:</strong> An unyielding, deeply principled samurai investigator who refuses to execute an innocent man, even when threatened with seppuku by his superiors.</li>
    <li><strong>Genkuro the Prisoner:</strong> The scarred, battle-hardened wandering warrior whose stoic silence masks a tragic vow made to a fallen comrade.</li>
    <li><strong>Lady Sayo:</strong> The perceptive daughter of the poisoned elder whose private journals provide the crucial clue that breaks open the locked-room puzzle.</li>
    <li><strong>Elder Hotta:</strong> The scheming senior retainer whose aggressive push for quick execution conceals treasonous illegal trade with foreign merchant ships.</li>
</ul>

<h3>Atmospheric Realism & Period Authenticity</h3>
<p>Filmed entirely on location in preserved historic castles in Niigata and Kyoto during heavy winter snowfalls, the film boasts stunning natural lighting, authentic Edo-era dialect, and a minimalist, tense score played on traditional taiko drums and biwa lutes. Experience more gripping historical dramas in our <a href=\"/genres/drama\">Drama film section</a> and psychological puzzles in our <a href=\"/genres/thriller\">Thriller movie library</a>.</p>', '2026-10-16', 129, 'U/A 13+', 8.8, 1200000000, 4500000000, 'Japanese', 'Japan', 'released', 1, 0, 1, NOW(), NOW())
ON DUPLICATE KEY UPDATE
  `poster_path` = VALUES(`poster_path`),
  `tagline` = VALUES(`tagline`),
  `overview` = VALUES(`overview`),
  `description` = VALUES(`description`),
  `release_date` = VALUES(`release_date`),
  `runtime_minutes` = VALUES(`runtime_minutes`),
  `content_rating` = VALUES(`content_rating`),
  `rating` = VALUES(`rating`),
  `budget` = VALUES(`budget`),
  `box_office` = VALUES(`box_office`),
  `original_language` = VALUES(`original_language`),
  `origin_country` = VALUES(`origin_country`),
  `is_featured` = VALUES(`is_featured`),
  `is_trending` = VALUES(`is_trending`),
  `is_active` = 1,
  `updated_at` = NOW();

INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'drama' AND t.slug = 'the-samurai-and-the-prisoner-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'thriller' AND t.slug = 'the-samurai-and-the-prisoner-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'mystery' AND t.slug = 'the-samurai-and-the-prisoner-2026';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT g.id, t.id FROM `genres` g, `titles` t WHERE g.slug = 'history' AND t.slug = 'the-samurai-and-the-prisoner-2026';

SET FOREIGN_KEY_CHECKS = 1;
-- === SCRIPT COMPLETE ===
