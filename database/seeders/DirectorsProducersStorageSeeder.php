<?php

namespace Database\Seeders;

use App\Models\Credit;
use App\Models\Person;
use App\Models\Title;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DirectorsProducersStorageSeeder extends Seeder
{
    public function run(): void
    {
        $peopleStorageDir = storage_path('app/public/people');
        if (! File::isDirectory($peopleStorageDir)) {
            File::makeDirectory($peopleStorageDir, 0755, true);
        }

        $directorsAndProducers = [
            // ================= HOLLYWOOD VISIONARIES =================
            [
                'name' => 'Christopher Nolan',
                'wiki_title' => 'Christopher_Nolan',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1970-07-30',
                'birth_place' => 'London, England, UK',
                'biography' => 'Christopher Nolan CBE is an Academy Award-winning British-American film director, producer, and screenwriter. Known for his non-linear storytelling, practical special effects, and cinematic epics, he is regarded as one of the pre-eminent filmmakers of the 21st century. His films have grossed over $6 billion worldwide and won 18 Academy Awards, including Best Director and Best Picture for Oppenheimer (2023).',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Oppenheimer', 'slug' => 'oppenheimer-2023', 'job' => 'Director', 'department' => 'Directing'],
                    ['title' => 'The Dark Knight', 'slug' => 'the-dark-knight-2008', 'job' => 'Director', 'department' => 'Directing'],
                    ['title' => 'Inception', 'slug' => 'inception-2010', 'job' => 'Director', 'department' => 'Directing'],
                    ['title' => 'Interstellar', 'slug' => 'interstellar-2014', 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Steven Spielberg',
                'wiki_title' => 'Steven_Spielberg',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1946-12-18',
                'birth_place' => 'Cincinnati, Ohio, USA',
                'biography' => 'Steven Spielberg is an American film director, producer, and screenwriter widely considered one of the most successful and influential filmmakers in cinematic history. Winner of three Academy Awards, he pioneered the modern Hollywood blockbuster with Jaws, E.T., Raiders of the Lost Ark, Jurassic Park, and masterpieces like Schindler\'s List and Saving Private Ryan.',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Jurassic Park', 'year' => 1993, 'job' => 'Director', 'department' => 'Directing'],
                    ['title' => 'Schindler\'s List', 'year' => 1993, 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Martin Scorsese',
                'wiki_title' => 'Martin_Scorsese',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1942-11-17',
                'birth_place' => 'New York City, New York, USA',
                'biography' => 'Martin Scorsese is an Academy Award-winning American film director, producer, and screenwriter. One of the major figures of the New Hollywood era, he is celebrated for intense psychological dramas, gritty character studies, and cinematic masterworks including Taxi Driver, Raging Bull, Goodfellas, Casino, The Departed, The Wolf of Wall Street, and Killers of the Flower Moon.',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'The Wolf of Wall Street', 'slug' => 'the-wolf-of-wall-street-2013', 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Quentin Tarantino',
                'wiki_title' => 'Quentin_Tarantino',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1963-03-27',
                'birth_place' => 'Knoxville, Tennessee, USA',
                'biography' => 'Quentin Tarantino is an Academy Award-winning American film director, screenwriter, and producer. Characterized by nonlinear storylines, satirical subject matter, sharp dialogue, and stylized violence, his iconic filmography includes Pulp Fiction, Reservoir Dogs, Kill Bill: Volume 1 & 2, Inglourious Basterds, Django Unchained, and Once Upon a Time in Hollywood.',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Once Upon a Time in Hollywood', 'slug' => 'once-upon-a-time-in-hollywood-2019', 'job' => 'Director', 'department' => 'Directing'],
                    ['title' => 'Pulp Fiction', 'year' => 1994, 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'James Cameron',
                'wiki_title' => 'James_Cameron',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1954-08-16',
                'birth_place' => 'Kapuskasing, Ontario, Canada',
                'biography' => 'James Cameron is a Canadian filmmaker, ocean explorer, and technology pioneer. Renowned for creating groundbreaking science fiction and epic cinema, he directed three of the four highest-grossing films of all time: Titanic (1997), Avatar (2009), and Avatar: The Way of Water (2022), alongside sci-fi landmarks The Terminator and Aliens.',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Titanic', 'year' => 1997, 'job' => 'Director', 'department' => 'Directing'],
                    ['title' => 'Avatar', 'year' => 2009, 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Denis Villeneuve',
                'wiki_title' => 'Denis_Villeneuve',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1967-10-03',
                'birth_place' => 'Gentilly, Bécancour, Quebec, Canada',
                'biography' => 'Denis Villeneuve is a critically acclaimed Canadian filmmaker known for his thought-provoking, atmospheric, and visually spectacular cinematic style. Nominated for four Academy Awards, he has directed acclaimed sci-fi epics and thrillers including Incendies, Prisoners, Sicario, Arrival, Blade Runner 2049, Dune (2021), and Dune: Part Two (2024).',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Dune: Part Two', 'slug' => 'dune-part-two-2024', 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Greta Gerwig',
                'wiki_title' => 'Greta_Gerwig',
                'gender' => 'Female',
                'known_for_department' => 'Directing',
                'birth_date' => '1983-08-04',
                'birth_place' => 'Sacramento, California, USA',
                'biography' => 'Greta Gerwig is an acclaimed American actress, screenwriter, and director. Nominated for four Academy Awards, she became the first solo female director to have a film gross over $1 billion with the global cultural phenomenon Barbie (2023), following her critically lauded auteur films Lady Bird (2017) and Little Women (2019).',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Barbie', 'slug' => 'barbie-2023', 'job' => 'Director', 'department' => 'Directing'],
                    ['title' => 'Little Women', 'slug' => 'little-women-2019', 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'David Fincher',
                'wiki_title' => 'David_Fincher',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1962-08-28',
                'birth_place' => 'Denver, Colorado, USA',
                'biography' => 'David Fincher is an American film director and executive producer celebrated for his meticulous psychological thrillers and precise visual craft. He has earned three Academy Award nominations for Best Director, directing enduring classics such as Se7en, Fight Club, Panic Room, Zodiac, The Curious Case of Benjamin Button, The Social Network, and Gone Girl.',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Fight Club', 'slug' => 'fight-club-1999', 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Emma Thomas',
                'wiki_title' => 'Emma_Thomas',
                'gender' => 'Female',
                'known_for_department' => 'Production',
                'birth_date' => '1971-12-09',
                'birth_place' => 'London, England, UK',
                'biography' => 'Emma Thomas DBE is an Academy Award-winning British film producer. Along with husband Christopher Nolan, she co-founded Syncopy Inc. and has produced every one of Nolan\'s feature films, including The Dark Knight Trilogy, Inception, Interstellar, Dunkirk, and Oppenheimer, for which she won the Academy Award for Best Picture in 2024.',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Oppenheimer', 'slug' => 'oppenheimer-2023', 'job' => 'Producer', 'department' => 'Production'],
                    ['title' => 'The Dark Knight', 'slug' => 'the-dark-knight-2008', 'job' => 'Producer', 'department' => 'Production'],
                    ['title' => 'Inception', 'slug' => 'inception-2010', 'job' => 'Producer', 'department' => 'Production'],
                    ['title' => 'Interstellar', 'slug' => 'interstellar-2014', 'job' => 'Producer', 'department' => 'Production'],
                ]
            ],
            [
                'name' => 'Kevin Feige',
                'wiki_title' => 'Kevin_Feige',
                'gender' => 'Male',
                'known_for_department' => 'Production',
                'birth_date' => '1973-06-02',
                'birth_place' => 'Boston, Massachusetts, USA',
                'biography' => 'Kevin Feige is an American film and television producer who has been the president of Marvel Studios since 2007. The films he has produced have grossed a combined total of over $30 billion worldwide, making him the highest-grossing film producer in cinema history. He orchestrated the Marvel Cinematic Universe beginning with Iron Man (2008).',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Iron Man', 'slug' => 'iron-man-2008', 'job' => 'Producer', 'department' => 'Production'],
                ]
            ],
            [
                'name' => 'Vince Gilligan',
                'wiki_title' => 'Vince_Gilligan',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1967-02-10',
                'birth_place' => 'Richmond, Virginia, USA',
                'biography' => 'Vince Gilligan is an American writer, producer, and director best known as the creator, head writer, executive producer, and director of AMC\'s prestige drama Breaking Bad (2008–2013) and its acclaimed spin-off prequel series Better Call Saul. He has won two Primetime Emmy Awards and six Writers Guild of America Awards.',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Breaking Bad', 'slug' => 'breaking-bad-2008', 'job' => 'Creator & Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Reese Witherspoon',
                'wiki_title' => 'Reese_Witherspoon',
                'gender' => 'Female',
                'known_for_department' => 'Production',
                'birth_date' => '1976-03-22',
                'birth_place' => 'New Orleans, Louisiana, USA',
                'biography' => 'Reese Witherspoon is an Academy Award-winning American actress and producer. As founder of media company Hello Sunshine, she has championed women-led storytelling, producing award-winning prestige television series including Big Little Lies, Little Fires Everywhere, The Morning Show, and bestselling literary adaptation Where the Crawdads Sing.',
                'is_featured' => true,
                'credits' => []
            ],

            // ================= BOLLYWOOD VISIONARIES =================
            [
                'name' => 'S. S. Rajamouli',
                'wiki_title' => 'S._S._Rajamouli',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1973-10-10',
                'birth_place' => 'Amareshwara Camp, Karnataka, India',
                'biography' => 'Koduri Srisaila Sri Rajamouli is an Indian film director and screenwriter revered globally for epic action spectacles and visual grandeur. The highest-grossing Indian director in cinema history, he directed Magadheera, Eega, the historic two-part Baahubali franchise, and global award-winning sensation RRR (2022), which won the Academy Award for Best Original Song.',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'RRR', 'year' => 2022, 'job' => 'Director', 'department' => 'Directing'],
                    ['title' => 'Baahubali 2: The Conclusion', 'year' => 2017, 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Sanjay Leela Bhansali',
                'wiki_title' => 'Sanjay_Leela_Bhansali',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1963-02-24',
                'birth_place' => 'Mumbai, Maharashtra, India',
                'biography' => 'Sanjay Leela Bhansali is an Indian film director, producer, screenwriter, and music composer known for his opulent sets, rich period aesthetics, operatic storytelling, and memorable musical compositions. Recipient of seven National Film Awards and twelve Filmfare Awards, his masterpieces include Hum Dil De Chuke Sanam, Devdas, Black, Goliyon Ki Raasleela Ram-Leela, Bajirao Mastani, Padmaavat, and Gangubai Kathiawadi.',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Padmaavat', 'slug' => 'padmaavat-2018', 'job' => 'Director', 'department' => 'Directing'],
                    ['title' => 'Bajirao Mastani', 'slug' => 'bajirao-mastani-2015', 'job' => 'Director', 'department' => 'Directing'],
                    ['title' => 'Gangubai Kathiawadi', 'slug' => 'gangubai-kathiawadi-2022', 'job' => 'Director', 'department' => 'Directing'],
                    ['title' => 'Black', 'slug' => 'black-2005', 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Rajkumar Hirani',
                'wiki_title' => 'Rajkumar_Hirani',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1962-11-20',
                'birth_place' => 'Nagpur, Maharashtra, India',
                'biography' => 'Rajkumar Hirani is an acclaimed Indian film director, screenwriter, and editor renowned for blending profound social themes with heartwarming humour and emotional depth. He has directed five universally acclaimed, record-breaking blockbusters: Munna Bhai M.B.B.S. (2003), Lage Raho Munna Bhai (2006), 3 Idiots (2009), PK (2014), and Sanju (2018).',
                'is_featured' => true,
                'credits' => [
                    ['title' => '3 Idiots', 'slug' => '3-idiots-2009', 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Karan Johar',
                'wiki_title' => 'Karan_Johar',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1972-05-25',
                'birth_place' => 'Mumbai, Maharashtra, India',
                'biography' => 'Karan Johar is an Indian filmmaker and television host who heads Dharma Productions, one of the most prolific production houses in Indian cinema. Winner of two National Film Awards and six Filmfare Awards, he redefined romantic and family dramas with Kuch Kuch Hota Hai, Kabhi Khushi Kabhie Gham, My Name Is Khan, and produced blockbusters like Brahmāstra: Part One – Shiva and Rocky Aur Rani Kii Prem Kahaani.',
                'is_featured' => true,
                'credits' => []
            ],
            [
                'name' => 'Siddharth Anand',
                'wiki_title' => 'Siddharth_Anand',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1978-07-31',
                'birth_place' => 'Mumbai, Maharashtra, India',
                'biography' => 'Siddharth Anand is an Indian film director and producer acclaimed as the architect of high-octane modern Indian action cinema. He directed blockbuster milestones including Bachna Ae Haseeno, Bang Bang!, War (2019), the record-demolishing spy universe thriller Pathaan (2023) starring Shah Rukh Khan, and aerial action epic Fighter (2024).',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Pathaan', 'slug' => 'pathaan-2023', 'job' => 'Director', 'department' => 'Directing'],
                    ['title' => 'War', 'slug' => 'war-2019', 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Atlee',
                'wiki_title' => 'Atlee_(director)',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1986-09-21',
                'birth_place' => 'Madurai, Tamil Nadu, India',
                'biography' => 'Arun Kumar, known mononymously as Atlee, is an Indian film director and screenwriter celebrated for high-voltage mass action entertainers with emotional resonance. After directing Tamil cinema blockbusters Theri, Mersal, and Bigil, he made his Hindi cinema debut with the colossal global blockbuster Jawan (2023), grossing over ₹1,150 crore worldwide.',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Jawan', 'slug' => 'jawan-2023', 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Aditya Chopra',
                'wiki_title' => 'Aditya_Chopra',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1971-05-21',
                'birth_place' => 'Mumbai, Maharashtra, India',
                'biography' => 'Aditya Chopra is an Indian film director, studio executive, and screenwriter who serves as the chairman of Yash Raj Films (YRF). At age 23, he directed Dilwale Dulhania Le Jayenge (1995), the longest-running film in Indian cinema history. As producer, he masterminded the celebrated YRF Spy Universe spanning Ek Tha Tiger, War, Pathaan, and Tiger 3.',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Dilwale Dulhania Le Jayenge', 'slug' => 'dilwale-dulhania-le-jayenge-1995', 'job' => 'Director', 'department' => 'Directing'],
                    ['title' => 'Pathaan', 'slug' => 'pathaan-2023', 'job' => 'Producer', 'department' => 'Production'],
                    ['title' => 'Tiger 3', 'slug' => 'tiger-3-2023', 'job' => 'Producer', 'department' => 'Production'],
                ]
            ],
            [
                'name' => 'Zoya Akhtar',
                'wiki_title' => 'Zoya_Akhtar',
                'gender' => 'Female',
                'known_for_department' => 'Directing',
                'birth_date' => '1972-10-14',
                'birth_place' => 'Mumbai, Maharashtra, India',
                'biography' => 'Zoya Akhtar is an acclaimed Indian film director and screenwriter celebrated for her nuanced, contemporary portrayals of human relationships and societal realities. Recipient of six Filmfare Awards, she directed cinematic milestones Luck by Chance, Zindagi Na Milegi Dobara (2011), Dil Dhadakne Do, Gully Boy (2019, India\'s official Oscar entry), and web series Made in Heaven.',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Zindagi Na Milegi Dobara', 'slug' => 'zindagi-na-milegi-dobara-2011', 'job' => 'Director', 'department' => 'Directing'],
                    ['title' => 'Gully Boy', 'slug' => 'gully-boy-2019', 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Nitesh Tiwari',
                'wiki_title' => 'Nitesh_Tiwari',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1973-05-15',
                'birth_place' => 'Itarsi, Madhya Pradesh, India',
                'biography' => 'Nitesh Tiwari is an Indian film director, screenwriter, and lyricist known for crafting uplifting, inspiring sports and social dramas. He directed the legendary sports biopic Dangal (2016) starring Aamir Khan, which grossed over $340 million worldwide and remains the highest-grossing Indian film of all time, as well as National Award-winner Chhichhore (2019).',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Dangal', 'slug' => 'dangal-2016', 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Sandeep Reddy Vanga',
                'wiki_title' => 'Sandeep_Reddy_Vanga',
                'gender' => 'Male',
                'known_for_department' => 'Directing',
                'birth_date' => '1981-12-25',
                'birth_place' => 'Warangal, Telangana, India',
                'biography' => 'Sandeep Reddy Vanga is an Indian film director, screenwriter, and editor known for his raw, unapologetic, and intense filmmaking style. He burst into national prominence with Arjun Reddy (2017) and its Hindi remake Kabir Singh (2019), followed by the explosive, record-shattering global blockbuster Animal (2023) starring Ranbir Kapoor.',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Animal', 'slug' => 'animal-2023', 'job' => 'Director', 'department' => 'Directing'],
                ]
            ],
            [
                'name' => 'Gauri Khan',
                'wiki_title' => 'Gauri_Khan',
                'gender' => 'Female',
                'known_for_department' => 'Production',
                'birth_date' => '1970-10-08',
                'birth_place' => 'New Delhi, India',
                'biography' => 'Gauri Khan is an Indian film producer and interior designer. Co-chairperson of Red Chillies Entertainment alongside Shah Rukh Khan, she has produced some of the highest-grossing and culturally defining films of Hindi cinema, including Main Hoon Na, Om Shanti Om, My Name Is Khan, Ra.One, Chennai Express, Dear Zindagi, and global juggernaut Jawan (2023).',
                'is_featured' => true,
                'credits' => [
                    ['title' => 'Jawan', 'slug' => 'jawan-2023', 'job' => 'Producer', 'department' => 'Production'],
                ]
            ],
        ];

        $this->command->info("Downloading portraits and configuring storage paths for Directors & Producers...");

        $ctx = stream_context_create([
            'http' => [
                'header' => "User-Agent: TonightOnScreen/1.0 (entertainment-directory@tonightonscreen.com)\r\n",
                'timeout' => 10,
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ]
        ]);

        foreach ($directorsAndProducers as $data) {
            $slug = Str::slug($data['name']);
            $storageRelativePath = "people/{$slug}.jpg";
            $fullStoragePath = storage_path("app/public/{$storageRelativePath}");

            // 1. Download photo if not exists
            if (! file_exists($fullStoragePath) || filesize($fullStoragePath) < 1000) {
                $photoDownloaded = $this->downloadWikiPhoto($data['wiki_title'], $fullStoragePath, $ctx);
                if (! $photoDownloaded) {
                    $this->command->warn("Could not download photo for {$data['name']}, generating monogram badge.");
                    $this->createFallbackPortrait($fullStoragePath, $data['name']);
                } else {
                    $this->command->info("✓ Saved portrait to storage for {$data['name']}");
                }
            } else {
                $this->command->info("• Storage photo verified for {$data['name']}");
            }

            // 2. Insert or Update Person record
            $person = Person::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $data['name'],
                    'gender' => $data['gender'],
                    'known_for_department' => $data['known_for_department'],
                    'birth_date' => $data['birth_date'],
                    'birth_place' => $data['birth_place'],
                    'biography' => $data['biography'],
                    'photo_path' => $storageRelativePath,
                    'is_featured' => $data['is_featured'] ?? true,
                    'status' => 'active',
                ]
            );

            // 3. Connect Credits to Titles
            if (! empty($data['credits'])) {
                foreach ($data['credits'] as $index => $creditInfo) {
                    $titleSlug = $creditInfo['slug'] ?? Str::slug($creditInfo['title'] . '-' . ($creditInfo['year'] ?? '2020'));
                    
                    $title = Title::firstOrCreate(
                        ['slug' => $titleSlug],
                        [
                            'title' => $creditInfo['title'],
                            'type' => 'movie',
                            'release_date' => isset($creditInfo['year']) ? "{$creditInfo['year']}-06-15" : "2023-06-15",
                            'rating' => 8.5,
                            'runtime_minutes' => 145,
                            'content_rating' => 'PG-13',
                            'poster_path' => "titles/posters/{$titleSlug}.jpg",
                            'backdrop_path' => "titles/backdrops/{$titleSlug}.jpg",
                            'overview' => "{$creditInfo['title']} is a cinematic achievement directed/produced by {$data['name']}.",
                            'status' => 'released',
                        ]
                    );

                    Credit::updateOrCreate(
                        [
                            'creditable_type' => Title::class,
                            'creditable_id' => $title->id,
                            'person_id' => $person->id,
                            'department' => $creditInfo['department'],
                            'job' => $creditInfo['job'],
                        ],
                        [
                            'billing_order' => $index + 1,
                            'is_featured' => true,
                        ]
                    );
                }
            }
        }

        $this->command->info("All directors & producers successfully added and linked in storage!");
    }

    protected function downloadWikiPhoto(string $wikiTitle, string $destinationPath, $ctx): bool
    {
        try {
            $apiUrl = "https://en.wikipedia.org/w/api.php?action=query&titles=" . urlencode($wikiTitle) . "&prop=pageimages&format=json&pithumbsize=600";
            $jsonStr = @file_get_contents($apiUrl, false, $ctx);
            if (! $jsonStr) {
                return false;
            }

            $data = json_decode($jsonStr, true);
            if (! isset($data['query']['pages'])) {
                return false;
            }

            $page = reset($data['query']['pages']);
            if (empty($page['thumbnail']['source'])) {
                return false;
            }

            $imageUrl = $page['thumbnail']['source'];
            $imageContent = @file_get_contents($imageUrl, false, $ctx);

            if ($imageContent && strlen($imageContent) > 2000) {
                File::put($destinationPath, $imageContent);
                return true;
            }
        } catch (\Throwable $e) {
            // Silently fallback
        }

        return false;
    }

    protected function createFallbackPortrait(string $destinationPath, string $name): void
    {
        if (function_exists('imagecreatetruecolor')) {
            $im = imagecreatetruecolor(400, 500);
            $bg = imagecolorallocate($im, 1, 6, 41); // #010629
            $accent = imagecolorallocate($im, 255, 165, 0); // #FFA500
            $white = imagecolorallocate($im, 248, 250, 252);

            imagefill($im, 0, 0, $bg);
            imagefilledellipse($im, 200, 200, 160, 160, imagecolorallocate($im, 7, 16, 56));

            $initials = '';
            foreach (explode(' ', $name) as $part) {
                $initials .= strtoupper(substr($part, 0, 1));
            }

            imagestring($im, 5, 185, 190, substr($initials, 0, 2), $accent);
            imagestring($im, 4, max(20, 200 - (strlen($name) * 4)), 320, $name, $white);

            imagejpeg($im, $destinationPath, 85);
            imagedestroy($im);
        }
    }
}
