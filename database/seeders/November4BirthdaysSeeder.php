<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class November4BirthdaysSeeder extends Seeder
{
    /**
     * Run the database seeds for November 4 celebrity birthdays.
     */
    public function run(): void
    {
        $peopleData = [
            [
                'slug' => 'tabu',
                'name' => 'Tabu',
                'full_name' => 'Tabassum Fatima Hashmi',
                'stage_name' => 'Tabu',
                'gender' => 'female',
                'known_for_department' => 'Acting',
                'birth_date' => '1971-11-04',
                'death_date' => null,
                'birth_place' => 'Hyderabad, Telangana, India',
                'nationality' => 'Indian',
                'residence' => 'Mumbai, Maharashtra, India',
                'hometown' => 'Hyderabad, India',
                'height' => '5\' 8" (1.73 m)',
                'languages' => 'Hindi, Telugu, English, Urdu',
                'education' => 'St. Xavier\'s College, Mumbai',
                'qualification' => 'Undergraduate Studies',
                'religion' => 'Islam',
                'zodiac_sign' => 'Scorpio',
                'hobbies' => 'Reading, writing poetry, traveling, listening to classical music',
                'other_talents' => 'Voice modulation, multilingual dubbing',
                'photo_path' => 'people/tabu.jpg',
                'is_featured' => true,
                'status' => 'active',
                'is_active' => true,
                'biography' => "Tabassum Fatima Hashmi, popularly known worldwide as Tabu, is one of the most respected and versatile actresses in Indian cinema history. Born in Hyderabad on November 4, 1971, into a culturally rich family, she moved to Mumbai to complete her education at St. Xavier's College. Although she made early screen appearances as a teenager, her career as a leading actress took off in the mid-1990s. With her expressive eyes, natural grace, and tall frame, she quickly chose substantive, challenging roles that defied conventional Bollywood stereotypes.

Tabu earned national prestige by portraying complex, resilient women. She won her first National Film Award for Best Actress for her heartbreaking role as a Punjabi village girl caught in the horrors of militancy in Gulzar's 'Maachis' (1996). Her second National Award came with Madhur Bhandarkar's 'Chandni Bar' (2001), where her gritty portrayal of a bar dancer moved critics and audiences alike. She delivered dramatic masterclasses through Vishal Bhardwaj's Shakespearean adaptations, portraying Lady Macbeth in 'Maqbool' (2003) and Gertrude in 'Haider' (2014).

Beyond regional cinema, Tabu gained international acclaim through global crossover productions. She shone in Mira Nair's adaptation of Jhumpa Lahiri's 'The Namesake' (2006) alongside Irrfan Khan, and made a lasting impact in Ang Lee's Oscar-winning visual wonder 'Life of Pi' (2012). Her ability to act across Hindi, Telugu, and Tamil titles demonstrated that true artistry transcends all language barriers.

In modern cinema, Tabu dominates both box office and critical acclaim. Audiences praised her fierce performance as IG Meera Deshmukh in the blockbuster 'Drishyam' franchise and her sly, award-winning role as the deceitful Simi in 'Andhadhun' (2018). Having recently starred in the smash hit 'Bhool Bhulaiyaa 2' (2022), the heist comedy 'Crew' (2024), and HBO's sci-fi series 'Dune: Prophecy', Tabu stands as a timeless cinema icon.",
            ],
            [
                'slug' => 'matthew-mcconaughey',
                'name' => 'Matthew McConaughey',
                'full_name' => 'Matthew David McConaughey',
                'stage_name' => 'Matthew McConaughey',
                'gender' => 'male',
                'known_for_department' => 'Acting',
                'birth_date' => '1969-11-04',
                'death_date' => null,
                'birth_place' => 'Uvalde, Texas, USA',
                'nationality' => 'American',
                'residence' => 'Austin, Texas, USA',
                'hometown' => 'Longview, Texas, USA',
                'height' => '6\' 0" (1.83 m)',
                'languages' => 'English, Spanish',
                'education' => 'University of Texas at Austin',
                'qualification' => 'Bachelor of Science in Radio-Television-Film',
                'religion' => 'Christian',
                'zodiac_sign' => 'Scorpio',
                'hobbies' => 'Surfing, writing, philosophical journaling, playing bongo drums',
                'other_talents' => 'Voiceover acting, screenwriting, authoring memoirs',
                'photo_path' => 'people/matthew-mcconaughey.jpg',
                'is_featured' => true,
                'status' => 'active',
                'is_active' => true,
                'biography' => "Matthew David McConaughey is an Academy Award-winning American actor and cultural icon celebrated for his charismatic Southern drawl, effortless screen presence, and dramatic transformations. Born in Uvalde, Texas, on November 4, 1969, he grew up in an active family environment. While initially considering a legal career, he discovered a passion for cinema at the University of Texas at Austin, graduating with a degree in film. His breakout moment arrived in Richard Linklater's coming-of-age classic 'Dazed and Confused' (1993), delivering the famous improvised phrase 'Alright, alright, alright' that became his lifelong trademark.

Throughout the late 1990s and 2000s, McConaughey established himself as one of Hollywood's leading men. He displayed serious dramatic range in the courtroom thriller 'A Time to Kill' (1996) and Steven Spielberg's historical epic 'Amistad' (1997), before dominating global box offices as the charismatic star of beloved romantic comedies such as 'The Wedding Planner' (2001) and 'How to Lose a Guy in 10 Days' (2003). Despite his massive commercial success, McConaughey stepped back from studio rom-coms to challenge himself with daring independent cinema.

This bold artistic pivot sparked a celebrated career resurgence widely hailed as the 'McConaissance'. He earned critical acclaim in Jeff Nichols' 'Mud' (2012) and William Friedkin's 'Killer Joe' (2011). His artistic journey culminated in an unforgettable, transformative turn as Ron Woodroof in 'Dallas Buyers Club' (2013), earning him the Academy Award for Best Actor. He immediately followed with an iconic turn as Detective Rust Cohle in HBO's acclaimed crime series 'True Detective' (2014) and starred as astronaut Cooper in Christopher Nolan's epic sci-fi 'Interstellar' (2014).

Off screen, McConaughey is the author of the bestselling memoir 'Greenlights' and runs the Just Keep Livin Foundation for youth empowerment. McConaughey remains an enduring American storyteller.",
            ],
            [
                'slug' => 'ralph-macchio',
                'name' => 'Ralph Macchio',
                'full_name' => 'Ralph George Macchio Jr.',
                'stage_name' => 'Ralph Macchio',
                'gender' => 'male',
                'known_for_department' => 'Acting',
                'birth_date' => '1961-11-04',
                'death_date' => null,
                'birth_place' => 'Huntington, Long Island, New York, USA',
                'nationality' => 'American',
                'residence' => 'Long Island, New York, USA',
                'hometown' => 'Dix Hills, New York, USA',
                'height' => '5\' 9" (1.75 m)',
                'languages' => 'English',
                'education' => 'Half Hollow Hills High School West',
                'qualification' => 'High School Diploma',
                'religion' => 'Christian',
                'zodiac_sign' => 'Scorpio',
                'hobbies' => 'Martial arts, hockey, comic book collecting, directing',
                'other_talents' => 'Tap dancing, executive producing, guitar',
                'photo_path' => 'people/ralph-macchio.jpg',
                'is_featured' => false,
                'status' => 'active',
                'is_active' => true,
                'biography' => "Ralph George Macchio Jr. is an iconic American actor and pop-culture legend whose unforgettable portrayal of underdog hero Daniel LaRusso captured the hearts of millions around the world. Born on November 4, 1961, in Huntington, Long Island, New York, Macchio began tap dancing as a young child and was discovered at a local recital. His natural charisma and boyish appeal led to commercial work and early television parts, notably a recurring role in the popular ABC comedy-drama series 'Eight Is Enough' in the early 1980s.

His major film breakthrough came when legendary director Francis Ford Coppola chose him to play the sensitive greaser Johnny Cade in the classic coming-of-age drama 'The Outsiders' (1983). The following year, Macchio secured the career-defining role of Daniel LaRusso in John G. Avildsen's martial arts classic 'The Karate Kid' (1984). The inspiring tale of a bullied teenager guided by the gentle wisdom of Mr. Miyagi (Pat Morita) became a global phenomenon, leading to two blockbuster sequels, 'The Karate Kid Part II' (1986) and 'The Karate Kid Part III' (1989).

Beyond the dojo, Macchio proved his range in Walter Hill's blues drama 'Crossroads' (1986), featuring a celebrated guitar showdown with Steve Vai, and the classic legal comedy 'My Cousin Vinny' (1992) alongside Joe Pesci and Marisa Tomei. In subsequent decades, he appeared on Broadway, directed short films, and made memorable guest appearances on popular shows including 'Ugly Betty', 'Psych', and 'Entourage'.

In 2018, Macchio spearheaded one of the most successful franchise revivals in modern television by starring in and executive producing 'Cobra Kai'. Continuing the story of Daniel LaRusso and his old rival Johnny Lawrence (William Zabka), the show became an international streaming hit on Netflix, captivating original fans and welcoming new generations. Macchio remains a beloved symbol of optimism and martial arts nostalgia.",
            ],
            [
                'slug' => 'so-ji-sub',
                'name' => 'So Ji-sub',
                'full_name' => 'So Ji-sub (소지섭)',
                'stage_name' => 'So Ji-sub',
                'gender' => 'male',
                'known_for_department' => 'Acting',
                'birth_date' => '1977-11-04',
                'death_date' => null,
                'birth_place' => 'Seoul, South Korea',
                'nationality' => 'South Korean',
                'residence' => 'Seoul, South Korea',
                'hometown' => 'Seoul, South Korea',
                'height' => '6\' 0" (1.82 m)',
                'languages' => 'Korean, English',
                'education' => 'Chungwoon University, Korea National Sport University',
                'qualification' => 'Degree in Broadcasting and Acting',
                'religion' => 'Non-religious',
                'zodiac_sign' => 'Scorpio',
                'hobbies' => 'Competitive swimming, photography, hip-hop music, traveling',
                'other_talents' => 'Water polo, fashion modeling, film production',
                'photo_path' => 'people/so-ji-sub.jpg',
                'is_featured' => false,
                'status' => 'active',
                'is_active' => true,
                'biography' => "So Ji-sub is a renowned South Korean actor, model, and leading superstar of the global Korean Wave (Hallyu) who has captivated audiences for nearly three decades. Born on November 4, 1977, in Seoul, South Korea, he initially pursued a career in competitive athletics. An accomplished swimmer and water polo player, he earned a bronze medal at the Korean National Games. To earn extra income in high school, he started modeling for the jeans brand STORM in 1995 alongside Song Seung-heon, which opened the doors to the South Korean television and entertainment industry.

After making his television debut in the 1997 drama 'Model', So honed his acting craft through varied television projects. His major breakthrough came in 2004 with two landmark K-drama classics: the melodrama 'What Happened in Bali' and the emotional phenomenon 'I'm Sorry, I Love You'. His haunting, poignant performance as Cha Moo-hyuk in 'I'm Sorry, I Love You' made him a celebrated household name across Asia, winning multiple Baeksang Arts Awards and establishing his reputation for intense, emotionally charged roles.

Following military service, So returned with heightened artistic ambition. He received critical praise and multiple acting awards for the gritty action drama 'Rough Cut' (2008). He then demonstrated his comedic talent and romantic charm in the smash-hit romantic comedy series 'Master's Sun' (2013) with Gong Hyo-jin, the fitness romance 'Oh My Venus' (2015), and the spy comedy 'Terius Behind Me' (2018), which won him the prestigious Grand Prize (Daesang) at the MBC Drama Awards.

On the big screen, So has starred in high-profile films including the historical action blockbuster 'The Battleship Island' (2017), the romance 'Be with You' (2018), and the sci-fi fantasy epic 'Alienoid' (2022). With his humble personality and dedication to his craft, So Ji-sub stands as one of Korea's most admired actors.",
            ],
            [
                'slug' => 'martin-balsam',
                'name' => 'Martin Balsam',
                'full_name' => 'Martin Henry Balsam',
                'stage_name' => 'Martin Balsam',
                'gender' => 'male',
                'known_for_department' => 'Acting',
                'birth_date' => '1919-11-04',
                'death_date' => '1996-02-13',
                'birth_place' => 'The Bronx, New York City, New York, USA',
                'nationality' => 'American',
                'residence' => 'New York, USA / Rome, Italy',
                'hometown' => 'The Bronx, New York, USA',
                'height' => '5\' 7" (1.70 m)',
                'languages' => 'English, Italian',
                'education' => 'The New School for Social Research, Actors Studio',
                'qualification' => 'Method Acting Training',
                'religion' => 'Jewish',
                'zodiac_sign' => 'Scorpio',
                'hobbies' => 'Theater direction, classical music, art collecting',
                'other_talents' => 'Stage drama, military radio communication',
                'photo_path' => 'people/martin-balsam.jpg',
                'is_featured' => false,
                'status' => 'active',
                'is_active' => true,
                'biography' => "Martin Henry Balsam was an Oscar-winning American character actor and celebrated pillar of twentieth-century stage, film, and television. Born in The Bronx, New York City, on November 4, 1919, to Russian-Jewish immigrant parents, he developed an early interest in drama during high school. During World War II, he served honorably in the United States Army Air Forces as a radio operator. Upon returning to New York, Balsam trained at the renowned Actors Studio under Elia Kazan and Lee Strasberg, mastering the psychological realism that came to define his rich career.

Balsam made his movie debut in 'On the Waterfront' (1954), but his legendary role as Juror #1 (the mild-mannered foreman) in Sidney Lumet's courtroom classic '12 Angry Men' (1957) firmly established his place in film history. He earned another unforgettable milestone when Alfred Hitchcock cast him as the persistent private investigator Milton Arbogast in the horror masterpiece 'Psycho' (1960), resulting in one of cinema's most famous staircase suspense scenes.

Regarded as one of Hollywood's most dependable character actors, Balsam won the Academy Award for Best Supporting Actor in 1965 for his brilliant performance as Arnold Burns in 'A Thousand Clowns'. His distinguished credits include Blake Edwards' classic 'Breakfast at Tiffany's' (1961), the political thriller 'Seven Days in May' (1964), Mike Nichols' satire 'Catch-22' (1970), the original heist classic 'The Taking of Pelham One Two Three' (1974), and Alan J. Pakula's investigative landmark 'All the President's Men' (1976).

On Broadway, Balsam won a Tony Award for his versatile performance in 'You Know I Can't Hear You When the Water's Running' (1968), and he delighted television audiences as Murray Klein in the hit sitcom 'Archie Bunker's Place'. Passing away in Rome in 1996, Martin Balsam left behind a celebrated legacy of artistic integrity, craftsmanship, and timeless cinematic excellence.",
            ],
            [
                'slug' => 'doris-roberts',
                'name' => 'Doris Roberts',
                'full_name' => 'Doris May Roberts',
                'stage_name' => 'Doris Roberts',
                'gender' => 'female',
                'known_for_department' => 'Acting',
                'birth_date' => '1925-11-04',
                'death_date' => '2016-04-17',
                'birth_place' => 'St. Louis, Missouri, USA',
                'nationality' => 'American',
                'residence' => 'Los Angeles, California, USA',
                'hometown' => 'The Bronx, New York, USA',
                'height' => '5\' 2" (1.57 m)',
                'languages' => 'English',
                'education' => 'New York University, Neighborhood Playhouse, Actors Studio',
                'qualification' => 'Professional Acting Training',
                'religion' => 'Jewish',
                'zodiac_sign' => 'Scorpio',
                'hobbies' => 'Gourmet cooking, gardening, animal advocacy, reading, theater',
                'other_talents' => 'Comedy writing, philanthropy, public speaking',
                'photo_path' => 'people/doris-roberts.jpg',
                'is_featured' => false,
                'status' => 'active',
                'is_active' => true,
                'biography' => "Doris May Roberts was an acclaimed five-time Emmy Award-winning American actress whose warmth, impeccable comedic timing, and versatile talent delighted audiences across six decades. Born in St. Louis, Missouri, on November 4, 1925, she grew up in The Bronx, New York, raised by her mother and extended family. Although she initially studied journalism at New York University, her love for performance led her to train at the Neighborhood Playhouse and the famous Actors Studio alongside future legends like Marilyn Monroe.

Roberts made her Broadway debut in 1955 in William Saroyan's 'The Time of Your Life', building a respected stage career in plays by Neil Simon and Edward Albee. Her lively screen presence brought her to Hollywood, appearing in notable films like 'Something Wild' (1961), 'A New Leaf' (1971), 'The Taking of Pelham One Two Three' (1974), and 'The Rose' (1979). To millions of seasonal movie lovers, she will always be fondly remembered as the outspoken Aunt Frances in the beloved holiday classic 'National Lampoon's Christmas Vacation' (1989).

On television, Roberts became one of the most honored comic performers in American broadcasting history. She won her first Primetime Emmy in 1983 for a dramatic guest appearance on 'St. Elsewhere', before starring as detective assistant Mildred Krebs in 'Remington Steele' (1983–1987) with Pierce Brosnan. Her crowning achievement came in 1996 as the overbearing yet devoted matriarch Marie Barone on the smash-hit CBS sitcom 'Everybody Loves Raymond' (1996–2005).

Her comedic chemistry with Ray Romano and Peter Boyle was legendary, winning her four Primetime Emmy Awards for Best Supporting Actress. Off camera, Roberts was an outspoken advocate for children's charities and spoke before Congress against age bias in the arts. Passing away in 2016 at the age of 90, Doris Roberts remains cherished as an irreplaceable television legend.",
            ],
        ];

        foreach ($peopleData as $data) {
            $person = Person::firstOrNew(['slug' => $data['slug']]);
            foreach ($data as $key => $value) {
                $person->{$key} = $value;
            }
            $person->save();
        }

        Cache::flush();
    }
}

