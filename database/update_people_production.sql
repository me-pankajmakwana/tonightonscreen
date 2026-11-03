-- ==============================================================================
-- COMPLETE PRODUCTION SQL SCRIPT: Personal Dossier for ALL 321 People
-- Includes: Both Active (179) and Inactive (142) Talents & Filmmakers
-- Database: tonightonscreen
-- Generated on: 2026-11-02 05:49:17
-- ==============================================================================

START TRANSACTION;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 1 | Christopher Nolan (christopher-nolan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Christopher Edward Nolan',
    `stage_name` = 'Christopher Nolan',
    `nationality` = 'British-American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'London, England & Chicago, Illinois',
    `height` = '5 ft 11 in (181 cm)',
    `languages` = 'English',
    `education` = 'University College London (UCL)',
    `qualification` = 'Bachelor of Arts in English Literature',
    `religion` = 'Agnostic',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Architecture, Film History, Philosophy',
    `other_talents` = 'Screenplay Writing, Film Production, IMAX Cinematography Innovation',
    `updated_at` = NOW()
WHERE `slug` = 'christopher-nolan' OR `id` = 1;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 2 | Cillian Murphy (cillian-murphy)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Cillian Murphy',
    `stage_name` = 'Cillian Murphy',
    `nationality` = 'Irish',
    `residence` = 'Monkstown, Dublin, Ireland',
    `hometown` = 'Ballintemple, Cork, Ireland',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'English, Irish, French',
    `education` = 'Presentation Brothers College & University College Cork',
    `qualification` = 'Dramatic Arts & Law (attended)',
    `religion` = 'Atheist',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Music, Running, Vinyl Record Collecting',
    `other_talents` = 'Guitarist, Rock Vocalist, Stage Acting, Radio DJ',
    `updated_at` = NOW()
WHERE `slug` = 'cillian-murphy' OR `id` = 2;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 3 | Robert Downey Jr. (robert-downey-jr)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Robert John Downey Jr.',
    `stage_name` = 'RDJ',
    `nationality` = 'American',
    `residence` = 'Malibu, California, USA',
    `hometown` = 'Greenwich Village, New York City, USA',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Santa Monica High School & Stagedoor Manor',
    `qualification` = 'Improvisational & Dramatic Arts Training',
    `religion` = 'Jewish / Buddhist',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Wing Chun Kung Fu, Car Restorations, Green Tech',
    `other_talents` = 'Singing, Songwriting, Martial Arts, Producer',
    `updated_at` = NOW()
WHERE `slug` = 'robert-downey-jr' OR `id` = 3;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 4 | Bryan Cranston (bryan-cranston)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Bryan Cranston',
    `stage_name` = 'Bryan Cranston',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Hollywood, Los Angeles',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'bryan-cranston' OR `id` = 4;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 5 | Vince Gilligan (vince-gilligan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Vince Gilligan',
    `stage_name` = 'Vince Gilligan',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Richmond, Virginia',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Aquarius',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'vince-gilligan' OR `id` = 5;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 6 | Tom Hanks (tom-hanks)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Thomas Jeffrey Hanks',
    `stage_name` = 'Tom Hanks (\"America\'s Dad\")',
    `nationality` = 'American-Greek',
    `residence` = 'Pacific Palisades, Los Angeles, California, USA',
    `hometown` = 'Oakland, California, USA',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Skyline High School, Chabot College & California State University, Sacramento',
    `qualification` = 'Theater Arts Degree',
    `religion` = 'Greek Orthodox',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Vintage Manual Typewriter Collecting, Space History',
    `other_talents` = 'Author (Fiction & Short Stories), Voice Acting, Film Producer',
    `updated_at` = NOW()
WHERE `slug` = 'tom-hanks' OR `id` = 6;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 7 | Emma Watson (emma-watson)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Emma Charlotte Duerre Watson',
    `stage_name` = 'Emma Watson',
    `nationality` = 'British',
    `residence` = 'London, England & Oxford, UK',
    `hometown` = 'Oxfordshire, England, UK',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'English, French',
    `education` = 'Dragon School, Headington School & Brown University',
    `qualification` = 'Bachelor of Arts in English Literature',
    `religion` = 'Spiritual / Universalist',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Reading, Certified Yoga Instructor, Meditation, Painting',
    `other_talents` = 'UN Women Goodwill Ambassador, Yoga Teacher, Author',
    `updated_at` = NOW()
WHERE `slug` = 'emma-watson' OR `id` = 7;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 8 | Reese Witherspoon (reese-witherspoon)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Reese Witherspoon',
    `stage_name` = 'Reese Witherspoon',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'New Orleans, Louisiana',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'English',
    `education` = 'Graduate School of Business & Media Studies',
    `qualification` = 'Bachelor of Business Administration (BBA)',
    `religion` = 'Christian',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Talent Management, Distribution Strategy, Script Analysis',
    `updated_at` = NOW()
WHERE `slug` = 'reese-witherspoon' OR `id` = 8;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 9 | Leonardo DiCaprio (leonardo-dicaprio)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Leonardo Wilhelm DiCaprio',
    `stage_name` = 'Leonardo DiCaprio',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Hollywood, Los Angeles, California',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English, German',
    `education` = 'Los Angeles Center for Enriched Studies',
    `qualification` = 'High School Diploma & Acting Apprenticeship',
    `religion` = 'Agnostic',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Environmental Activism, Scuba Diving, Art Collecting',
    `other_talents` = 'Documentary Filmmaking, Wildlife Conservation, Philanthropy',
    `updated_at` = NOW()
WHERE `slug` = 'leonardo-dicaprio' OR `id` = 9;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 10 | Scarlett Johansson (scarlett-johansson)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Scarlett Ingrid Johansson',
    `stage_name` = 'Scarlett Johansson',
    `nationality` = 'American',
    `residence` = 'New York City & Los Angeles, USA',
    `hometown` = 'Manhattan, New York City, USA',
    `height` = '5 ft 3 in (160 cm)',
    `languages` = 'English, French',
    `education` = 'Professional Children\'s School, Manhattan',
    `qualification` = 'Dramatic & Performing Arts Training',
    `religion` = 'Jewish',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Singing, Interior Design, Cooking, Broadway Theater',
    `other_talents` = 'Studio Recording Vocalist, Stage Actress, Producer',
    `updated_at` = NOW()
WHERE `slug` = 'scarlett-johansson' OR `id` = 10;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 11 | Margot Robbie (margot-robbie)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Margot Elise Robbie',
    `stage_name` = 'Margot Robbie',
    `nationality` = 'Australian',
    `residence` = 'Venice Beach, Los Angeles, California, USA',
    `hometown` = 'Gold Coast, Queensland, Australia',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'English',
    `education` = 'Somerset College, Gold Coast',
    `qualification` = 'Drama & Performing Arts Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Surfing, Ice Hockey, Snowboarding, Trapeze',
    `other_talents` = 'Tattoo Artist, Film Producer (LuckyChap), Ice Hockey Player',
    `updated_at` = NOW()
WHERE `slug` = 'margot-robbie' OR `id` = 11;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 12 | Tom Cruise (tom-cruise)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Thomas Cruise Mapother IV',
    `stage_name` = 'Tom Cruise',
    `nationality` = 'American',
    `residence` = 'Beverly Hills, California & Clearwater, Florida',
    `hometown` = 'Louisville, Kentucky & Glen Ridge, New Jersey',
    `height` = '5 ft 7 in (170 cm)',
    `languages` = 'English',
    `education` = 'Glen Ridge High School, New Jersey',
    `qualification` = 'High School Diploma & Commercial Flight License',
    `religion` = 'Scientology',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Aviation, Skydiving, Motorcycling, Rock Climbing',
    `other_talents` = 'Stunt Pilot, Precision Driver, Film Producer',
    `updated_at` = NOW()
WHERE `slug` = 'tom-cruise' OR `id` = 12;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 13 | Christian Bale (christian-bale)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Christian Charles Philip Bale',
    `stage_name` = 'Christian Bale',
    `nationality` = 'British',
    `residence` = 'Brentwood, Los Angeles, California, USA',
    `hometown` = 'Bournemouth, Dorset, England',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Bournemouth School, Dorset',
    `qualification` = 'Dramatic Arts Apprenticeship',
    `religion` = 'Non-religious',
    `zodiac_sign` = 'Aquarius',
    `hobbies` = 'Motorcycling, Animal Welfare, Environmental Protection',
    `other_talents` = 'Extreme Physical Body Transformation, Dialect Mastery',
    `updated_at` = NOW()
WHERE `slug` = 'christian-bale' OR `id` = 13;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 14 | Zendaya (zendaya)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Zendaya',
    `stage_name` = 'Zendaya',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Oakland, California',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'zendaya' OR `id` = 14;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 15 | Brad Pitt (brad-pitt)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'William Bradley Pitt',
    `stage_name` = 'Brad Pitt',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA & Miraval, France',
    `hometown` = 'Springfield, Missouri, USA',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'Kickapoo High School & University of Missouri',
    `qualification` = 'Journalism with Advertising focus (attended)',
    `religion` = 'Agnostic',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Architecture, Sculpting, Winemaking, Motorcycling',
    `other_talents` = 'Oscar-Winning Film Producer (Plan B), Sculptor, Vintner',
    `updated_at` = NOW()
WHERE `slug` = 'brad-pitt' OR `id` = 15;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 16 | Florence Pugh (florence-pugh)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Florence Pugh',
    `stage_name` = 'Florence Pugh',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Oxford, England',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'florence-pugh' OR `id` = 16;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 17 | Shah Rukh Khan (shah-rukh-khan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Shah Rukh Khan',
    `stage_name` = 'King Khan / SRK',
    `nationality` = 'Indian',
    `residence` = 'Mannat, Bandra West, Mumbai, India',
    `hometown` = 'New Delhi, India',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English, Urdu',
    `education` = 'St. Columba\'s School, Hansraj College & Jamia Millia Islamia',
    `qualification` = 'Bachelor of Arts in Economics (Honors)',
    `religion` = 'Islam',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Reading, Cricket, Gaming, Writing Poetry',
    `other_talents` = 'Public Speaking, Film Production, Sports Franchise Management',
    `updated_at` = NOW()
WHERE `slug` = 'shah-rukh-khan' OR `id` = 17;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 18 | Deepika Padukone (deepika-padukone)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Deepika Padukone',
    `stage_name` = 'Deepika Padukone',
    `nationality` = 'Indian',
    `residence` = 'Prabhadevi, Mumbai, Maharashtra, India',
    `hometown` = 'Bengaluru, Karnataka, India',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Hindi, English, Konkani, Kannada',
    `education` = 'Sophia High School & Mount Carmel College, Bengaluru',
    `qualification` = 'Pre-University Course (Arts)',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Badminton, Reading, Cooking, Interior Decorating',
    `other_talents` = 'National-Level Badminton Player, Classical Dance, Mental Health Advocacy',
    `updated_at` = NOW()
WHERE `slug` = 'deepika-padukone' OR `id` = 18;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 19 | Amitabh Bachchan (amitabh-bachchan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Inquilaab Srivastava',
    `stage_name` = 'Big B / Shahenshah',
    `nationality` = 'Indian',
    `residence` = 'Jalsa, Juhu, Mumbai, Maharashtra, India',
    `hometown` = 'Prayagraj, Uttar Pradesh, India',
    `height` = '6 ft 2 in (188 cm)',
    `languages` = 'Hindi, English, Urdu, Awadhi, Bengali',
    `education` = 'Sherwood College, Nainital & Kirori Mal College, Delhi University',
    `qualification` = 'Bachelor of Science (B.Sc.)',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Writing Poetry, Classical Literature, Photography, Music',
    `other_talents` = 'Iconic Baritone Voiceover, Playback Singing, Television Hosting',
    `updated_at` = NOW()
WHERE `slug` = 'amitabh-bachchan' OR `id` = 19;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 20 | Priyanka Chopra Jonas (priyanka-chopra-jonas)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Priyanka Chopra Jonas',
    `stage_name` = 'Priyanka Chopra (PeeCee)',
    `nationality` = 'Indian',
    `residence` = 'Los Angeles, California, USA & Mumbai, India',
    `hometown` = 'Bareilly, Uttar Pradesh, India',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Army Public School, Bareilly & Newton South High School, MA',
    `qualification` = 'High School & Miss World 2000 Titleholder',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Singing, Writing, Philanthropy, Interior Design',
    `other_talents` = 'Pop Music Vocalist, Film Production, UN Goodwill Ambassador',
    `updated_at` = NOW()
WHERE `slug` = 'priyanka-chopra-jonas' OR `id` = 20;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 21 | Aamir Khan (aamir-khan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Mohammed Aamir Hussain Khan',
    `stage_name` = 'Mr. Perfectionist',
    `nationality` = 'Indian',
    `residence` = 'Bandra West, Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra, India',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'Hindi, English, Urdu, Marathi',
    `education` = 'Bombay Scottish School & Narsee Monjee College',
    `qualification` = 'Higher Secondary Education',
    `religion` = 'Islam',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Chess, Tennis, Rubik\'s Cube, Reading',
    `other_talents` = 'State Tennis Champion, Film Direction, Screenplay Writing',
    `updated_at` = NOW()
WHERE `slug` = 'aamir-khan' OR `id` = 21;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 22 | Alia Bhatt (alia-bhatt)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Alia Bhatt Kapoor',
    `stage_name` = 'Alia Bhatt',
    `nationality` = 'British',
    `residence` = 'Bandra, Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra, India',
    `height` = '5 ft 3 in (160 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Jamnabai Narsee School, Mumbai',
    `qualification` = 'High School & Shiamak Davar Dance Training',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Yoga, Charcoal Sketching, Cat Lover, Reading',
    `other_talents` = 'Playback Singing, Production, Sustainable Fashion Entrepreneur',
    `updated_at` = NOW()
WHERE `slug` = 'alia-bhatt' OR `id` = 22;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 23 | Hrithik Roshan (hrithik-roshan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Hrithik Rakesh Roshan',
    `stage_name` = 'Greek God of Bollywood',
    `nationality` = 'Indian',
    `residence` = 'Juhu, Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra, India',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Bombay Scottish School & Sydenham College',
    `qualification` = 'Bachelor of Commerce (B.Com)',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Calisthenics, Fitness Training, Music, Traveling',
    `other_talents` = 'World-Class Dancer, Fitness Brand Creator (HRX), Action Stunts',
    `updated_at` = NOW()
WHERE `slug` = 'hrithik-roshan' OR `id` = 23;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 24 | Ranbir Kapoor (ranbir-kapoor)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ranbir Raj Kapoor',
    `stage_name` = 'Ranbir Kapoor',
    `nationality` = 'Indian',
    `residence` = 'Vastu, Pali Hill, Bandra, Mumbai, India',
    `hometown` = 'Mumbai, Maharashtra, India',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Hindi, English, Punjabi',
    `education` = 'School of Visual Arts & Lee Strasberg Institute, New York',
    `qualification` = 'Method Acting & Filmmaking Diploma',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Football, Sneaker Collecting, World Cinema',
    `other_talents` = 'Co-owner Mumbai City FC, Method Acting, Film Direction',
    `updated_at` = NOW()
WHERE `slug` = 'ranbir-kapoor' OR `id` = 24;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 25 | Salman Khan (salman-khan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Abdul Rashid Salim Salman Khan',
    `stage_name` = 'Bhaijaan / Sallu',
    `nationality` = 'Indian',
    `residence` = 'Galaxy Apartments, Bandra Bandstand, Mumbai, India',
    `hometown` = 'Mumbai & Indore, India',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English',
    `education` = 'The Scindia School, Gwalior & St. Stanislaus High School',
    `qualification` = 'Secondary Schooling',
    `religion` = 'Secular (Celebrates Islam and Hinduism)',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Oil Painting, Horse Riding, Bodybuilding, Cycling',
    `other_talents` = 'Canvas Painter, Playback Singer, Philanthropy (Being Human)',
    `updated_at` = NOW()
WHERE `slug` = 'salman-khan' OR `id` = 25;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 26 | Kareena Kapoor Khan (kareena-kapoor-khan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kareena Kapoor Khan',
    `stage_name` = 'Bebo',
    `nationality` = 'Indian',
    `residence` = 'Bandra West, Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra, India',
    `height` = '5 ft 4 in (163 cm)',
    `languages` = 'Hindi, English, Punjabi',
    `education` = 'Welham Girls\' School & Government Law College, Mumbai',
    `qualification` = 'Microcomputers (Harvard Summer School)',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Reading Biographies, Yoga, Italian Cooking, Swimming',
    `other_talents` = 'Author, Voice Acting, Fashion Designer',
    `updated_at` = NOW()
WHERE `slug` = 'kareena-kapoor-khan' OR `id` = 26;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 27 | Steven Spielberg (steven-spielberg)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Steven Spielberg',
    `stage_name` = 'Steven Spielberg',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Cincinnati, Ohio',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'steven-spielberg' OR `id` = 27;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 28 | Martin Scorsese (martin-scorsese)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Martin Scorsese',
    `stage_name` = 'Martin Scorsese',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'New York City, New York',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'martin-scorsese' OR `id` = 28;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 29 | Quentin Tarantino (quentin-tarantino)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Quentin Tarantino',
    `stage_name` = 'Quentin Tarantino',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Knoxville, Tennessee',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'quentin-tarantino' OR `id` = 29;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 30 | James Cameron (james-cameron)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'James Cameron',
    `stage_name` = 'James Cameron',
    `nationality` = 'Canadian',
    `residence` = 'Toronto, Ontario, Canada',
    `hometown` = 'Kapuskasing, Ontario',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'james-cameron' OR `id` = 30;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 31 | Denis Villeneuve (denis-villeneuve)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Denis Villeneuve',
    `stage_name` = 'Denis Villeneuve',
    `nationality` = 'Canadian',
    `residence` = 'Toronto, Ontario, Canada',
    `hometown` = 'Gentilly, Bécancour',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'denis-villeneuve' OR `id` = 31;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 32 | Greta Gerwig (greta-gerwig)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Greta Gerwig',
    `stage_name` = 'Greta Gerwig',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Sacramento, California',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'greta-gerwig' OR `id` = 32;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 33 | David Fincher (david-fincher)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'David Fincher',
    `stage_name` = 'David Fincher',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Denver, Colorado',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'david-fincher' OR `id` = 33;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 34 | Emma Thomas (emma-thomas)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Emma Thomas',
    `stage_name` = 'Emma Thomas',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'London, England',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Graduate School of Business & Media Studies',
    `qualification` = 'Bachelor of Business Administration (BBA)',
    `religion` = 'Christian',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Talent Management, Distribution Strategy, Script Analysis',
    `updated_at` = NOW()
WHERE `slug` = 'emma-thomas' OR `id` = 34;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 35 | Kevin Feige (kevin-feige)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kevin Feige',
    `stage_name` = 'Kevin Feige',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Boston, Massachusetts',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Graduate School of Business & Media Studies',
    `qualification` = 'Bachelor of Business Administration (BBA)',
    `religion` = 'Christian',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Talent Management, Distribution Strategy, Script Analysis',
    `updated_at` = NOW()
WHERE `slug` = 'kevin-feige' OR `id` = 35;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 36 | S. S. Rajamouli (s-s-rajamouli)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'S. S. Rajamouli',
    `stage_name` = 'S. S. Rajamouli',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Amareshwara Camp, Karnataka',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 's-s-rajamouli' OR `id` = 36;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 37 | Sanjay Leela Bhansali (sanjay-leela-bhansali)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sanjay Leela Bhansali',
    `stage_name` = 'Sanjay Leela Bhansali',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'sanjay-leela-bhansali' OR `id` = 37;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 38 | Rajkumar Hirani (rajkumar-hirani)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Rajkumar Hirani',
    `stage_name` = 'Rajkumar Hirani',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Nagpur, Maharashtra',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'rajkumar-hirani' OR `id` = 38;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 39 | Karan Johar (karan-johar)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Karan Johar',
    `stage_name` = 'Karan Johar',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'karan-johar' OR `id` = 39;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 40 | Siddharth Anand (siddharth-anand)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Siddharth Anand',
    `stage_name` = 'Siddharth Anand',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'siddharth-anand' OR `id` = 40;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 41 | Atlee (atlee)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Atlee',
    `stage_name` = 'Atlee',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Madurai, Tamil Nadu',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'atlee' OR `id` = 41;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 42 | Aditya Chopra (aditya-chopra)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Aditya Chopra',
    `stage_name` = 'Aditya Chopra',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'aditya-chopra' OR `id` = 42;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 43 | Zoya Akhtar (zoya-akhtar)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Zoya Akhtar',
    `stage_name` = 'Zoya Akhtar',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'zoya-akhtar' OR `id` = 43;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 44 | Nitesh Tiwari (nitesh-tiwari)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Nitesh Tiwari',
    `stage_name` = 'Nitesh Tiwari',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Itarsi, Madhya Pradesh',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'nitesh-tiwari' OR `id` = 44;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 45 | Sandeep Reddy Vanga (sandeep-reddy-vanga)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sandeep Reddy Vanga',
    `stage_name` = 'Sandeep Reddy Vanga',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Warangal, Telangana',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'sandeep-reddy-vanga' OR `id` = 45;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 46 | Gauri Khan (gauri-khan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Gauri Khan',
    `stage_name` = 'Gauri Khan',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'New Delhi, India',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Graduate School of Business & Media Studies',
    `qualification` = 'Bachelor of Business Administration (BBA)',
    `religion` = 'Islam',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Talent Management, Distribution Strategy, Script Analysis',
    `updated_at` = NOW()
WHERE `slug` = 'gauri-khan' OR `id` = 46;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 47 | Keanu Reeves (keanu-reeves)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Keanu Reeves',
    `stage_name` = 'Keanu Reeves',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Beirut, Lebanon',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'keanu-reeves' OR `id` = 47;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 48 | Denzel Washington (denzel-washington)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Denzel Washington',
    `stage_name` = 'Denzel Washington',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Mount Vernon, New York',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'denzel-washington' OR `id` = 48;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 49 | Meryl Streep (meryl-streep)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Meryl Streep',
    `stage_name` = 'Meryl Streep',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Summit, New Jersey',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'meryl-streep' OR `id` = 49;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 50 | Morgan Freeman (morgan-freeman)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Morgan Freeman',
    `stage_name` = 'Morgan Freeman',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Memphis, Tennessee',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'morgan-freeman' OR `id` = 50;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 51 | Anne Hathaway (anne-hathaway)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Anne Hathaway',
    `stage_name` = 'Anne Hathaway',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Brooklyn, New York',
    `height` = '5 ft 7 in (170 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'anne-hathaway' OR `id` = 51;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 52 | Matthew McConaughey (matthew-mcconaughey)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Matthew McConaughey',
    `stage_name` = 'Matthew McConaughey',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Uvalde, Texas',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'matthew-mcconaughey' OR `id` = 52;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 53 | Joaquin Phoenix (joaquin-phoenix)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Joaquin Phoenix',
    `stage_name` = 'Joaquin Phoenix',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'San Juan, Puerto Rico',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'joaquin-phoenix' OR `id` = 53;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 54 | Johnny Depp (johnny-depp)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Johnny Depp',
    `stage_name` = 'Johnny Depp',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Owensboro, Kentucky',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'johnny-depp' OR `id` = 54;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 55 | Hugh Jackman (hugh-jackman)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Hugh Jackman',
    `stage_name` = 'Hugh Jackman',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Sydney, New South Wales',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'hugh-jackman' OR `id` = 55;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 56 | Ryan Gosling (ryan-gosling)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ryan Gosling',
    `stage_name` = 'Ryan Gosling',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'London, Ontario',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ryan-gosling' OR `id` = 56;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 57 | Emma Stone (emma-stone)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Emma Stone',
    `stage_name` = 'Emma Stone',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Scottsdale, Arizona',
    `height` = '5 ft 7 in (170 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'emma-stone' OR `id` = 57;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 58 | Matt Damon (matt-damon)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Matt Damon',
    `stage_name` = 'Matt Damon',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Cambridge, Massachusetts',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'matt-damon' OR `id` = 58;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 59 | Will Smith (will-smith)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Will Smith',
    `stage_name` = 'Will Smith',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Philadelphia, Pennsylvania',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'will-smith' OR `id` = 59;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 60 | Natalie Portman (natalie-portman)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Natalie Portman',
    `stage_name` = 'Natalie Portman',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Jerusalem, Israel',
    `height` = '5 ft 4 in (163 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'natalie-portman' OR `id` = 60;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 61 | Cate Blanchett (cate-blanchett)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Cate Blanchett',
    `stage_name` = 'Cate Blanchett',
    `nationality` = 'Australian',
    `residence` = 'Sydney, Australia',
    `hometown` = 'Melbourne, Victoria',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'cate-blanchett' OR `id` = 61;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 62 | Al Pacino (al-pacino)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Al Pacino',
    `stage_name` = 'Al Pacino',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'New York City, New York',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'al-pacino' OR `id` = 62;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 63 | Robert De Niro (robert-de-niro)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Robert De Niro',
    `stage_name` = 'Robert De Niro',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'New York City, New York',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'robert-de-niro' OR `id` = 63;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 64 | Kate Winslet (kate-winslet)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kate Winslet',
    `stage_name` = 'Kate Winslet',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Reading, Berkshire',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'kate-winslet' OR `id` = 64;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 65 | George Clooney (george-clooney)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'George Clooney',
    `stage_name` = 'George Clooney',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Lexington, Kentucky',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'george-clooney' OR `id` = 65;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 66 | Harrison Ford (harrison-ford)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Harrison Ford',
    `stage_name` = 'Harrison Ford',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Chicago, Illinois',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'harrison-ford' OR `id` = 66;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 67 | Samuel L. Jackson (samuel-l-jackson)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Samuel L. Jackson',
    `stage_name` = 'Samuel L. Jackson',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Washington, D.C.',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'samuel-l-jackson' OR `id` = 67;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 68 | Jennifer Lawrence (jennifer-lawrence)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Jennifer Lawrence',
    `stage_name` = 'Jennifer Lawrence',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Indian Hills, Kentucky',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'jennifer-lawrence' OR `id` = 68;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 69 | Timothée Chalamet (timothee-chalamet)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Timothée Chalamet',
    `stage_name` = 'Timothée Chalamet',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'New York City, New York',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'timothee-chalamet' OR `id` = 69;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 70 | Pedro Pascal (pedro-pascal)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Pedro Pascal',
    `stage_name` = 'Pedro Pascal',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Santiago, Chile',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'pedro-pascal' OR `id` = 70;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 71 | Ridley Scott (ridley-scott)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ridley Scott',
    `stage_name` = 'Ridley Scott',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'South Shields, County Durham',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'ridley-scott' OR `id` = 71;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 72 | Rajinikanth (rajinikanth)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Rajinikanth',
    `stage_name` = 'Rajinikanth',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Bangalore, Mysore State',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'rajinikanth' OR `id` = 72;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 73 | Kamal Haasan (kamal-haasan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kamal Haasan',
    `stage_name` = 'Kamal Haasan',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Paramakudi, Madras State',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'kamal-haasan' OR `id` = 73;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 74 | Prabhas (prabhas)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Uppalapati Venkata Suryanarayana Prabhas Raju',
    `stage_name` = 'Rebel Star / Baahubali',
    `nationality` = 'Indian',
    `residence` = 'Jubilee Hills, Hyderabad, Telangana, India',
    `hometown` = 'Mogalthur, Andhra Pradesh, India',
    `height` = '6 ft 2 in (188 cm)',
    `languages` = 'Telugu, Hindi, Tamil, English',
    `education` = 'Sri Chaitanya College, Hyderabad',
    `qualification` = 'Bachelor of Technology (B.Tech)',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Volleyball, Gardening, Culinary Exploration, Reading',
    `other_talents` = 'Martial Arts, Swordsmanship, Horse Riding',
    `updated_at` = NOW()
WHERE `slug` = 'prabhas' OR `id` = 74;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 75 | Allu Arjun (allu-arjun)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Allu Arjun',
    `stage_name` = 'Allu Arjun',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Madras, Tamil Nadu',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'allu-arjun' OR `id` = 75;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 76 | Jr NTR (jr-ntr)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Jr NTR',
    `stage_name` = 'Jr NTR',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'Hyderabad, Andhra Pradesh',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'jr-ntr' OR `id` = 76;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 77 | Ram Charan (ram-charan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ram Charan',
    `stage_name` = 'Ram Charan',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Madras, Tamil Nadu',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ram-charan' OR `id` = 77;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 78 | Yash (yash)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Yash',
    `stage_name` = 'Yash',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Boovanahalli, Karnataka',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Kannada, English, Hindi',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'yash' OR `id` = 78;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 79 | Ajay Devgn (ajay-devgn)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ajay Devgn',
    `stage_name` = 'Ajay Devgn',
    `nationality` = 'Indian',
    `residence` = 'New Delhi, India',
    `hometown` = 'New Delhi, India',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ajay-devgn' OR `id` = 79;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 80 | Akshay Kumar (akshay-kumar)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Akshay Kumar',
    `stage_name` = 'Akshay Kumar',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Amritsar, Punjab',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'akshay-kumar' OR `id` = 80;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 81 | Ranveer Singh (ranveer-singh)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ranveer Singh',
    `stage_name` = 'Ranveer Singh',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Bombay, Maharashtra',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ranveer-singh' OR `id` = 81;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 82 | Anushka Sharma (anushka-sharma)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Anushka Sharma',
    `stage_name` = 'Anushka Sharma',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Ayodhya, Uttar Pradesh',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'anushka-sharma' OR `id` = 82;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 83 | Katrina Kaif (katrina-kaif)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Katrina Kaif',
    `stage_name` = 'Katrina Kaif',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'British Hong Kong',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'katrina-kaif' OR `id` = 83;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 84 | Nayanthara (nayanthara)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Nayanthara',
    `stage_name` = 'Nayanthara',
    `nationality` = 'Indian',
    `residence` = 'Kochi, Kerala, India',
    `hometown` = 'Tiruvalla, Kerala',
    `height` = '5 ft 4 in (163 cm)',
    `languages` = 'Malayalam, English, Tamil',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'nayanthara' OR `id` = 84;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 85 | Samantha Ruth Prabhu (samantha-ruth-prabhu)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Samantha Ruth Prabhu',
    `stage_name` = 'Samantha Ruth Prabhu',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Madras, Tamil Nadu',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'samantha-ruth-prabhu' OR `id` = 85;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 86 | Rashmika Mandanna (rashmika-mandanna)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Rashmika Mandanna',
    `stage_name` = 'Rashmika Mandanna',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Virajpet, Karnataka',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'rashmika-mandanna' OR `id` = 86;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 87 | Kartik Aaryan (kartik-aaryan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kartik Aaryan',
    `stage_name` = 'Kartik Aaryan',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Gwalior, Madhya Pradesh',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'kartik-aaryan' OR `id` = 87;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 88 | Vicky Kaushal (vicky-kaushal)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Vicky Kaushal',
    `stage_name` = 'Vicky Kaushal',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'vicky-kaushal' OR `id` = 88;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 89 | Ayushmann Khurrana (ayushmann-khurrana)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ayushmann Khurrana',
    `stage_name` = 'Ayushmann Khurrana',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Chandigarh, India',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ayushmann-khurrana' OR `id` = 89;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 90 | Shraddha Kapoor (shraddha-kapoor)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Shraddha Kapoor',
    `stage_name` = 'Shraddha Kapoor',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Bombay, Maharashtra',
    `height` = '5 ft 4 in (163 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'shraddha-kapoor' OR `id` = 90;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 91 | Kriti Sanon (kriti-sanon)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kriti Sanon',
    `stage_name` = 'Kriti Sanon',
    `nationality` = 'Indian',
    `residence` = 'New Delhi, India',
    `hometown` = 'New Delhi, India',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'kriti-sanon' OR `id` = 91;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 92 | Mani Ratnam (mani-ratnam)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Mani Ratnam',
    `stage_name` = 'Mani Ratnam',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Madurai, Madras State',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'mani-ratnam' OR `id` = 92;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 93 | Prashanth Neel (prashanth-neel)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Prashanth Neel',
    `stage_name` = 'Prashanth Neel',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Hassan, Karnataka',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'prashanth-neel' OR `id` = 93;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 94 | Anurag Kashyap (anurag-kashyap)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Anurag Kashyap',
    `stage_name` = 'Anurag Kashyap',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Gorakhpur, Uttar Pradesh',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'anurag-kashyap' OR `id` = 94;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 95 | A. R. Rahman (a-r-rahman)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'A. R. Rahman',
    `stage_name` = 'A. R. Rahman',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Madras, Tamil Nadu',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'Graduate School of Business & Media Studies',
    `qualification` = 'Bachelor of Business Administration (BBA)',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Talent Management, Distribution Strategy, Script Analysis',
    `updated_at` = NOW()
WHERE `slug` = 'a-r-rahman' OR `id` = 95;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 96 | Hans Zimmer (hans-zimmer)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Hans Zimmer',
    `stage_name` = 'Hans Zimmer',
    `nationality` = 'German',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Frankfurt am Main, West Germany',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'German, English',
    `education` = 'Graduate School of Business & Media Studies',
    `qualification` = 'Bachelor of Business Administration (BBA)',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Talent Management, Distribution Strategy, Script Analysis',
    `updated_at` = NOW()
WHERE `slug` = 'hans-zimmer' OR `id` = 96;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 97 | Francis Ford Coppola (francis-ford-coppola)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Francis Ford Coppola',
    `stage_name` = 'Francis Ford Coppola',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Detroit, Michigan',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'francis-ford-coppola' OR `id` = 97;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 98 | Marlon Brando (marlon-brando)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Marlon Brando',
    `stage_name` = 'Marlon Brando',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Omaha, Nebraska',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'marlon-brando' OR `id` = 98;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 99 | Frank Darabont (frank-darabont)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Frank Darabont',
    `stage_name` = 'Frank Darabont',
    `nationality` = 'French',
    `residence` = 'Paris, France',
    `hometown` = 'Montbéliard, Doubs',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'French, English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Aquarius',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'frank-darabont' OR `id` = 99;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 100 | Peter Jackson (peter-jackson)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Peter Jackson',
    `stage_name` = 'Peter Jackson',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Pukerua Bay, Porirua',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'peter-jackson' OR `id` = 100;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 101 | Anthony Hopkins (anthony-hopkins)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Anthony Hopkins',
    `stage_name` = 'Anthony Hopkins',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Margam, Port Talbot',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'anthony-hopkins' OR `id` = 101;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 102 | Russell Crowe (russell-crowe)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Russell Crowe',
    `stage_name` = 'Russell Crowe',
    `nationality` = 'Australian',
    `residence` = 'Sydney, Australia',
    `hometown` = 'Wellington, New Zealand',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'russell-crowe' OR `id` = 102;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 103 | Tom Hardy (tom-hardy)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Tom Hardy',
    `stage_name` = 'Tom Hardy',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Hammersmith, London',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'tom-hardy' OR `id` = 103;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 104 | Christoph Waltz (christoph-waltz)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Christoph Waltz',
    `stage_name` = 'Christoph Waltz',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Vienna, Austria',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'christoph-waltz' OR `id` = 104;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 105 | Jim Carrey (jim-carrey)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Jim Carrey',
    `stage_name` = 'Jim Carrey',
    `nationality` = 'Canadian',
    `residence` = 'Toronto, Ontario, Canada',
    `hometown` = 'Newmarket, Ontario',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'jim-carrey' OR `id` = 105;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 106 | Thalapathy Vijay (thalapathy-vijay)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Thalapathy Vijay',
    `stage_name` = 'Thalapathy Vijay',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Madras, Tamil Nadu',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'thalapathy-vijay' OR `id` = 106;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 107 | Manoj Bajpayee (manoj-bajpayee)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Manoj Bajpayee',
    `stage_name` = 'Manoj Bajpayee',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Belwa, West Champaran',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'manoj-bajpayee' OR `id` = 107;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 108 | Nawazuddin Siddiqui (nawazuddin-siddiqui)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Nawazuddin Siddiqui',
    `stage_name` = 'Nawazuddin Siddiqui',
    `nationality` = 'Indian',
    `residence` = 'New Delhi, India',
    `hometown` = 'Budhana, Muzaffarnagar',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'nawazuddin-siddiqui' OR `id` = 108;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 109 | Pankaj Tripathi (pankaj-tripathi)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Pankaj Tripathi',
    `stage_name` = 'Pankaj Tripathi',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Belsand, Gopalganj',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'pankaj-tripathi' OR `id` = 109;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 110 | Tabu (tabu)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Tabu',
    `stage_name` = 'Tabu',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'Hyderabad, Andhra Pradesh',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'tabu' OR `id` = 110;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 111 | Rajkummar Rao (rajkummar-rao)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Rajkummar Rao',
    `stage_name` = 'Rajkummar Rao',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Gurgaon, Haryana',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'rajkummar-rao' OR `id` = 111;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 112 | Rishab Shetty (rishab-shetty)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Rishab Shetty',
    `stage_name` = 'Rishab Shetty',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Keradi, Kundapura',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Kannada, English, Hindi',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'rishab-shetty' OR `id` = 112;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 113 | Aishwarya Rai Bachchan (aishwarya-rai-bachchan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Aishwarya Rai Bachchan',
    `stage_name` = 'Aishwarya Rai',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mangalore, Karnataka',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'aishwarya-rai-bachchan' OR `id` = 113;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 114 | Fahadh Faasil (fahadh-faasil)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Abdul Hameed Mohammed Fahad Fazil',
    `stage_name` = 'FaFa',
    `nationality` = 'Indian',
    `residence` = 'Kochi, Kerala, India',
    `hometown` = 'Alappuzha, Kerala, India',
    `height` = '5 ft 7 in (170 cm)',
    `languages` = 'Malayalam, English, Tamil, Telugu, Hindi',
    `education` = 'Lawrence School Lovedale & University of Miami',
    `qualification` = 'Master of Arts in Philosophy',
    `religion` = 'Islam',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Traveling, Philosophy Reading, Long Highway Drives',
    `other_talents` = 'Method Acting, Micro-expression Control, Film Production',
    `updated_at` = NOW()
WHERE `slug` = 'fahadh-faasil' OR `id` = 114;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 115 | Pratik Gandhi (pratik-gandhi)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Pratik Gandhi',
    `stage_name` = 'Pratik Gandhi',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Surat, Gujarat',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'pratik-gandhi' OR `id` = 115;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 116 | Hansal Mehta (hansal-mehta)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Hansal Mehta',
    `stage_name` = 'Hansal Mehta',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Bombay, Maharashtra',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'hansal-mehta' OR `id` = 116;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 117 | Chiyaan Vikram (chiyaan-vikram)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Chiyaan Vikram',
    `stage_name` = 'Chiyaan Vikram',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Madras, Tamil Nadu',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'chiyaan-vikram' OR `id` = 117;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 118 | Sukumar (sukumar)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sukumar',
    `stage_name` = 'Sukumar',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'Mattaparru, East Godavari',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'sukumar' OR `id` = 118;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 119 | Nag Ashwin (nag-ashwin)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Nag Ashwin',
    `stage_name` = 'Nag Ashwin',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'Hyderabad, Andhra Pradesh',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'nag-ashwin' OR `id` = 119;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 120 | Lokesh Kanagaraj (lokesh-kanagaraj)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Lokesh Kanagaraj',
    `stage_name` = 'Lokesh Kanagaraj',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Kinathukadavu, Coimbatore',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'lokesh-kanagaraj' OR `id` = 120;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 121 | Deepak Kumar Mishra (deepak-kumar-mishra)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Deepak Kumar Mishra',
    `stage_name` = 'Deepak Kumar Mishra',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Varanasi, Uttar Pradesh',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'deepak-kumar-mishra' OR `id` = 121;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 122 | Arnold Schwarzenegger (arnold-schwarzenegger)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Arnold Schwarzenegger',
    `stage_name` = 'Arnold Schwarzenegger',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Thal, Styria',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'arnold-schwarzenegger' OR `id` = 122;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 123 | Sigourney Weaver (sigourney-weaver)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sigourney Weaver',
    `stage_name` = 'Sigourney Weaver',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Manhattan, New York City',
    `height` = '5 ft 7 in (170 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'sigourney-weaver' OR `id` = 123;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 124 | Ryan Reynolds (ryan-reynolds)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ryan Reynolds',
    `stage_name` = 'Ryan Reynolds',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Vancouver, British Columbia',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ryan-reynolds' OR `id` = 124;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 125 | Stanley Kubrick (stanley-kubrick)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Stanley Kubrick',
    `stage_name` = 'Stanley Kubrick',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'The Bronx, New York City',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'stanley-kubrick' OR `id` = 125;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 126 | Alfred Hitchcock (alfred-hitchcock)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Alfred Hitchcock',
    `stage_name` = 'Alfred Hitchcock',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Leytonstone, Essex',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'alfred-hitchcock' OR `id` = 126;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 127 | Bong Joon-ho (bong-joon-ho)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Bong Joon-ho',
    `stage_name` = 'Bong Joon-ho',
    `nationality` = 'South Korean',
    `residence` = 'Seoul, South Korea',
    `hometown` = 'Daegu, South Korea',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Korean, English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Buddhist traditions',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'bong-joon-ho' OR `id` = 127;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 128 | Bob Odenkirk (bob-odenkirk)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Bob Odenkirk',
    `stage_name` = 'Bob Odenkirk',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Berwyn, Illinois',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'bob-odenkirk' OR `id` = 128;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 129 | James Gandolfini (james-gandolfini)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'James Gandolfini',
    `stage_name` = 'James Gandolfini',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Westwood, New Jersey',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'james-gandolfini' OR `id` = 129;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 130 | Idris Elba (idris-elba)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Idris Elba',
    `stage_name` = 'Idris Elba',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Hackney, London',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'idris-elba' OR `id` = 130;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 131 | Jeremy Allen White (jeremy-allen-white)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Jeremy Allen White',
    `stage_name` = 'Jeremy Allen White',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Brooklyn, New York City',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Aquarius',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'jeremy-allen-white' OR `id` = 131;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 132 | Shahid Kapoor (shahid-kapoor)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Shahid Kapoor',
    `stage_name` = 'Shahid Kapoor',
    `nationality` = 'Indian',
    `residence` = 'New Delhi, India',
    `hometown` = 'New Delhi, India',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'shahid-kapoor' OR `id` = 132;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 133 | Irrfan Khan (irrfan-khan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Irrfan Khan',
    `stage_name` = 'Irrfan Khan',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Tonk, Rajasthan',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'irrfan-khan' OR `id` = 133;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 134 | Dhanush (dhanush)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Dhanush',
    `stage_name` = 'Dhanush',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Madras, Tamil Nadu',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'dhanush' OR `id` = 134;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 135 | S. Shankar (s-shankar)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'S. Shankar',
    `stage_name` = 'S. Shankar',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Kumbakonam, Madras State',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 's-shankar' OR `id` = 135;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 136 | Vetrimaaran (vetrimaaran)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Vetrimaaran',
    `stage_name` = 'Vetrimaaran',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Ranipet, Tamil Nadu',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'vetrimaaran' OR `id` = 136;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 137 | Rohit Shetty (rohit-shetty)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Rohit Shetty',
    `stage_name` = 'Rohit Shetty',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Bombay, Maharashtra',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'rohit-shetty' OR `id` = 137;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 138 | Kabir Khan (kabir-khan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kabir Khan',
    `stage_name` = 'Kabir Khan',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'Hyderabad, Andhra Pradesh',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'kabir-khan' OR `id` = 138;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 139 | Vishal Bhardwaj (vishal-bhardwaj)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Vishal Bhardwaj',
    `stage_name` = 'Vishal Bhardwaj',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Chandpur, Bijnor',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'vishal-bhardwaj' OR `id` = 139;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 140 | Ram Gopal Varma (ram-gopal-varma)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ram Gopal Varma',
    `stage_name` = 'Ram Gopal Varma',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'Hyderabad, Andhra Pradesh',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'ram-gopal-varma' OR `id` = 140;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 141 | Karthi (karthi)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Karthi',
    `stage_name` = 'Karthi',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Madras, Tamil Nadu',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'karthi' OR `id` = 141;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 142 | Vijay Sethupathi (vijay-sethupathi)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Vijay Sethupathi',
    `stage_name` = 'Vijay Sethupathi',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Rajapalayam, Tamil Nadu',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'vijay-sethupathi' OR `id` = 142;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 143 | Saif Ali Khan (saif-ali-khan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Saif Ali Khan',
    `stage_name` = 'Saif Ali Khan',
    `nationality` = 'Indian',
    `residence` = 'New Delhi, India',
    `hometown` = 'New Delhi, India',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'saif-ali-khan' OR `id` = 143;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 144 | Janhvi Kapoor (janhvi-kapoor)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Janhvi Kapoor',
    `stage_name` = 'Janhvi Kapoor',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 4 in (163 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'janhvi-kapoor' OR `id` = 144;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 145 | Sanya Malhotra (sanya-malhotra)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sanya Malhotra',
    `stage_name` = 'Sanya Malhotra',
    `nationality` = 'Indian',
    `residence` = 'New Delhi, India',
    `hometown` = 'Delhi, India',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'sanya-malhotra' OR `id` = 145;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 146 | Kay Kay Menon (kay-kay-menon)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kay Kay Menon',
    `stage_name` = 'Kay Kay Menon',
    `nationality` = 'Indian',
    `residence` = 'Kochi, Kerala, India',
    `hometown` = 'Thiruvananthapuram, Kerala',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Malayalam, English, Tamil',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'kay-kay-menon' OR `id` = 146;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 147 | Javier Bardem (javier-bardem)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Javier Bardem',
    `stage_name` = 'Javier Bardem',
    `nationality` = 'Spanish',
    `residence` = 'Madrid, Spain',
    `hometown` = 'Las Palmas, Gran Canaria',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Spanish, English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'javier-bardem' OR `id` = 147;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 148 | Charlize Theron (charlize-theron)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Charlize Theron',
    `stage_name` = 'Charlize Theron',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Benoni, Transvaal',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'charlize-theron' OR `id` = 148;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 149 | George Miller (george-miller)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'George Miller',
    `stage_name` = 'George Miller',
    `nationality` = 'Australian',
    `residence` = 'Sydney, Australia',
    `hometown` = 'Brisbane, Queensland',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'george-miller' OR `id` = 149;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 150 | Ralph Fiennes (ralph-fiennes)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ralph Fiennes',
    `stage_name` = 'Ralph Fiennes',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Ipswich, Suffolk',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ralph-fiennes' OR `id` = 150;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 151 | Wes Anderson (wes-anderson)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Wes Anderson',
    `stage_name` = 'Wes Anderson',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Houston, Texas',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'wes-anderson' OR `id` = 151;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 152 | Mark Ruffalo (mark-ruffalo)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Mark Ruffalo',
    `stage_name` = 'Mark Ruffalo',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Kenosha, Wisconsin',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'mark-ruffalo' OR `id` = 152;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 153 | Wagner Moura (wagner-moura)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Wagner Moura',
    `stage_name` = 'Wagner Moura',
    `nationality` = 'German',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Salvador, Bahia',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'German, English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'wagner-moura' OR `id` = 153;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 154 | Vidya Balan (vidya-balan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Vidya Balan',
    `stage_name` = 'Vidya Balan',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Bengali, Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'vidya-balan' OR `id` = 154;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 155 | Madhuri Dixit (madhuri-dixit)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Madhuri Dixit',
    `stage_name` = 'Madhuri Dixit',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'madhuri-dixit' OR `id` = 155;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 156 | Sunny Deol (sunny-deol)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sunny Deol',
    `stage_name` = 'Sunny Deol',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Sahnewal, Punjab',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'sunny-deol' OR `id` = 156;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 157 | R. Madhavan (r-madhavan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'R. Madhavan',
    `stage_name` = 'R. Madhavan',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Jamshedpur, Bihar (now Jharkhand)',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'r-madhavan' OR `id` = 157;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 158 | Prithviraj Sukumaran (prithviraj-sukumaran)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Prithviraj Sukumaran',
    `stage_name` = 'Prithviraj Sukumaran',
    `nationality` = 'Indian',
    `residence` = 'Kochi, Kerala, India',
    `hometown` = 'Thiruvananthapuram, Kerala',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Malayalam, English, Tamil',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'prithviraj-sukumaran' OR `id` = 158;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 159 | Mohanlal (mohanlal)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Mohanlal',
    `stage_name` = 'Mohanlal',
    `nationality` = 'Indian',
    `residence` = 'Kochi, Kerala, India',
    `hometown` = 'Elanthoor, Pathanamthitta',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Malayalam, English, Tamil',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'mohanlal' OR `id` = 159;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 160 | Diljit Dosanjh (diljit-dosanjh)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Diljit Dosanjh',
    `stage_name` = 'Diljit Dosanjh',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Dosanjh Kalan, Jalandhar',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'diljit-dosanjh' OR `id` = 160;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 161 | A.R. Murugadoss (a-r-murugadoss)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'A.R. Murugadoss',
    `stage_name` = 'A.R. Murugadoss',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Kallakurichi, Tamil Nadu',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'a-r-murugadoss' OR `id` = 161;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 162 | Adrien Brody (adrien-brody)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Adrien Brody',
    `stage_name` = 'Adrien Brody',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'New York City, New York',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'adrien-brody' OR `id` = 162;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 163 | Jean Reno (jean-reno)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Jean Reno',
    `stage_name` = 'Jean Reno',
    `nationality` = 'French',
    `residence` = 'Paris, France',
    `hometown` = 'Casablanca, French Morocco',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'French, English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'jean-reno' OR `id` = 163;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 164 | Willem Dafoe (willem-dafoe)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Willem Dafoe',
    `stage_name` = 'Willem Dafoe',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Appleton, Wisconsin',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'willem-dafoe' OR `id` = 164;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 165 | Michael Mann (michael-mann)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Michael Mann',
    `stage_name` = 'Michael Mann',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Chicago, Illinois',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Aquarius',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'michael-mann' OR `id` = 165;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 166 | Michelle Pfeiffer (michelle-pfeiffer)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Michelle Pfeiffer',
    `stage_name` = 'Michelle Pfeiffer',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Santa Ana, California',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'michelle-pfeiffer' OR `id` = 166;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 167 | Amy Adams (amy-adams)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Amy Adams',
    `stage_name` = 'Amy Adams',
    `nationality` = 'Australian',
    `residence` = 'Sydney, Australia',
    `hometown` = 'Vicenza, Veneto',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'amy-adams' OR `id` = 167;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 168 | Michel Gondry (michel-gondry)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Michel Gondry',
    `stage_name` = 'Michel Gondry',
    `nationality` = 'French',
    `residence` = 'Paris, France',
    `hometown` = 'Versailles, Yvelines',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'French, English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'michel-gondry' OR `id` = 168;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 169 | Suriya (suriya)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Suriya',
    `stage_name` = 'Suriya',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Chennai, Tamil Nadu',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'suriya' OR `id` = 169;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 170 | Sudha Kongara (sudha-kongara)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sudha Kongara',
    `stage_name` = 'Sudha Kongara',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Visakhapatnam, Andhra Pradesh',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'sudha-kongara' OR `id` = 170;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 171 | Soubin Shahir (soubin-shahir)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Soubin Shahir',
    `stage_name` = 'Soubin Shahir',
    `nationality` = 'Indian',
    `residence` = 'Fort Kochi, Kerala, India',
    `hometown` = 'Fort Kochi, Kerala, India',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'Malayalam, English, Tamil',
    `education` = 'The Delta Study, Fort Kochi',
    `qualification` = 'Secondary School & Film Apprenticeship',
    `religion` = 'Islam',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Football, Music, Pigeon Flying, Photography',
    `other_talents` = 'Film Direction, Film Production, Physical Comedy',
    `updated_at` = NOW()
WHERE `slug` = 'soubin-shahir' OR `id` = 171;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 172 | Mel Gibson (mel-gibson)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Mel Gibson',
    `stage_name` = 'Mel Gibson',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Peekskill, New York',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'mel-gibson' OR `id` = 172;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 173 | Jeff Bridges (jeff-bridges)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Jeff Bridges',
    `stage_name` = 'Jeff Bridges',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Los Angeles, California',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'jeff-bridges' OR `id` = 173;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 174 | Guillermo del Toro (guillermo-del-toro)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Guillermo del Toro',
    `stage_name` = 'Guillermo del Toro',
    `nationality` = 'Mexican',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Guadalajara, Jalisco',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Not Disclosed',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'guillermo-del-toro' OR `id` = 174;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 175 | Song Kang-ho (song-kang-ho)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Song Kang-ho',
    `stage_name` = 'Song Kang-ho',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Gimhae, South Gyeongsang',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'song-kang-ho' OR `id` = 175;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 176 | Fernando Meirelles (fernando-meirelles)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Fernando Meirelles',
    `stage_name` = 'Fernando Meirelles',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'São Paulo, Brazil',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'fernando-meirelles' OR `id` = 176;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 177 | Pa. Ranjith (pa-ranjith)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Pa. Ranjith',
    `stage_name` = 'Pa. Ranjith',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Karalapakkam, Thiruvallur',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'pa-ranjith' OR `id` = 177;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 178 | Arya (arya)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Arya',
    `stage_name` = 'Arya',
    `nationality` = 'Indian',
    `residence` = 'Kochi, Kerala, India',
    `hometown` = 'Trikaripur, Kasaragod',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Malayalam, English, Tamil',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'arya' OR `id` = 178;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 179 | Thiagarajan Kumararaja (thiagarajan-kumararaja)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Thiagarajan Kumararaja',
    `stage_name` = 'Thiagarajan Kumararaja',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Chennai, Tamil Nadu',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'thiagarajan-kumararaja' OR `id` = 179;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 180 | Jithu Madhavan (jithu-madhavan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Jithu Madhavan',
    `stage_name` = 'Jithu Madhavan',
    `nationality` = 'Indian',
    `residence` = 'Kochi, Kerala, India',
    `hometown` = 'Kochi, Kerala, India',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Malayalam, English, Hindi',
    `education` = 'Cochin College, Kochi',
    `qualification` = 'Bachelor of Commerce (B.Com)',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Writing, Watching World Cinema, Traveling',
    `other_talents` = 'Screenplay Writing, Character Concept Development, Carrom',
    `updated_at` = NOW()
WHERE `slug` = 'jithu-madhavan' OR `id` = 180;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 181 | Pasupathy (pasupathy)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Pasupathy',
    `stage_name` = 'Pasupathy',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Madhavaram, Chennai',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'pasupathy' OR `id` = 181;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 182 | Park Chan-wook (park-chan-wook)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Park Chan-wook',
    `stage_name` = 'Park Chan-wook',
    `nationality` = 'South Korean',
    `residence` = 'Seoul, South Korea',
    `hometown` = 'Seoul, South Korea',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Korean, English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Buddhist traditions',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'park-chan-wook' OR `id` = 182;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 183 | Choi Min-sik (choi-min-sik)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Choi Min-sik',
    `stage_name` = 'Choi Min-sik',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Seoul, South Korea',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'choi-min-sik' OR `id` = 183;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 184 | Danny Boyle (danny-boyle)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Danny Boyle',
    `stage_name` = 'Danny Boyle',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Radcliffe, Lancashire',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'danny-boyle' OR `id` = 184;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 185 | Ewan McGregor (ewan-mcgregor)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ewan McGregor',
    `stage_name` = 'Ewan McGregor',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Perth, Scotland',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ewan-mcgregor' OR `id` = 185;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 186 | Darren Aronofsky (darren-aronofsky)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Darren Aronofsky',
    `stage_name` = 'Darren Aronofsky',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Brooklyn, New York',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Aquarius',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'darren-aronofsky' OR `id` = 186;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 187 | Audrey Tautou (audrey-tautou)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Audrey Tautou',
    `stage_name` = 'Audrey Tautou',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Beaumont, Puy-de-Dôme',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'audrey-tautou' OR `id` = 187;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 188 | Prakash Raj (prakash-raj)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Prakash Raj',
    `stage_name` = 'Prakash Raj',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Bengaluru, Karnataka',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'prakash-raj' OR `id` = 188;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 189 | Mammootty (mammootty)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Mammootty',
    `stage_name` = 'Mammootty',
    `nationality` = 'Indian',
    `residence` = 'Kochi, Kerala, India',
    `hometown` = 'Chandiroor, Alappuzha',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Malayalam, English, Tamil',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'mammootty' OR `id` = 189;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 190 | Mari Selvaraj (mari-selvaraj)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Mari Selvaraj',
    `stage_name` = 'Mari Selvaraj',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Puliyankulam, Thoothukudi',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'mari-selvaraj' OR `id` = 190;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 191 | Shane Nigam (shane-nigam)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Shane Nigam',
    `stage_name` = 'Shane Nigam',
    `nationality` = 'Indian',
    `residence` = 'Kochi, Kerala, India',
    `hometown` = 'Elamakkara, Kochi',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Malayalam, English, Tamil',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'shane-nigam' OR `id` = 191;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 192 | Paul Thomas Anderson (paul-thomas-anderson)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Paul Thomas Anderson',
    `stage_name` = 'Paul Thomas Anderson',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Studio City, Los Angeles',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'paul-thomas-anderson' OR `id` = 192;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 193 | Daniel Day-Lewis (daniel-day-lewis)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Daniel Day-Lewis',
    `stage_name` = 'Daniel Day-Lewis',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Kensington, London',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'daniel-day-lewis' OR `id` = 193;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 194 | Uma Thurman (uma-thurman)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Uma Thurman',
    `stage_name` = 'Uma Thurman',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Boston, Massachusetts',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'uma-thurman' OR `id` = 194;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 195 | Sam Mendes (sam-mendes)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sam Mendes',
    `stage_name` = 'Sam Mendes',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Reading, Berkshire',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'sam-mendes' OR `id` = 195;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 196 | Farhan Akhtar (farhan-akhtar)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Farhan Akhtar',
    `stage_name` = 'Farhan Akhtar',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Hindi, English',
    `education` = 'Film and Television Institute of India (FTII)',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Islam',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'farhan-akhtar' OR `id` = 196;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 197 | Akshaye Khanna (akshaye-khanna)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Akshaye Khanna',
    `stage_name` = 'Akshaye Khanna',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'akshaye-khanna' OR `id` = 197;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 198 | Arvind Swamy (arvind-swamy)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Arvind Swamy',
    `stage_name` = 'Arvind Swamy',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Tiruchirappalli, Tamil Nadu',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'arvind-swamy' OR `id` = 198;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 199 | Siddharth (siddharth)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Siddharth',
    `stage_name` = 'Siddharth',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Chennai, Tamil Nadu',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'siddharth' OR `id` = 199;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 200 | Jayam Ravi (jayam-ravi)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Jayam Ravi',
    `stage_name` = 'Jayam Ravi',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Tiruchirappalli, Tamil Nadu',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'jayam-ravi' OR `id` = 200;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 201 | Preity Zinta (preity-zinta)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Preity Zinta',
    `stage_name` = 'Preity Zinta',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Shimla, Himachal Pradesh',
    `height` = '5 ft 7 in (170 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Aquarius',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'preity-zinta' OR `id` = 201;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 202 | Dwayne Johnson (dwayne-johnson)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Dwayne Johnson',
    `stage_name` = 'The Rock',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Hayward, California',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'dwayne-johnson' OR `id` = 202;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 203 | Chris Evans (chris-evans)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Chris Evans',
    `stage_name` = 'Chris Evans',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Boston, Massachusetts',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'chris-evans' OR `id` = 203;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 204 | Chris Hemsworth (chris-hemsworth)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Chris Hemsworth',
    `stage_name` = 'Chris Hemsworth',
    `nationality` = 'Australian',
    `residence` = 'Sydney, Australia',
    `hometown` = 'Melbourne, Victoria',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'chris-hemsworth' OR `id` = 204;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 205 | Henry Cavill (henry-cavill)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Henry Cavill',
    `stage_name` = 'Henry Cavill',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Saint Helier, Jersey',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'henry-cavill' OR `id` = 205;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 206 | Tom Holland (tom-holland)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Tom Holland',
    `stage_name` = 'Tom Holland',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Kingston upon Thames, London',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'tom-holland' OR `id` = 206;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 207 | Robert Pattinson (robert-pattinson)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Robert Pattinson',
    `stage_name` = 'Robert Pattinson',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'London, England',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'robert-pattinson' OR `id` = 207;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 208 | Jake Gyllenhaal (jake-gyllenhaal)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Jake Gyllenhaal',
    `stage_name` = 'Jake Gyllenhaal',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Los Angeles, California',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'jake-gyllenhaal' OR `id` = 208;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 209 | Benedict Cumberbatch (benedict-cumberbatch)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Benedict Cumberbatch',
    `stage_name` = 'Benedict Cumberbatch',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Hammersmith, London',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'benedict-cumberbatch' OR `id` = 209;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 210 | Mark Wahlberg (mark-wahlberg)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Mark Wahlberg',
    `stage_name` = 'Mark Wahlberg',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Dorchester, Boston',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'mark-wahlberg' OR `id` = 210;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 211 | Jason Statham (jason-statham)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Jason Statham',
    `stage_name` = 'Jason Statham',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Shirebrook, Derbyshire',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'jason-statham' OR `id` = 211;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 212 | Sylvester Stallone (sylvester-stallone)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sylvester Stallone',
    `stage_name` = 'Sly Stallone',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Hell\'s Kitchen, New York City',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'sylvester-stallone' OR `id` = 212;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 213 | Nicolas Cage (nicolas-cage)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Nicolas Cage',
    `stage_name` = 'Nicolas Cage',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Long Beach, California',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'nicolas-cage' OR `id` = 213;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 214 | Gary Oldman (gary-oldman)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Gary Oldman',
    `stage_name` = 'Gary Oldman',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'New Cross, London',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'gary-oldman' OR `id` = 214;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 215 | Angelina Jolie (angelina-jolie)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Angelina Jolie',
    `stage_name` = 'Angelina Jolie',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Los Angeles, California',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'angelina-jolie' OR `id` = 215;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 216 | Sandra Bullock (sandra-bullock)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sandra Bullock',
    `stage_name` = 'Sandra Bullock',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Arlington, Virginia',
    `height` = '5 ft 4 in (163 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'sandra-bullock' OR `id` = 216;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 217 | Julia Roberts (julia-roberts)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Julia Roberts',
    `stage_name` = 'Julia Roberts',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Smyrna, Georgia',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'julia-roberts' OR `id` = 217;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 218 | Jennifer Aniston (jennifer-aniston)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Jennifer Aniston',
    `stage_name` = 'Jennifer Aniston',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Sherman Oaks, Los Angeles',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Aquarius',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'jennifer-aniston' OR `id` = 218;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 219 | Gal Gadot (gal-gadot)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Gal Gadot',
    `stage_name` = 'Gal Gadot',
    `nationality` = 'Israeli',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Petah Tikva, Israel',
    `height` = '5 ft 7 in (170 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Not Disclosed',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'gal-gadot' OR `id` = 219;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 220 | Ana de Armas (ana-de-armas)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ana de Armas',
    `stage_name` = 'Ana de Armas',
    `nationality` = 'Cuban',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Havana, Cuba',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Not Disclosed',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ana-de-armas' OR `id` = 220;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 221 | Sydney Sweeney (sydney-sweeney)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sydney Sweeney',
    `stage_name` = 'Sydney Sweeney',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Spokane, Washington',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'sydney-sweeney' OR `id` = 221;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 222 | Anya Taylor-Joy (anya-taylor-joy)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Anya Taylor-Joy',
    `stage_name` = 'Anya Taylor-Joy',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Miami, Florida',
    `height` = '5 ft 4 in (163 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'anya-taylor-joy' OR `id` = 222;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 223 | Nicole Kidman (nicole-kidman)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Nicole Kidman',
    `stage_name` = 'Nicole Kidman',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Honolulu, Hawaii',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'nicole-kidman' OR `id` = 223;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 224 | Emily Blunt (emily-blunt)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Emily Blunt',
    `stage_name` = 'Emily Blunt',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Wandsworth, London',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'emily-blunt' OR `id` = 224;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 225 | Zoe Saldana (zoe-saldana)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Zoe Saldana',
    `stage_name` = 'Zoe Saldana',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Passaic, New Jersey',
    `height` = '5 ft 7 in (170 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'zoe-saldana' OR `id` = 225;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 226 | Tim Burton (tim-burton)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Tim Burton',
    `stage_name` = 'Tim Burton',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Burbank, California',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'tim-burton' OR `id` = 226;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 227 | Guy Ritchie (guy-ritchie)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Guy Ritchie',
    `stage_name` = 'Guy Ritchie',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Hatfield, Hertfordshire',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Christian',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'guy-ritchie' OR `id` = 227;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 228 | Varun Dhawan (varun-dhawan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Varun Dhawan',
    `stage_name` = 'Varun Dhawan',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'varun-dhawan' OR `id` = 228;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 229 | Sidharth Malhotra (sidharth-malhotra)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sidharth Malhotra',
    `stage_name` = 'Sidharth Malhotra',
    `nationality` = 'Indian',
    `residence` = 'New Delhi, India',
    `hometown` = 'Delhi, India',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'sidharth-malhotra' OR `id` = 229;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 230 | John Abraham (john-abraham)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'John Abraham',
    `stage_name` = 'John Abraham',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'john-abraham' OR `id` = 230;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 231 | Anil Kapoor (anil-kapoor)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Anil Kapoor',
    `stage_name` = 'Anil Kapoor',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Chembur, Mumbai',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'anil-kapoor' OR `id` = 231;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 232 | Sanjay Dutt (sanjay-dutt)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sanjay Dutt',
    `stage_name` = 'Sanjay Dutt',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'sanjay-dutt' OR `id` = 232;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 233 | Bobby Deol (bobby-deol)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Bobby Deol',
    `stage_name` = 'Bobby Deol',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Aquarius',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'bobby-deol' OR `id` = 233;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 234 | Kiara Advani (kiara-advani)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kiara Advani',
    `stage_name` = 'Kiara Advani',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 4 in (163 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'kiara-advani' OR `id` = 234;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 235 | Rani Mukerji (rani-mukerji)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Rani Mukerji',
    `stage_name` = 'Rani Mukerji',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'rani-mukerji' OR `id` = 235;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 236 | Kajol (kajol)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kajol',
    `stage_name` = 'Kajol',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'kajol' OR `id` = 236;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 237 | Triptii Dimri (triptii-dimri)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Triptii Dimri',
    `stage_name` = 'Triptii Dimri',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Rudraprayag, Uttarakhand',
    `height` = '5 ft 7 in (170 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'triptii-dimri' OR `id` = 237;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 238 | Disha Patani (disha-patani)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Disha Patani',
    `stage_name` = 'Disha Patani',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Bareilly, Uttar Pradesh',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'disha-patani' OR `id` = 238;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 239 | Taapsee Pannu (taapsee-pannu)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Taapsee Pannu',
    `stage_name` = 'Taapsee Pannu',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'New Delhi, India',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'taapsee-pannu' OR `id` = 239;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 240 | Yami Gautam (yami-gautam)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Yami Gautam',
    `stage_name` = 'Yami Gautam',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Bilaspur, Himachal Pradesh',
    `height` = '5 ft 4 in (163 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'yami-gautam' OR `id` = 240;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 241 | Mahesh Babu (mahesh-babu)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Mahesh Babu',
    `stage_name` = 'Superstar Mahesh Babu',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Chennai, Tamil Nadu',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'mahesh-babu' OR `id` = 241;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 242 | Chiranjeevi (chiranjeevi)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Chiranjeevi',
    `stage_name` = 'Megastar Chiranjeevi',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'Mogalthur, Andhra Pradesh',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'chiranjeevi' OR `id` = 242;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 243 | Pawan Kalyan (pawan-kalyan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Pawan Kalyan',
    `stage_name` = 'Power Star',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Bapatla, Andhra Pradesh',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'pawan-kalyan' OR `id` = 243;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 244 | Nani (nani)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Nani',
    `stage_name` = 'Natural Star Nani',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'Hyderabad, Telangana',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'nani' OR `id` = 244;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 245 | Vijay Deverakonda (vijay-deverakonda)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Vijay Deverakonda',
    `stage_name` = 'Vijay Deverakonda',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'Achampet, Telangana',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'vijay-deverakonda' OR `id` = 245;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 246 | Ajith Kumar (ajith-kumar)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ajith Kumar',
    `stage_name` = 'Thala Ajith',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Secunderabad, Telangana',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ajith-kumar' OR `id` = 246;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 247 | Sivakarthikeyan (sivakarthikeyan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sivakarthikeyan',
    `stage_name` = 'Sivakarthikeyan',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Singampunari, Tamil Nadu',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Aquarius',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'sivakarthikeyan' OR `id` = 247;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 248 | Dulquer Salmaan (dulquer-salmaan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Dulquer Salmaan',
    `stage_name` = 'Dulquer Salmaan',
    `nationality` = 'Indian',
    `residence` = 'Kochi, Kerala, India',
    `hometown` = 'Kochi, Kerala',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Malayalam, English, Tamil',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'dulquer-salmaan' OR `id` = 248;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 249 | Sai Pallavi (sai-pallavi)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sai Pallavi',
    `stage_name` = 'Sai Pallavi',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Kotagiri, Tamil Nadu',
    `height` = '5 ft 7 in (170 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'sai-pallavi' OR `id` = 249;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 250 | Trisha Krishnan (trisha-krishnan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Trisha Krishnan',
    `stage_name` = 'Trisha Krishnan',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Chennai, Tamil Nadu',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'trisha-krishnan' OR `id` = 250;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 251 | Keerthy Suresh (keerthy-suresh)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Keerthy Suresh',
    `stage_name` = 'Keerthy Suresh',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Chennai, Tamil Nadu',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'keerthy-suresh' OR `id` = 251;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 252 | Jackie Chan (jackie-chan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Jackie Chan',
    `stage_name` = 'Jackie Chan',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Victoria Peak, British Hong Kong',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'jackie-chan' OR `id` = 252;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 253 | Michelle Yeoh (michelle-yeoh)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Michelle Yeoh',
    `stage_name` = 'Michelle Yeoh',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Ipoh, Perak',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'michelle-yeoh' OR `id` = 253;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 254 | Donnie Yen (donnie-yen)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Donnie Yen',
    `stage_name` = 'Donnie Yen',
    `nationality` = 'Chinese',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Guangzhou, Guangdong',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Cantonese, Mandarin, English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Buddhist traditions',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'donnie-yen' OR `id` = 254;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 255 | Lee Byung-hun (lee-byung-hun)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Lee Byung-hun',
    `stage_name` = 'Lee Byung-hun',
    `nationality` = 'South Korean',
    `residence` = 'Seoul, South Korea',
    `hometown` = 'Seoul, South Korea',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Korean, English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Buddhist traditions',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'lee-byung-hun' OR `id` = 255;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 256 | Ma Dong-seok (ma-dong-seok)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ma Dong-seok',
    `stage_name` = 'Don Lee',
    `nationality` = 'South Korean',
    `residence` = 'Seoul, South Korea',
    `hometown` = 'Seoul, South Korea',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Korean, English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Buddhist traditions',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ma-dong-seok' OR `id` = 256;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 257 | Gong Yoo (gong-yoo)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Gong Yoo',
    `stage_name` = 'Gong Yoo',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Busan, South Korea',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'gong-yoo' OR `id` = 257;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 258 | Hiroyuki Sanada (hiroyuki-sanada)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Hiroyuki Sanada',
    `stage_name` = 'Hiroyuki Sanada',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Shinagawa, Tokyo',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'hiroyuki-sanada' OR `id` = 258;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 259 | Mads Mikkelsen (mads-mikkelsen)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Mads Mikkelsen',
    `stage_name` = 'Mads Mikkelsen',
    `nationality` = 'Danish',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Østerbro, Copenhagen',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Danish, English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Not Disclosed',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'mads-mikkelsen' OR `id` = 259;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 260 | Penélope Cruz (penelope-cruz)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Penélope Cruz',
    `stage_name` = 'Penélope Cruz',
    `nationality` = 'Spanish',
    `residence` = 'Madrid, Spain',
    `hometown` = 'Alcobendas, Madrid',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'Spanish, English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'penelope-cruz' OR `id` = 260;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 261 | Tony Leung Chiu-wai (tony-leung-chiu-wai)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Tony Leung Chiu-wai',
    `stage_name` = 'Tony Leung Chiu-wai',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'British Hong Kong',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'tony-leung-chiu-wai' OR `id` = 261;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 368 | Winona Ryder (winona-ryder)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Winona Ryder',
    `stage_name` = 'Winona Ryder',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Winona, Minnesota',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'winona-ryder' OR `id` = 368;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 369 | Tracee Ellis Ross (tracee-ellis-ross)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Tracee Ellis Ross',
    `stage_name` = 'Tracee Ellis Ross',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Los Angeles, California',
    `height` = '5 ft 7 in (170 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'tracee-ellis-ross' OR `id` = 369;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 370 | Ben Foster (ben-foster)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ben Foster',
    `stage_name` = 'Ben Foster',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Boston, Massachusetts',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ben-foster' OR `id` = 370;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 371 | Kriti Kharbanda (kriti-kharbanda)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kriti Kharbanda',
    `stage_name` = 'Kriti Kharbanda',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'New Delhi, India',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'kriti-kharbanda' OR `id` = 371;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 482 | Ananya Panday (ananya-panday)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ananya Panday',
    `stage_name` = 'Ananya Panday',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ananya-panday' OR `id` = 482;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 483 | Nia Long (nia-long)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Nia Long',
    `stage_name` = 'Nia Long',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Brooklyn, New York',
    `height` = '5 ft 7 in (170 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'nia-long' OR `id` = 483;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 484 | Gael García Bernal (gael-garcia-bernal)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Gael García Bernal',
    `stage_name` = 'Gael García Bernal',
    `nationality` = 'Mexican',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Guadalajara, Jalisco',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Not Disclosed',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'gael-garcia-bernal' OR `id` = 484;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 485 | Henry Winkler (henry-winkler)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Henry Winkler',
    `stage_name` = 'Henry Winkler',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Manhattan, New York City',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'henry-winkler' OR `id` = 485;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 486 | Abhijeet Bhattacharya (abhijeet-bhattacharya)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Abhijeet Bhattacharya',
    `stage_name` = 'Abhijeet',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Kanpur, Uttar Pradesh',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Bengali, Hindi, English',
    `education` = 'KM Music Conservatory, Chennai',
    `qualification` = 'Diploma in Music Production & Sound Engineering',
    `religion` = 'Islam',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Multi-Instrumentalist, Audio Mixing, Vocal Arrangement',
    `updated_at` = NOW()
WHERE `slug` = 'abhijeet-bhattacharya' OR `id` = 486;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 487 | Dalip Tahil (dalip-tahil)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Dalip Tahil',
    `stage_name` = 'Dalip Tahil',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Agra, Uttar Pradesh',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'dalip-tahil' OR `id` = 487;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 488 | Janel Parrish (janel-parrish)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Janel Parrish',
    `stage_name` = 'Janel Parrish',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Honolulu, Hawaii',
    `height` = '5 ft 6 in (168 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'janel-parrish' OR `id` = 488;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 489 | Kevin Pollak (kevin-pollak)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kevin Pollak',
    `stage_name` = 'Kevin Pollak',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'San Francisco, California',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'kevin-pollak' OR `id` = 489;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 490 | Matthew Morrison (matthew-morrison)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Matthew Morrison',
    `stage_name` = 'Matthew Morrison',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Fort Ord, California',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'matthew-morrison' OR `id` = 490;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 491 | Ashley Graham (ashley-graham)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ashley Graham',
    `stage_name` = 'Ashley Graham',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Lincoln, Nebraska',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ashley-graham' OR `id` = 491;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 493 | Letitia Wright (letitia-wright)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Letitia Wright',
    `stage_name` = 'Letitia Wright',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'Georgetown, Guyana',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'letitia-wright' OR `id` = 493;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 494 | Rob Schneider (rob-schneider)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Rob Schneider',
    `stage_name` = 'Rob Schneider',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'San Francisco, California',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'rob-schneider' OR `id` = 494;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 495 | Willow Smith (willow-smith)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Willow Smith',
    `stage_name` = 'WILLOW',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Los Angeles, California',
    `height` = '5 ft 7 in (170 cm)',
    `languages` = 'English',
    `education` = 'Berklee College of Music, Boston',
    `qualification` = 'Diploma in Music Production & Sound Engineering',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Multi-Instrumentalist, Audio Mixing, Vocal Arrangement',
    `updated_at` = NOW()
WHERE `slug` = 'willow-smith' OR `id` = 495;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 496 | Dermot Mulroney (dermot-mulroney)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Dermot Mulroney',
    `stage_name` = 'Dermot Mulroney',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Alexandria, Virginia',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'dermot-mulroney' OR `id` = 496;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 497 | Piper Perabo (piper-perabo)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Piper Perabo',
    `stage_name` = 'Piper Perabo',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Dallas, Texas',
    `height` = '5 ft 5 in (165 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'piper-perabo' OR `id` = 497;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 498 | Arjun Bijlani (arjun-bijlani)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Arjun Bijlani',
    `stage_name` = 'Arjun Bijlani',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'arjun-bijlani' OR `id` = 498;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 499 | Dharmesh Yelande (dharmesh-yelande)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Dharmesh Yelande',
    `stage_name` = 'Dharmesh Sir',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Vadodara, Gujarat',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'dharmesh-yelande' OR `id` = 499;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 501 | Penn Badgley (penn-badgley)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Penn Badgley',
    `stage_name` = 'Penn Badgley',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Baltimore, Maryland',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'penn-badgley' OR `id` = 501;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 502 | Toni Collette (toni-collette)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Toni Collette',
    `stage_name` = 'Toni Collette',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Blacktown, Sydney',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'toni-collette' OR `id` = 502;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 503 | Anthony Ramos (anthony-ramos)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Anthony Ramos',
    `stage_name` = 'Anthony Ramos',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Brooklyn, New York',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'anthony-ramos' OR `id` = 503;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 504 | Ileana D'Cruz (ileana-dcruz)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ileana D\'Cruz',
    `stage_name` = 'Ileana D\'Cruz',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 4 in (163 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ileana-dcruz' OR `id` = 504;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 505 | Ishaan Khatter (ishaan-khatter)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ishaan Khatter',
    `stage_name` = 'Ishaan Khatter',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ishaan-khatter' OR `id` = 505;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 506 | Anthony Kiedis (anthony-kiedis)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Anthony Kiedis',
    `stage_name` = 'Anthony Kiedis',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Grand Rapids, Michigan',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Berklee College of Music, Boston',
    `qualification` = 'Diploma in Music Production & Sound Engineering',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Multi-Instrumentalist, Audio Mixing, Vocal Arrangement',
    `updated_at` = NOW()
WHERE `slug` = 'anthony-kiedis' OR `id` = 506;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 507 | Padmini Kolhapure (padmini-kolhapure)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Padmini Kolhapure',
    `stage_name` = 'Padmini Kolhapure',
    `nationality` = 'Indian',
    `residence` = 'Mumbai, Maharashtra, India',
    `hometown` = 'Mumbai, Maharashtra',
    `height` = '5 ft 7 in (170 cm)',
    `languages` = 'Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Classical Dancing, Playback Singing, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'padmini-kolhapure' OR `id` = 507;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 508 | Tobey Maguire (tobey-maguire)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Tobey Maguire',
    `stage_name` = 'Tobey Maguire',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Santa Monica, California',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'tobey-maguire' OR `id` = 508;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 509 | Andrew Garfield (andrew-garfield)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Andrew Garfield',
    `stage_name` = 'Andrew Garfield',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Los Angeles, California',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'andrew-garfield' OR `id` = 509;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 510 | Hayao Miyazaki (hayao-miyazaki)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Hayao Miyazaki',
    `stage_name` = 'Hayao Miyazaki',
    `nationality` = 'Japanese',
    `residence` = 'Tokyo, Japan',
    `hometown` = 'Bunkyo, Tokyo',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Japanese, English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Buddhist traditions',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'hayao-miyazaki' OR `id` = 510;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 511 | Akira Kurosawa (akira-kurosawa)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Akira Kurosawa',
    `stage_name` = 'Akira Kurosawa',
    `nationality` = 'Japanese',
    `residence` = 'Tokyo, Japan',
    `hometown` = 'Shinagawa, Tokyo',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Japanese, English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Buddhist traditions',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'akira-kurosawa' OR `id` = 511;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 512 | Toshiro Mifune (toshiro-mifune)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Toshiro Mifune',
    `stage_name` = 'Toshiro Mifune',
    `nationality` = 'Japanese',
    `residence` = 'Tokyo, Japan',
    `hometown` = 'Qingdao, Shandong',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Japanese, English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Buddhist traditions',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'toshiro-mifune' OR `id` = 512;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 513 | Makoto Shinkai (makoto-shinkai)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Makoto Shinkai',
    `stage_name` = 'Makoto Shinkai',
    `nationality` = 'Japanese',
    `residence` = 'Tokyo, Japan',
    `hometown` = 'Koumi, Nagano',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Japanese, English',
    `education` = 'University of Southern California (USC) School of Cinematic Arts',
    `qualification` = 'Degree in Direction & Screenplay Writing',
    `religion` = 'Secular / Buddhist traditions',
    `zodiac_sign` = 'Aquarius',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Screenplay Writing, Storyboarding, Film Editing',
    `updated_at` = NOW()
WHERE `slug` = 'makoto-shinkai' OR `id` = 513;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 514 | Takeshi Kitano (takeshi-kitano)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Takeshi Kitano',
    `stage_name` = 'Takeshi Kitano',
    `nationality` = 'Japanese',
    `residence` = 'Tokyo, Japan',
    `hometown` = 'Adachi, Tokyo',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Japanese, English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Buddhist traditions',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'takeshi-kitano' OR `id` = 514;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 515 | Ken Watanabe (ken-watanabe)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ken Watanabe',
    `stage_name` = 'Ken Watanabe',
    `nationality` = 'Japanese',
    `residence` = 'Tokyo, Japan',
    `hometown` = 'Los Angeles, USA',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Japanese, English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Buddhist traditions',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ken-watanabe' OR `id` = 515;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 516 | Tom Hiddleston (tom-hiddleston)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Tom Hiddleston',
    `stage_name` = 'Tom Hiddleston',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'London, UK',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'tom-hiddleston' OR `id` = 516;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 517 | Brie Larson (brie-larson)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Brie Larson',
    `stage_name` = 'Brie Larson',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Los Angeles, USA',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'brie-larson' OR `id` = 517;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 518 | Millie Bobby Brown (millie-bobby-brown)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Millie Bobby Brown',
    `stage_name` = 'Millie Bobby Brown',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'London, UK',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'millie-bobby-brown' OR `id` = 518;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 519 | Kyle Chandler (kyle-chandler)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kyle Chandler',
    `stage_name` = 'Kyle Chandler',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Los Angeles, USA',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'kyle-chandler' OR `id` = 519;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 520 | Alexander Skarsgård (alexander-skarsgard)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Alexander Skarsgård',
    `stage_name` = 'Alexander Skarsgård',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Los Angeles, USA',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'alexander-skarsgard' OR `id` = 520;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 521 | Rebecca Hall (rebecca-hall)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Rebecca Hall',
    `stage_name` = 'Rebecca Hall',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'London, UK',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'rebecca-hall' OR `id` = 521;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 522 | Brian Tyree Henry (brian-tyree-henry)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Brian Tyree Henry',
    `stage_name` = 'Brian Tyree Henry',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Los Angeles, USA',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'brian-tyree-henry' OR `id` = 522;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 523 | Dan Stevens (dan-stevens)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Dan Stevens',
    `stage_name` = 'Dan Stevens',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'London, UK',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'dan-stevens' OR `id` = 523;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 524 | Naomi Watts (naomi-watts)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Naomi Watts',
    `stage_name` = 'Naomi Watts',
    `nationality` = 'British',
    `residence` = 'London, England, UK',
    `hometown` = 'London, UK',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Christian',
    `zodiac_sign` = 'Sagittarius',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'naomi-watts' OR `id` = 524;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 525 | Andy Serkis (andy-serkis)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Andy Serkis',
    `stage_name` = 'Andy Serkis',
    `nationality` = 'American',
    `residence` = 'Los Angeles, California, USA',
    `hometown` = 'Los Angeles, USA',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'English',
    `education` = 'Lee Strasberg Theatre and Film Institute, New York',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Secular / Agnostic',
    `zodiac_sign` = 'Capricorn',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'andy-serkis' OR `id` = 525;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 526 | Kajal Aggarwal (kajal-aggarwal)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kajal Aggarwal',
    `stage_name` = 'Kajal Aggarwal',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Mumbai, India',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Aquarius',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'kajal-aggarwal' OR `id` = 526;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 527 | Kichcha Sudeepa (kichcha-sudeepa)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Kichcha Sudeepa',
    `stage_name` = 'Kichcha Sudeepa',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'Mumbai, India',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Pisces',
    `hobbies` = 'Horse Riding, Tennis, Architecture',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'kichcha-sudeepa' OR `id` = 527;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 528 | Shriya Saran (shriya-saran)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Shriya Saran',
    `stage_name` = 'Shriya Saran',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Mumbai, India',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Traveling, Reading, Photography',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'shriya-saran' OR `id` = 528;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 529 | Ravi Teja (ravi-teja)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Ravi Teja',
    `stage_name` = 'Ravi Teja',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Mumbai, India',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Taurus',
    `hobbies` = 'Watching World Cinema, Writing, Fitness',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'ravi-teja' OR `id` = 529;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 530 | Anushka Shetty (anushka-shetty)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Anushka Shetty',
    `stage_name` = 'Anushka Shetty',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Mumbai, India',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Music, Long Drives, Swimming',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'anushka-shetty' OR `id` = 530;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 531 | Jr. NTR (n-t-rama-rao-jr)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Jr. NTR',
    `stage_name` = 'Jr. NTR',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'Mumbai, India',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Cancer',
    `hobbies` = 'Cricket, Gym Training, Video Games',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'n-t-rama-rao-jr' OR `id` = 531;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 532 | Sunil (sunil)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sunil',
    `stage_name` = 'Sunil',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'Mumbai, India',
    `height` = '6 ft 0 in (183 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Leo',
    `hobbies` = 'Cooking, Gardening, Badminton',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'sunil' OR `id` = 532;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 533 | Nithiin (nithiin)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Nithiin',
    `stage_name` = 'Nithiin',
    `nationality` = 'Indian',
    `residence` = 'Hyderabad, Telangana, India',
    `hometown` = 'Mumbai, India',
    `height` = '6 ft 1 in (185 cm)',
    `languages` = 'Telugu, Hindi, English',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Art Collecting, Scuba Diving, Cycling',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'nithiin' OR `id` = 533;

-- -----------------------------------------------------------------------------
-- [INACTIVE] ID: 534 | Genelia D'Souza (genelia-dsouza)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Genelia D\'Souza',
    `stage_name` = 'Genelia D\'Souza',
    `nationality` = 'Indian',
    `residence` = 'Chennai, Tamil Nadu, India',
    `hometown` = 'Mumbai, India',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Tamil, English, Telugu',
    `education` = 'National School of Drama (NSD) / University Arts College',
    `qualification` = 'Dramatic Arts & Performance Degree',
    `religion` = 'Islam',
    `zodiac_sign` = 'Libra',
    `hobbies` = 'Playing Guitar, Hiking, Meditation',
    `other_talents` = 'Stage Theater Acting, Martial Arts, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'genelia-dsouza' OR `id` = 534;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 535 | Arjun Ashokan (arjun-ashokan)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Arjun Ashokan',
    `stage_name` = 'Arjun Ashokan',
    `nationality` = 'Indian',
    `residence` = 'Kochi, Kerala, India',
    `hometown` = 'Kochi, Kerala, India',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Malayalam, English, Tamil',
    `education` = 'Chinmaya Vidyalaya & Viswajyothi College',
    `qualification` = 'Bachelor of Business Administration (BBA)',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Virgo',
    `hobbies` = 'Long Drives, Gaming, Fitness, Swimming',
    `other_talents` = 'Playback Singing, Mimicry, Voice Modulation',
    `updated_at` = NOW()
WHERE `slug` = 'arjun-ashokan' OR `id` = 535;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 536 | Sajin Gopu (sajin-gopu)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sajin Gopu',
    `stage_name` = 'Sajin Gopu',
    `nationality` = 'Indian',
    `residence` = 'Ernakulam, Kerala, India',
    `hometown` = 'Ernakulam, Kerala, India',
    `height` = '5 ft 10 in (178 cm)',
    `languages` = 'Malayalam, English, Tamil',
    `education` = 'Government High School, Ernakulam',
    `qualification` = 'Graduate in Humanities',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Scorpio',
    `hobbies` = 'Theater Workshop, Cricket, Gym Training',
    `other_talents` = 'Stage Acting, Improvisational Comedy, Dialect Mimicry',
    `updated_at` = NOW()
WHERE `slug` = 'sajin-gopu' OR `id` = 536;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 537 | Siju Sunny (siju-sunny)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Siju Sunny',
    `stage_name` = 'Siju Sunny',
    `nationality` = 'Indian',
    `residence` = 'Thrissur & Kochi, Kerala, India',
    `hometown` = 'Thrissur, Kerala, India',
    `height` = '5 ft 8 in (173 cm)',
    `languages` = 'Malayalam, English',
    `education` = 'St. Thomas College, Thrissur',
    `qualification` = 'Bachelor in Media & Communication',
    `religion` = 'Christian',
    `zodiac_sign` = 'Aries',
    `hobbies` = 'Video Editing, Content Creation, Stand-up Comedy',
    `other_talents` = 'Screenplay Writing, Sketch Comedy, Digital Storytelling',
    `updated_at` = NOW()
WHERE `slug` = 'siju-sunny' OR `id` = 537;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 538 | Chemban Vinod Jose (chemban-vinod-jose)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Chemban Vinod Jose',
    `stage_name` = 'Chemban Vinod Jose',
    `nationality` = 'Indian',
    `residence` = 'Kochi, Kerala, India',
    `hometown` = 'Maliankara, Kerala, India',
    `height` = '5 ft 11 in (180 cm)',
    `languages` = 'Malayalam, English, Hindi, Tamil',
    `education` = 'Kempegowda Institute of Physiotherapy, Bengaluru',
    `qualification` = 'Bachelor of Physiotherapy (BPT)',
    `religion` = 'Christian',
    `zodiac_sign` = 'Gemini',
    `hobbies` = 'Reading Crime Fiction, Traveling, Culinary Arts',
    `other_talents` = 'Screenplay Writing, Film Production, Dialect Coaching',
    `updated_at` = NOW()
WHERE `slug` = 'chemban-vinod-jose' OR `id` = 538;

-- -----------------------------------------------------------------------------
-- [ACTIVE] ID: 539 | Sushin Shyam (sushin-shyam)
-- -----------------------------------------------------------------------------
UPDATE `people` SET
    `full_name` = 'Sushin Shyam',
    `stage_name` = 'Sushin Shyam',
    `nationality` = 'Indian',
    `residence` = 'Kochi, Kerala, India',
    `hometown` = 'Thalassery, Kerala, India',
    `height` = '5 ft 9 in (175 cm)',
    `languages` = 'Malayalam, English, Tamil',
    `education` = 'Sri Venkateswara College of Engineering, Chennai',
    `qualification` = 'Sound Engineering & Music Production',
    `religion` = 'Hindu',
    `zodiac_sign` = 'Aquarius',
    `hobbies` = 'Music Production, Modular Synthesizers, Cycling',
    `other_talents` = 'Heavy Metal Keyboardist, Vocalist, Sound Design',
    `updated_at` = NOW()
WHERE `slug` = 'sushin-shyam' OR `id` = 539;

COMMIT;

-- ==============================================================================
-- END OF PEOPLE DOSSIER UPDATE SCRIPT: 321 PEOPLE UPDATED
-- ==============================================================================