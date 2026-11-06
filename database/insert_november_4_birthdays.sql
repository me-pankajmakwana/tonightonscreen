-- ==========================================================================
-- TonightOnScreen - November 4 Famous Celebrity Birthdays SQL Dump / Seeder
-- Date: 2026-11-04 06:29:08
-- Target Table: `people`
-- Description: Inserts or updates the 6 curated famous celebrities born on
--              November 4 (Tabu, Matthew McConaughey, Ralph Macchio, So Ji-sub,
--              Martin Balsam, Doris Roberts) with complete biographical dossiers
--              strictly between 1,500 and 2,000 characters in readable paragraphs.
-- ==========================================================================

-- Disable foreign key checks & autocommit for atomic execution
SET FOREIGN_KEY_CHECKS = 0;
SET NAMES utf8mb4;

-- --------------------------------------------------------------------------
-- Doris Roberts (Slug: doris-roberts | Bio Length: 1909 characters)
-- --------------------------------------------------------------------------
INSERT INTO `people` (
    `name`,
    `full_name`,
    `stage_name`,
    `slug`,
    `gender`,
    `known_for_department`,
    `birth_date`,
    `death_date`,
    `birth_place`,
    `nationality`,
    `residence`,
    `hometown`,
    `height`,
    `languages`,
    `education`,
    `qualification`,
    `religion`,
    `zodiac_sign`,
    `hobbies`,
    `other_talents`,
    `biography`,
    `photo_path`,
    `is_featured`,
    `status`,
    `is_active`,
    `created_at`,
    `updated_at`
) VALUES (
    'Doris Roberts',
    'Doris May Roberts',
    'Doris Roberts',
    'doris-roberts',
    'female',
    'Acting',
    '1925-11-04',
    '2016-04-17',
    'St. Louis, Missouri, USA',
    'American',
    'Los Angeles, California, USA',
    'The Bronx, New York, USA',
    '5'' 2" (1.57 m)',
    'English',
    'New York University, Neighborhood Playhouse, Actors Studio',
    'Professional Acting Training',
    'Jewish',
    'Scorpio',
    'Gourmet cooking, gardening, animal advocacy, reading, theater',
    'Comedy writing, philanthropy, public speaking',
    'Doris May Roberts was an acclaimed five-time Emmy Award-winning American actress whose warmth, impeccable comedic timing, and versatile talent delighted audiences across six decades. Born in St. Louis, Missouri, on November 4, 1925, she grew up in The Bronx, New York, raised by her mother and extended family. Although she initially studied journalism at New York University, her love for performance led her to train at the Neighborhood Playhouse and the famous Actors Studio alongside future legends like Marilyn Monroe.

Roberts made her Broadway debut in 1955 in William Saroyan''s ''The Time of Your Life'', building a respected stage career in plays by Neil Simon and Edward Albee. Her lively screen presence brought her to Hollywood, appearing in notable films like ''Something Wild'' (1961), ''A New Leaf'' (1971), ''The Taking of Pelham One Two Three'' (1974), and ''The Rose'' (1979). To millions of seasonal movie lovers, she will always be fondly remembered as the outspoken Aunt Frances in the beloved holiday classic ''National Lampoon''s Christmas Vacation'' (1989).

On television, Roberts became one of the most honored comic performers in American broadcasting history. She won her first Primetime Emmy in 1983 for a dramatic guest appearance on ''St. Elsewhere'', before starring as detective assistant Mildred Krebs in ''Remington Steele'' (1983–1987) with Pierce Brosnan. Her crowning achievement came in 1996 as the overbearing yet devoted matriarch Marie Barone on the smash-hit CBS sitcom ''Everybody Loves Raymond'' (1996–2005).

Her comedic chemistry with Ray Romano and Peter Boyle was legendary, winning her four Primetime Emmy Awards for Best Supporting Actress. Off camera, Roberts was an outspoken advocate for children''s charities and spoke before Congress against age bias in the arts. Passing away in 2016 at the age of 90, Doris Roberts remains cherished as an irreplaceable television legend.',
    'people/doris-roberts.jpg',
    0,
    'active',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `name` = VALUES(`name`),
    `full_name` = VALUES(`full_name`),
    `stage_name` = VALUES(`stage_name`),
    `gender` = VALUES(`gender`),
    `known_for_department` = VALUES(`known_for_department`),
    `birth_date` = VALUES(`birth_date`),
    `death_date` = VALUES(`death_date`),
    `birth_place` = VALUES(`birth_place`),
    `nationality` = VALUES(`nationality`),
    `residence` = VALUES(`residence`),
    `hometown` = VALUES(`hometown`),
    `height` = VALUES(`height`),
    `languages` = VALUES(`languages`),
    `education` = VALUES(`education`),
    `qualification` = VALUES(`qualification`),
    `religion` = VALUES(`religion`),
    `zodiac_sign` = VALUES(`zodiac_sign`),
    `hobbies` = VALUES(`hobbies`),
    `other_talents` = VALUES(`other_talents`),
    `biography` = VALUES(`biography`),
    `photo_path` = VALUES(`photo_path`),
    `is_featured` = VALUES(`is_featured`),
    `status` = VALUES(`status`),
    `is_active` = VALUES(`is_active`),
    `updated_at` = NOW();

-- --------------------------------------------------------------------------
-- Martin Balsam (Slug: martin-balsam | Bio Length: 1944 characters)
-- --------------------------------------------------------------------------
INSERT INTO `people` (
    `name`,
    `full_name`,
    `stage_name`,
    `slug`,
    `gender`,
    `known_for_department`,
    `birth_date`,
    `death_date`,
    `birth_place`,
    `nationality`,
    `residence`,
    `hometown`,
    `height`,
    `languages`,
    `education`,
    `qualification`,
    `religion`,
    `zodiac_sign`,
    `hobbies`,
    `other_talents`,
    `biography`,
    `photo_path`,
    `is_featured`,
    `status`,
    `is_active`,
    `created_at`,
    `updated_at`
) VALUES (
    'Martin Balsam',
    'Martin Henry Balsam',
    'Martin Balsam',
    'martin-balsam',
    'male',
    'Acting',
    '1919-11-04',
    '1996-02-13',
    'The Bronx, New York City, New York, USA',
    'American',
    'New York, USA / Rome, Italy',
    'The Bronx, New York, USA',
    '5'' 7" (1.70 m)',
    'English, Italian',
    'The New School for Social Research, Actors Studio',
    'Method Acting Training',
    'Jewish',
    'Scorpio',
    'Theater direction, classical music, art collecting',
    'Stage drama, military radio communication',
    'Martin Henry Balsam was an Oscar-winning American character actor and celebrated pillar of twentieth-century stage, film, and television. Born in The Bronx, New York City, on November 4, 1919, to Russian-Jewish immigrant parents, he developed an early interest in drama during high school. During World War II, he served honorably in the United States Army Air Forces as a radio operator. Upon returning to New York, Balsam trained at the renowned Actors Studio under Elia Kazan and Lee Strasberg, mastering the psychological realism that came to define his rich career.

Balsam made his movie debut in ''On the Waterfront'' (1954), but his legendary role as Juror #1 (the mild-mannered foreman) in Sidney Lumet''s courtroom classic ''12 Angry Men'' (1957) firmly established his place in film history. He earned another unforgettable milestone when Alfred Hitchcock cast him as the persistent private investigator Milton Arbogast in the horror masterpiece ''Psycho'' (1960), resulting in one of cinema''s most famous staircase suspense scenes.

Regarded as one of Hollywood''s most dependable character actors, Balsam won the Academy Award for Best Supporting Actor in 1965 for his brilliant performance as Arnold Burns in ''A Thousand Clowns''. His distinguished credits include Blake Edwards'' classic ''Breakfast at Tiffany''s'' (1961), the political thriller ''Seven Days in May'' (1964), Mike Nichols'' satire ''Catch-22'' (1970), the original heist classic ''The Taking of Pelham One Two Three'' (1974), and Alan J. Pakula''s investigative landmark ''All the President''s Men'' (1976).

On Broadway, Balsam won a Tony Award for his versatile performance in ''You Know I Can''t Hear You When the Water''s Running'' (1968), and he delighted television audiences as Murray Klein in the hit sitcom ''Archie Bunker''s Place''. Passing away in Rome in 1996, Martin Balsam left behind a celebrated legacy of artistic integrity, craftsmanship, and timeless cinematic excellence.',
    'people/martin-balsam.jpg',
    0,
    'active',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `name` = VALUES(`name`),
    `full_name` = VALUES(`full_name`),
    `stage_name` = VALUES(`stage_name`),
    `gender` = VALUES(`gender`),
    `known_for_department` = VALUES(`known_for_department`),
    `birth_date` = VALUES(`birth_date`),
    `death_date` = VALUES(`death_date`),
    `birth_place` = VALUES(`birth_place`),
    `nationality` = VALUES(`nationality`),
    `residence` = VALUES(`residence`),
    `hometown` = VALUES(`hometown`),
    `height` = VALUES(`height`),
    `languages` = VALUES(`languages`),
    `education` = VALUES(`education`),
    `qualification` = VALUES(`qualification`),
    `religion` = VALUES(`religion`),
    `zodiac_sign` = VALUES(`zodiac_sign`),
    `hobbies` = VALUES(`hobbies`),
    `other_talents` = VALUES(`other_talents`),
    `biography` = VALUES(`biography`),
    `photo_path` = VALUES(`photo_path`),
    `is_featured` = VALUES(`is_featured`),
    `status` = VALUES(`status`),
    `is_active` = VALUES(`is_active`),
    `updated_at` = NOW();

-- --------------------------------------------------------------------------
-- Matthew McConaughey (Slug: matthew-mcconaughey | Bio Length: 1974 characters)
-- --------------------------------------------------------------------------
INSERT INTO `people` (
    `name`,
    `full_name`,
    `stage_name`,
    `slug`,
    `gender`,
    `known_for_department`,
    `birth_date`,
    `death_date`,
    `birth_place`,
    `nationality`,
    `residence`,
    `hometown`,
    `height`,
    `languages`,
    `education`,
    `qualification`,
    `religion`,
    `zodiac_sign`,
    `hobbies`,
    `other_talents`,
    `biography`,
    `photo_path`,
    `is_featured`,
    `status`,
    `is_active`,
    `created_at`,
    `updated_at`
) VALUES (
    'Matthew McConaughey',
    'Matthew David McConaughey',
    'Matthew McConaughey',
    'matthew-mcconaughey',
    'male',
    'Acting',
    '1969-11-04',
    NULL,
    'Uvalde, Texas, USA',
    'American',
    'Austin, Texas, USA',
    'Longview, Texas, USA',
    '6'' 0" (1.83 m)',
    'English, Spanish',
    'University of Texas at Austin',
    'Bachelor of Science in Radio-Television-Film',
    'Christian',
    'Scorpio',
    'Surfing, writing, philosophical journaling, playing bongo drums',
    'Voiceover acting, screenwriting, authoring memoirs',
    'Matthew David McConaughey is an Academy Award-winning American actor and cultural icon celebrated for his charismatic Southern drawl, effortless screen presence, and dramatic transformations. Born in Uvalde, Texas, on November 4, 1969, he grew up in an active family environment. While initially considering a legal career, he discovered a passion for cinema at the University of Texas at Austin, graduating with a degree in film. His breakout moment arrived in Richard Linklater''s coming-of-age classic ''Dazed and Confused'' (1993), delivering the famous improvised phrase ''Alright, alright, alright'' that became his lifelong trademark.

Throughout the late 1990s and 2000s, McConaughey established himself as one of Hollywood''s leading men. He displayed serious dramatic range in the courtroom thriller ''A Time to Kill'' (1996) and Steven Spielberg''s historical epic ''Amistad'' (1997), before dominating global box offices as the charismatic star of beloved romantic comedies such as ''The Wedding Planner'' (2001) and ''How to Lose a Guy in 10 Days'' (2003). Despite his massive commercial success, McConaughey stepped back from studio rom-coms to challenge himself with daring independent cinema.

This bold artistic pivot sparked a celebrated career resurgence widely hailed as the ''McConaissance''. He earned critical acclaim in Jeff Nichols'' ''Mud'' (2012) and William Friedkin''s ''Killer Joe'' (2011). His artistic journey culminated in an unforgettable, transformative turn as Ron Woodroof in ''Dallas Buyers Club'' (2013), earning him the Academy Award for Best Actor. He immediately followed with an iconic turn as Detective Rust Cohle in HBO''s acclaimed crime series ''True Detective'' (2014) and starred as astronaut Cooper in Christopher Nolan''s epic sci-fi ''Interstellar'' (2014).

Off screen, McConaughey is the author of the bestselling memoir ''Greenlights'' and runs the Just Keep Livin Foundation for youth empowerment. McConaughey remains an enduring American storyteller.',
    'people/matthew-mcconaughey.jpg',
    1,
    'active',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `name` = VALUES(`name`),
    `full_name` = VALUES(`full_name`),
    `stage_name` = VALUES(`stage_name`),
    `gender` = VALUES(`gender`),
    `known_for_department` = VALUES(`known_for_department`),
    `birth_date` = VALUES(`birth_date`),
    `death_date` = VALUES(`death_date`),
    `birth_place` = VALUES(`birth_place`),
    `nationality` = VALUES(`nationality`),
    `residence` = VALUES(`residence`),
    `hometown` = VALUES(`hometown`),
    `height` = VALUES(`height`),
    `languages` = VALUES(`languages`),
    `education` = VALUES(`education`),
    `qualification` = VALUES(`qualification`),
    `religion` = VALUES(`religion`),
    `zodiac_sign` = VALUES(`zodiac_sign`),
    `hobbies` = VALUES(`hobbies`),
    `other_talents` = VALUES(`other_talents`),
    `biography` = VALUES(`biography`),
    `photo_path` = VALUES(`photo_path`),
    `is_featured` = VALUES(`is_featured`),
    `status` = VALUES(`status`),
    `is_active` = VALUES(`is_active`),
    `updated_at` = NOW();

-- --------------------------------------------------------------------------
-- Ralph Macchio (Slug: ralph-macchio | Bio Length: 1934 characters)
-- --------------------------------------------------------------------------
INSERT INTO `people` (
    `name`,
    `full_name`,
    `stage_name`,
    `slug`,
    `gender`,
    `known_for_department`,
    `birth_date`,
    `death_date`,
    `birth_place`,
    `nationality`,
    `residence`,
    `hometown`,
    `height`,
    `languages`,
    `education`,
    `qualification`,
    `religion`,
    `zodiac_sign`,
    `hobbies`,
    `other_talents`,
    `biography`,
    `photo_path`,
    `is_featured`,
    `status`,
    `is_active`,
    `created_at`,
    `updated_at`
) VALUES (
    'Ralph Macchio',
    'Ralph George Macchio Jr.',
    'Ralph Macchio',
    'ralph-macchio',
    'male',
    'Acting',
    '1961-11-04',
    NULL,
    'Huntington, Long Island, New York, USA',
    'American',
    'Long Island, New York, USA',
    'Dix Hills, New York, USA',
    '5'' 9" (1.75 m)',
    'English',
    'Half Hollow Hills High School West',
    'High School Diploma',
    'Christian',
    'Scorpio',
    'Martial arts, hockey, comic book collecting, directing',
    'Tap dancing, executive producing, guitar',
    'Ralph George Macchio Jr. is an iconic American actor and pop-culture legend whose unforgettable portrayal of underdog hero Daniel LaRusso captured the hearts of millions around the world. Born on November 4, 1961, in Huntington, Long Island, New York, Macchio began tap dancing as a young child and was discovered at a local recital. His natural charisma and boyish appeal led to commercial work and early television parts, notably a recurring role in the popular ABC comedy-drama series ''Eight Is Enough'' in the early 1980s.

His major film breakthrough came when legendary director Francis Ford Coppola chose him to play the sensitive greaser Johnny Cade in the classic coming-of-age drama ''The Outsiders'' (1983). The following year, Macchio secured the career-defining role of Daniel LaRusso in John G. Avildsen''s martial arts classic ''The Karate Kid'' (1984). The inspiring tale of a bullied teenager guided by the gentle wisdom of Mr. Miyagi (Pat Morita) became a global phenomenon, leading to two blockbuster sequels, ''The Karate Kid Part II'' (1986) and ''The Karate Kid Part III'' (1989).

Beyond the dojo, Macchio proved his range in Walter Hill''s blues drama ''Crossroads'' (1986), featuring a celebrated guitar showdown with Steve Vai, and the classic legal comedy ''My Cousin Vinny'' (1992) alongside Joe Pesci and Marisa Tomei. In subsequent decades, he appeared on Broadway, directed short films, and made memorable guest appearances on popular shows including ''Ugly Betty'', ''Psych'', and ''Entourage''.

In 2018, Macchio spearheaded one of the most successful franchise revivals in modern television by starring in and executive producing ''Cobra Kai''. Continuing the story of Daniel LaRusso and his old rival Johnny Lawrence (William Zabka), the show became an international streaming hit on Netflix, captivating original fans and welcoming new generations. Macchio remains a beloved symbol of optimism and martial arts nostalgia.',
    'people/ralph-macchio.jpg',
    0,
    'active',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `name` = VALUES(`name`),
    `full_name` = VALUES(`full_name`),
    `stage_name` = VALUES(`stage_name`),
    `gender` = VALUES(`gender`),
    `known_for_department` = VALUES(`known_for_department`),
    `birth_date` = VALUES(`birth_date`),
    `death_date` = VALUES(`death_date`),
    `birth_place` = VALUES(`birth_place`),
    `nationality` = VALUES(`nationality`),
    `residence` = VALUES(`residence`),
    `hometown` = VALUES(`hometown`),
    `height` = VALUES(`height`),
    `languages` = VALUES(`languages`),
    `education` = VALUES(`education`),
    `qualification` = VALUES(`qualification`),
    `religion` = VALUES(`religion`),
    `zodiac_sign` = VALUES(`zodiac_sign`),
    `hobbies` = VALUES(`hobbies`),
    `other_talents` = VALUES(`other_talents`),
    `biography` = VALUES(`biography`),
    `photo_path` = VALUES(`photo_path`),
    `is_featured` = VALUES(`is_featured`),
    `status` = VALUES(`status`),
    `is_active` = VALUES(`is_active`),
    `updated_at` = NOW();

-- --------------------------------------------------------------------------
-- So Ji-sub (Slug: so-ji-sub | Bio Length: 1906 characters)
-- --------------------------------------------------------------------------
INSERT INTO `people` (
    `name`,
    `full_name`,
    `stage_name`,
    `slug`,
    `gender`,
    `known_for_department`,
    `birth_date`,
    `death_date`,
    `birth_place`,
    `nationality`,
    `residence`,
    `hometown`,
    `height`,
    `languages`,
    `education`,
    `qualification`,
    `religion`,
    `zodiac_sign`,
    `hobbies`,
    `other_talents`,
    `biography`,
    `photo_path`,
    `is_featured`,
    `status`,
    `is_active`,
    `created_at`,
    `updated_at`
) VALUES (
    'So Ji-sub',
    'So Ji-sub (소지섭)',
    'So Ji-sub',
    'so-ji-sub',
    'male',
    'Acting',
    '1977-11-04',
    NULL,
    'Seoul, South Korea',
    'South Korean',
    'Seoul, South Korea',
    'Seoul, South Korea',
    '6'' 0" (1.82 m)',
    'Korean, English',
    'Chungwoon University, Korea National Sport University',
    'Degree in Broadcasting and Acting',
    'Non-religious',
    'Scorpio',
    'Competitive swimming, photography, hip-hop music, traveling',
    'Water polo, fashion modeling, film production',
    'So Ji-sub is a renowned South Korean actor, model, and leading superstar of the global Korean Wave (Hallyu) who has captivated audiences for nearly three decades. Born on November 4, 1977, in Seoul, South Korea, he initially pursued a career in competitive athletics. An accomplished swimmer and water polo player, he earned a bronze medal at the Korean National Games. To earn extra income in high school, he started modeling for the jeans brand STORM in 1995 alongside Song Seung-heon, which opened the doors to the South Korean television and entertainment industry.

After making his television debut in the 1997 drama ''Model'', So honed his acting craft through varied television projects. His major breakthrough came in 2004 with two landmark K-drama classics: the melodrama ''What Happened in Bali'' and the emotional phenomenon ''I''m Sorry, I Love You''. His haunting, poignant performance as Cha Moo-hyuk in ''I''m Sorry, I Love You'' made him a celebrated household name across Asia, winning multiple Baeksang Arts Awards and establishing his reputation for intense, emotionally charged roles.

Following military service, So returned with heightened artistic ambition. He received critical praise and multiple acting awards for the gritty action drama ''Rough Cut'' (2008). He then demonstrated his comedic talent and romantic charm in the smash-hit romantic comedy series ''Master''s Sun'' (2013) with Gong Hyo-jin, the fitness romance ''Oh My Venus'' (2015), and the spy comedy ''Terius Behind Me'' (2018), which won him the prestigious Grand Prize (Daesang) at the MBC Drama Awards.

On the big screen, So has starred in high-profile films including the historical action blockbuster ''The Battleship Island'' (2017), the romance ''Be with You'' (2018), and the sci-fi fantasy epic ''Alienoid'' (2022). With his humble personality and dedication to his craft, So Ji-sub stands as one of Korea''s most admired actors.',
    'people/so-ji-sub.jpg',
    0,
    'active',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `name` = VALUES(`name`),
    `full_name` = VALUES(`full_name`),
    `stage_name` = VALUES(`stage_name`),
    `gender` = VALUES(`gender`),
    `known_for_department` = VALUES(`known_for_department`),
    `birth_date` = VALUES(`birth_date`),
    `death_date` = VALUES(`death_date`),
    `birth_place` = VALUES(`birth_place`),
    `nationality` = VALUES(`nationality`),
    `residence` = VALUES(`residence`),
    `hometown` = VALUES(`hometown`),
    `height` = VALUES(`height`),
    `languages` = VALUES(`languages`),
    `education` = VALUES(`education`),
    `qualification` = VALUES(`qualification`),
    `religion` = VALUES(`religion`),
    `zodiac_sign` = VALUES(`zodiac_sign`),
    `hobbies` = VALUES(`hobbies`),
    `other_talents` = VALUES(`other_talents`),
    `biography` = VALUES(`biography`),
    `photo_path` = VALUES(`photo_path`),
    `is_featured` = VALUES(`is_featured`),
    `status` = VALUES(`status`),
    `is_active` = VALUES(`is_active`),
    `updated_at` = NOW();

-- --------------------------------------------------------------------------
-- Tabu (Slug: tabu | Bio Length: 1958 characters)
-- --------------------------------------------------------------------------
INSERT INTO `people` (
    `name`,
    `full_name`,
    `stage_name`,
    `slug`,
    `gender`,
    `known_for_department`,
    `birth_date`,
    `death_date`,
    `birth_place`,
    `nationality`,
    `residence`,
    `hometown`,
    `height`,
    `languages`,
    `education`,
    `qualification`,
    `religion`,
    `zodiac_sign`,
    `hobbies`,
    `other_talents`,
    `biography`,
    `photo_path`,
    `is_featured`,
    `status`,
    `is_active`,
    `created_at`,
    `updated_at`
) VALUES (
    'Tabu',
    'Tabassum Fatima Hashmi',
    'Tabu',
    'tabu',
    'female',
    'Acting',
    '1971-11-04',
    NULL,
    'Hyderabad, Telangana, India',
    'Indian',
    'Mumbai, Maharashtra, India',
    'Hyderabad, India',
    '5'' 8" (1.73 m)',
    'Hindi, Telugu, English, Urdu',
    'St. Xavier''s College, Mumbai',
    'Undergraduate Studies',
    'Islam',
    'Scorpio',
    'Reading, writing poetry, traveling, listening to classical music',
    'Voice modulation, multilingual dubbing',
    'Tabassum Fatima Hashmi, popularly known worldwide as Tabu, is one of the most respected and versatile actresses in Indian cinema history. Born in Hyderabad on November 4, 1971, into a culturally rich family, she moved to Mumbai to complete her education at St. Xavier''s College. Although she made early screen appearances as a teenager, her career as a leading actress took off in the mid-1990s. With her expressive eyes, natural grace, and tall frame, she quickly chose substantive, challenging roles that defied conventional Bollywood stereotypes.

Tabu earned national prestige by portraying complex, resilient women. She won her first National Film Award for Best Actress for her heartbreaking role as a Punjabi village girl caught in the horrors of militancy in Gulzar''s ''Maachis'' (1996). Her second National Award came with Madhur Bhandarkar''s ''Chandni Bar'' (2001), where her gritty portrayal of a bar dancer moved critics and audiences alike. She delivered dramatic masterclasses through Vishal Bhardwaj''s Shakespearean adaptations, portraying Lady Macbeth in ''Maqbool'' (2003) and Gertrude in ''Haider'' (2014).

Beyond regional cinema, Tabu gained international acclaim through global crossover productions. She shone in Mira Nair''s adaptation of Jhumpa Lahiri''s ''The Namesake'' (2006) alongside Irrfan Khan, and made a lasting impact in Ang Lee''s Oscar-winning visual wonder ''Life of Pi'' (2012). Her ability to act across Hindi, Telugu, and Tamil titles demonstrated that true artistry transcends all language barriers.

In modern cinema, Tabu dominates both box office and critical acclaim. Audiences praised her fierce performance as IG Meera Deshmukh in the blockbuster ''Drishyam'' franchise and her sly, award-winning role as the deceitful Simi in ''Andhadhun'' (2018). Having recently starred in the smash hit ''Bhool Bhulaiyaa 2'' (2022), the heist comedy ''Crew'' (2024), and HBO''s sci-fi series ''Dune: Prophecy'', Tabu stands as a timeless cinema icon.',
    'people/tabu.jpg',
    1,
    'active',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `name` = VALUES(`name`),
    `full_name` = VALUES(`full_name`),
    `stage_name` = VALUES(`stage_name`),
    `gender` = VALUES(`gender`),
    `known_for_department` = VALUES(`known_for_department`),
    `birth_date` = VALUES(`birth_date`),
    `death_date` = VALUES(`death_date`),
    `birth_place` = VALUES(`birth_place`),
    `nationality` = VALUES(`nationality`),
    `residence` = VALUES(`residence`),
    `hometown` = VALUES(`hometown`),
    `height` = VALUES(`height`),
    `languages` = VALUES(`languages`),
    `education` = VALUES(`education`),
    `qualification` = VALUES(`qualification`),
    `religion` = VALUES(`religion`),
    `zodiac_sign` = VALUES(`zodiac_sign`),
    `hobbies` = VALUES(`hobbies`),
    `other_talents` = VALUES(`other_talents`),
    `biography` = VALUES(`biography`),
    `photo_path` = VALUES(`photo_path`),
    `is_featured` = VALUES(`is_featured`),
    `status` = VALUES(`status`),
    `is_active` = VALUES(`is_active`),
    `updated_at` = NOW();

SET FOREIGN_KEY_CHECKS = 1;
