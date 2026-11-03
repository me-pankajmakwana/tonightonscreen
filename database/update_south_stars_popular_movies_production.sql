-- =============================================================================
-- PRODUCTION SQL UPDATE: SOUTH STARS & POPULAR MOVIES ENRICHMENT (WITH POSTERS)
-- Actors: Prabhas, Allu Arjun, Mahesh Babu, Ram Charan, Suriya
-- Generated: 2026-11-02 10:25:18
-- =============================================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- 1. ENSURE KEY SOUTH CINEMA PERSONALITIES ARE ACTIVE
INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Prabhas', 'prabhas', 'Acting', 'Male', '1979-10-23', 'Chennai, Tamil Nadu, India', 'Indian', 'active', 'Prabhas (Uppalapati Venkata Suryanarayana Prabhas Raju) is an Indian megastar who redefined pan-Indian box office history. He gained worldwide renown headlining S. S. Rajamouli\'s record-shattering fantasy epics Baahubali: The Beginning (2015) and Baahubali 2: The Conclusion (2017), becoming the first Indian film franchise to gross over ₹2,000 crore. Prabhas has continued his historic box office supremacy headlining gargantuan pan-India blockbusters including Prashanth Neel\'s Salaar: Part 1 – Ceasefire and Nag Ashwin\'s epic mythological sci-fi Kalki 2898 AD.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Allu Arjun', 'allu-arjun', 'Acting', 'Male', '1982-04-08', 'Madras, Tamil Nadu, India', 'Indian', 'active', 'Allu Arjun, celebrated as the \'Icon Star\', is a National Film Award-winning Indian actor and extraordinary dancer renowned for his swagger, explosive screen presence, and pan-Indian popularity. He created cinematic history by becoming the first Telugu actor to win the National Film Award for Best Actor for his electrifying performance in Sukumar\'s Pushpa: The Rise (2021). His illustrious track record of blockbusters includes Pushpa 2: The Rule, Ala Vaikunthapurramuloo, Arya, Race Gurram, Sarrainodu, and DJ: Duvvada Jagannadham.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Mahesh Babu', 'mahesh-babu', 'Acting', 'Male', '1975-08-09', 'Chennai, Tamil Nadu, India', 'Indian', 'active', 'Ghattamaneni Mahesh Babu is an Indian actor, producer and philanthropist, voice actor, who works in Telugu cinema. He is one of the highest-paid actors in Indian cinema and has been featured in Forbes India\'s Celebrity 100 list from 2012 to 2025. Referred to in the media as the Superstar, he appeared in over 30 films and has been a recipient of several accolades including, nine Nandi Awards, five Filmfare Awards South and four SIIMA Awards.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Ram Charan', 'ram-charan', 'Acting', 'Male', '1985-03-27', 'Madras, Tamil Nadu, India', 'Indian', 'active', 'Konidela Ram Charan Teja, celebrated as the \'Mega Power Star\', is an Indian superstar, producer, and entrepreneur whose energetic performances have earned global acclaim. Son of megastar Chiranjeevi, Ram Charan captivated the world with his majestic, multifaceted performance as Alluri Sitarama Raju in S. S. Rajamouli\'s magnum opus RRR (2022), which featured the historic Oscar-winning anthem \"Naatu Naatu\". His stellar filmography includes the record-breaking village drama Rangasthalam, Magadheera, and Shankar\'s Game Changer.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Suriya', 'suriya', 'Acting', 'Male', '1975-07-23', 'Chennai, Tamil Nadu, India', 'Indian', 'active', 'Saravanan Sivakumar, universally known by his mononym Suriya, is a National Film Award, four-time Filmfare Award South, and three-time Tamil Nadu State Film Award-winning Indian actor, producer, and philanthropist celebrated as one of the most versatile, dedicated, and socially conscious superstars in Indian cinema. The elder son of veteran actor Sivakumar, Suriya made his film debut in Nerrukku Ner (1997) before achieving major critical breakthroughs in Bala\'s Nandha (2001) and Pithamagan (2003), and Gautham Vasudev Menon\'s cop classic Kaakha Kaakha (2003). He achieved nationwide pan-Indian superstardom playing a memory-impaired revenge crusader in A.R. Murugadoss\'s psychological thriller Ghajini (2005) and portraying a dual father-son role in Gautham Menon\'s semi-autobiographical musical epic Vaaranam Aayiram (2008). Suriya established the lucrative, blockbuster mass action franchise Singham (2010–2017 as the ferocious DCP Duraisingam) and showcased immense sci-fi range in 24 (2016 as Athreya). In 2020, Suriya won the National Film Award for Best Actor for his volcanic performance as aviation pioneer Maara in Sudha Kongara\'s Soorarai Pottru, and garnered global acclaim headlining T.J. Gnanavel\'s courtroom human rights landmark Jai Bhim (2021 as advocate K. Chandru). Through his Agaram Foundation, Suriya has funded higher education for thousands of underprivileged rural children across Tamil Nadu, making him a beloved humanitarian and cinematic icon.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('S. S. Rajamouli', 's-s-rajamouli', 'Directing', 'Male', '1973-10-10', 'Amareshwara Camp, Karnataka, India', 'Indian', 'active', 'Koduri Srisaila Sri Rajamouli is an Indian film director and screenwriter revered globally for epic action spectacles and visual grandeur. The highest-grossing Indian director in cinema history, he directed Magadheera, Eega, the historic two-part Baahubali franchise, and global award-winning sensation RRR (2022), which won the Academy Award for Best Original Song.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Rana Daggubati', 'rana-daggubati', 'Acting', 'Male', '1984-12-14', 'Chennai, Tamil Nadu, India', 'Indian', 'active', '<p><strong>Rana Daggubati</strong> is an acclaimed Indian actor, producer, and visual effects coordinator best known for his towering portrayal of the tyrannical antagonist Bhallaladeva in <a href=\"/title/baahubali-the-beginning-2015\">Baahubali: The Beginning</a> and <a href=\"/title/baahubali-2-the-conclusion-2017\">Baahubali 2: The Conclusion</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Anushka Shetty', 'anushka-shetty', 'Acting', 'not_specified', NULL, NULL, 'Indian', 'active', 'Sweety Shetty, known professionally by her screen name Anushka Shetty and revered as the undisputed \'Lady Superstar\' of South Indian cinema, is a majestic, versatile, and commanding actress whose monumental performances have reshaped female-led commercial cinema across Telugu and Tamil industries. Born in 1981 in Mangalore, Karnataka, into a Tulu-speaking Bunt family, Shetty graduated with a degree in Computer Applications from Mount Carmel College, Bangalore, and was a certified yoga instructor under Bharat Thakur before stepping into films. She made her debut in Puri Jagannadh\'s Super (2005) opposite Nagarjuna, but her meteoric commercial ascendancy was ignited in 2006 when S. S. Rajamouli cast her as the vivacious rural beauty Neeraja in the blockbuster Vikramarkudu. Shetty dismantled gender barriers in Indian commercial cinema with the 2009 dark fantasy horror epic Arundhati, where her fierce, authoritative performance as a valiant queen battling an evil sorcerer shattered box office records, won her the Filmfare Award for Best Actress, and proved a woman could anchor an industry blockbuster. She reunited with S. S. Rajamouli for the globally historic Baahubali franchise (2015 and 2017) as Devasena, whose unyielding pride, fiery defiance against tyranny, and majestic royal poise became one of Indian cinema\'s most iconic feminist characters. Her diverse filmography also features the critically adored Rudhramadevi (2015), Vedam (2010), and the Singam franchise opposite Suriya. Her commanding screen aura and emotional gravity place her among the all-time greats of Indian film.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Amitabh Bachchan', 'amitabh-bachchan', 'Acting', 'Male', '1942-10-11', 'Prayagraj (Allahabad), Uttar Pradesh, India', 'Indian', 'active', 'Amitabh Bachchan is an Indian actor, film producer, television host, and former politician widely regarded as one of the most influential actors in the history of Indian and world cinema. Known as the \"Angry Young Man\" of Hindi cinema in the 1970s and 1980s, he has won four National Film Awards for Best Actor and 16 Filmfare Awards, starring in masterpieces like Sholay, Deewaar, Don, Agneepath, Black, Piku, and Kalki 2898 AD.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Deepika Padukone', 'deepika-padukone', 'Acting', 'Female', '1986-01-05', 'Copenhagen, Denmark', 'Indian', 'active', 'Deepika Padukone is one of the highest-paid actresses in India and a global cultural ambassador. She has received three Filmfare Awards and features in listings of the nation\'s most popular personalities. Known for critically acclaimed performances in Piku, Padmaavat, Bajirao Mastani, Yeh Jawaani Hai Deewani, and global blockbusters Jawan, Pathaan, and Kalki 2898 AD.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Kamal Haasan', 'kamal-haasan', 'Acting', 'Male', '1954-11-07', 'Paramakudi, Madras State, India', 'Indian', 'active', 'Kamal Haasan is an Indian cinematic polymath, actor, director, producer, screenwriter, and playback singer widely recognized as one of the greatest actors in Indian film history. Honored with four National Film Awards, nineteen Filmfare Awards, and the Padma Bhushan, Haasan is renowned for his extreme physical transformations and revolutionary storytelling. His legendary filmography features masterpieces including Nayakan (ranked by TIME in the 100 Best Films of all time), Indian, Vikram, Hey Ram, Apoorva Sagodharargal, Dasavathaaram, and Kalki 2898 AD.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Prashanth Neel', 'prashanth-neel', 'Directing', 'Male', '1980-06-04', 'Hassan, Karnataka, India', 'Indian', 'active', 'Prashanth Neel is an Indian film director and screenwriter celebrated for pioneering the high-octane, dark-toned \"elevation action\" spectacle in modern Indian cinema. Neel rose to pan-Indian and global prominence by conceiving and directing the landmark period action sagas K.G.F: Chapter 1 (2018) and K.G.F: Chapter 2 (2022), with the latter grossing over ₹1,250 crore worldwide. He solidified his status as an elite visionary action director with Prabhas\'s explosive gangster epic Salaar: Part 1 – Ceasefire (2023).', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Prithviraj Sukumaran', 'prithviraj-sukumaran', 'Directing', 'Male', '1982-10-16', 'Thiruvananthapuram, Kerala, India', 'Indian', 'active', 'Prithviraj Sukumaran is a National Film Award, four-time Kerala State Film Award, and Filmfare Award-winning Indian actor, director, producer, and playback singer widely celebrated as one of Malayalam cinema\'s most versatile leading men and visionary commercial directors. The son of legendary Malayalam actors Sukumaran and Mallika, Prithviraj made his debut at age 19 in Ranjith\'s romantic action hit Nandanam (2002). Over a prolific two-decade career spanning more than 100 films, he became renowned for his script choices, intellectual depth, and versatility in landmark films such as Classmates (2006), Vaasthavam (2006, becoming the youngest actor to win the Kerala State Film Award for Best Actor at age 24), Indian Rupee (2011, winning the National Film Award for Best Feature Film in Malayalam as producer), Mumbai Police (2013), and Ennu Ninte Moideen (2015). In 2019, Prithviraj made his historic directorial debut with the political mass action epic Lucifer starring Mohanlal, which became the first Malayalam film to cross ₹200 crore. He has crossed over into pan-Indian blockbusters, starring opposite Prabhas in Prashanth Neel\'s Salaar: Part 1 – Ceasefire (2023) and delivering a physically staggering performance in Blessy\'s survival epic The Goat Life (2024).', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Sukumar', 'sukumar', 'Directing', 'Male', '1970-01-11', 'Mattaparru, East Godavari, Andhra Pradesh, India', 'Indian', 'active', 'Bandreddi Sukumar is an acclaimed Indian film director, screenwriter, and producer who has transformed mainstream Telugu and Pan-Indian cinema with his mathematically intricate screenplays, psychological character depth, and rustic visual grandeur. Formerly a mathematics and physics lecturer in Andhra Pradesh, Sukumar made an electrifying directorial debut with the cult romantic comedy Arya (2004) starring Allu Arjun, which popularized a fresh cinematic grammar. Known for his non-linear, intellectually stimulating puzzle narratives, his celebrated filmography includes Arya 2 (2009), the psychological thriller 1: Nenokkadine (2014 starring Mahesh Babu), Nannaku Prematho (2016), and the historic rural revenge masterpiece Rangasthalam (2018 starring Ram Charan), which broke all-time regional box office records. In 2021, Sukumar ascended to nationwide pan-Indian superstardom directing the forest-smuggling epic Pushpa: The Rise and its colossal sequel Pushpa 2: The Rule (2024), earning Allu Arjun the National Film Award. Under his banner Sukumar Writings, he also produces progressive indie hits like Kumari 21F and Virupaksha. Revered by fellow directors as a master craftsman of screenplay mechanics and character elevation, Sukumar\'s vision has permanently expanded the scale, reach, and box office ambition of modern Indian mass commercial cinema.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Rashmika Mandanna', 'rashmika-mandanna', 'Acting', 'Female', '1996-04-05', 'Virajpet, Karnataka, India', 'Indian', 'active', 'Rashmika Mandanna, fondly crowned the \'National Crush of India\', is a versatile Indian actress who has achieved remarkable box office success across Telugu, Kannada, Hindi, and Tamil cinema. She captured hearts in hits such as Kirik Party, Geetha Govindam, and Sarileru Neekevvaru. Mandanna achieved colossal pan-Indian superstardom starring as Srivalli opposite Allu Arjun in Sukumar\'s Pushpa: The Rise and Pushpa 2, followed by her emotionally powerful performance alongside Ranbir Kapoor in Sandeep Reddy Vanga\'s record-smashing blockbuster Animal (2023).', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Fahadh Faasil', 'fahadh-faasil', 'Acting', 'Male', '1982-08-08', 'Alappuzha, Kerala, India', 'Indian', 'active', 'Fahadh Faasil, affectionately known as \'FaFa\', is a National Film Award and four-time Kerala State Film Award-winning Indian actor and producer widely revered across the country as one of the most brilliant, expressive, and versatile actors of his generation. The son of veteran filmmaker Fazil, Fahadh overcame an early debut setback to return a decade later and revolutionize the New Wave of Malayalam cinema with naturalistic, psychological performances in 22 Female Kottayam, Diamond Necklace, Amen, and North 24 Kaatham. He captured the National Film Award for Best Supporting Actor for Dileesh Pothan\'s Thondimuthalum Driksakshiyum (2017), followed by modern masterworks like Kumbalangi Nights, Maheshinte Prathikaaram, Trance, Joji, and Malik. Fahadh achieved colossal pan-Indian acclaim starring as the unhinged, bald police officer Bhanwar Singh Shekhawat in Allu Arjun\'s Pushpa: The Rise (2021) and Pushpa 2: The Rule, black-ops commander Amar in Kamal Haasan\'s Vikram (2022), and the chaotic gangster Ranga in the 2024 viral blockbuster Aavesham. His expressive eyes and fearless character choices make him a cinematic icon. Widely recognized as one of the most mesmerizing screen presences in world cinema, Fahadh\'s subtle facial micro-expressions and bold, unconventional script choices continue to redefine the boundaries of modern dramatic acting.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Trivikram Srinivas', 'trivikram-srinivas', 'Directing', 'Male', '1971-11-07', 'Bhimavaram, Andhra Pradesh, India', 'Indian', 'active', '<p><strong>Trivikram Srinivas</strong> is celebrated as the \"Wordsmith of Telugu Cinema\" (Maatala Maanthrikudu). Renowned for sharp philosophical wit and deeply resonant family emotions, he directed monumental blockbusters including <a href=\"/title/ala-vaikunthapurramuloo-2020\">Ala Vaikunthapurramuloo</a> and worked extensively with leading stars like <a href=\"/person/allu-arjun\">Allu Arjun</a> and <a href=\"/person/mahesh-babu\">Mahesh Babu</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Pooja Hegde', 'pooja-hegde', 'Acting', 'Female', '1990-10-13', 'Mumbai, Maharashtra, India', 'Indian', 'active', '<p><strong>Pooja Hegde</strong> is a prominent Indian actress in Telugu and Hindi cinema. She delivered a celebrated performance as corporate boss Amulya opposite <a href=\"/person/allu-arjun\">Allu Arjun</a> in the sensational family musical blockbuster <a href=\"/title/ala-vaikunthapurramuloo-2020\">Ala Vaikunthapurramuloo</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Puri Jagannadh', 'puri-jagannadh', 'Directing', 'Male', '1966-09-28', 'Kotauratla, Andhra Pradesh, India', 'Indian', 'active', '<p><strong>Puri Jagannadh</strong> is a trailblazing Telugu film director and screenwriter whose raw, high-tempo dialogues revolutionized mass heroism in Indian cinema. His 2006 historic blockbuster <a href=\"/title/pokiri-2006\">Pokiri</a> starring <a href=\"/person/mahesh-babu\">Mahesh Babu</a> set all-time box office records and redefined mainstream hero character arcs.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Koratala Siva', 'koratala-siva', 'Directing', 'Male', '1975-06-15', 'Pedakakani, Andhra Pradesh, India', 'Indian', 'active', '<p><strong>Koratala Siva</strong> is one of Telugu cinema\'s premier writer-directors, acclaimed for integrating hard-hitting socio-political consciousness into mainstream commercial blockbusters. His landmark collaborations with <a href=\"/person/mahesh-babu\">Mahesh Babu</a> include the village-adoption revolution <a href=\"/title/srimanthudu-2015\">Srimanthudu</a> and the dynamic governance drama <a href=\"/title/bharat-ane-nenu-2018\">Bharat Ane Nenu</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Jr NTR', 'jr-ntr', 'Acting', 'Male', '1983-05-20', 'Hyderabad, Andhra Pradesh, India', 'Indian', 'active', 'N. T. Rama Rao Jr., affectionately known worldwide as Jr NTR or \'Man of Masses\', is an Indian superstar, classical dancer, and charismatic screen powerhouse. Grandson of legendary Telugu icon N. T. Rama Rao, Jr NTR gained international acclaim for his roaring, deeply emotive performance as tribal revolutionary Komaram Bheem in S. S. Rajamouli\'s Oscar-winning global phenomenon RRR (2022). His phenomenal box office catalogue includes Koratala Siva\'s Devara: Part 1, Janatha Garage, Aravinda Sametha Veera Raghava, and Temper.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Alia Bhatt', 'alia-bhatt', 'Acting', 'Female', '1993-03-15', 'Mumbai, Maharashtra, India', 'British', 'active', 'Alia Bhatt is a British-Indian actress known for her portrayals of women in challenging circumstances. She has received a National Film Award and six Filmfare Awards, making her one of the most accomplished actresses of modern cinema. Her defining roles include Highway, Udta Punjab, Raazi, Gully Boy, Gangubai Kathiawadi, Brahmāstra, and Netflix\'s Heart of Stone.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Samantha Ruth Prabhu', 'samantha-ruth-prabhu', 'Acting', 'Female', '1987-04-28', 'Madras, Tamil Nadu, India', 'Indian', 'active', 'Samantha Ruth Prabhu is a four-time Filmfare Award-winning Indian actress celebrated for her striking beauty, emotional depth, and daring career choices across Telugu, Tamil, and Hindi entertainment. She broke out with Gautham Vasudev Menon\'s Ye Maaye Chesave before commanding commercial hits including Eega, Theri, Mersal, Rangasthalam, Majili, and Oh! Baby. Her fierce turn as the antagonist Raji in Amazon Prime\'s The Family Man (Season 2) and her chart-topping viral dance number \"Oo Antava\" catapulted her to nationwide pan-Indian superstardom.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Arvind Swamy', 'arvind-swamy', 'Acting', 'Male', '1970-06-18', 'Chennai, Tamil Nadu, India', 'Indian', 'active', '<p><strong>Arvind Swamy</strong> is a versatile Indian actor renowned for charming heroism and intellectually commanding villainy. He delivered an iconic performance as the ruthless mastermind scientist Siddharth Abhimanyu opposite <a href=\"/person/ram-charan\">Ram Charan</a> in <a href=\"/title/dhruva-2016\">Dhruva</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Sudha Kongara', 'sudha-kongara', 'Directing', 'Female', '1971-07-05', 'Visakhapatnam, Andhra Pradesh, India', 'Indian', 'active', 'Sudha Kongara Prasad is a National Film Award, Filmfare Award South, and Tamil Nadu State Film Award-winning Indian film director and screenwriter celebrated as one of the most powerful, emotionally authentic, and trailblazing filmmakers in contemporary Indian cinema. Born in Visakhapatnam and educated at Women\'s Christian College in Chennai, Kongara honed her craft by working for seven rigorous years as an associate director under legendary auteur Mani Ratnam, contributing to cinematic landmarks like Yuva and Guru. She made her directorial debut with the Telugu romantic drama Andhra Andagadu (2008) before making waves in Tamil cinema with Drohi (2010). Kongara achieved massive critical and commercial breakthrough writing and directing the bilingual boxing drama Irudhi Suttru (Saala Khadoos in Hindi, 2016 starring R. Madhavan and Ritika Singh), winning the Filmfare Award for Best Director – Tamil for her raw, hard-hitting storytelling and authentic athletic choreography. In 2020, Kongara cemented her status among India\'s elite directors with the biographical drama Soorarai Pottru starring Suriya, which won five National Film Awards, including Best Feature Film and Best Screenplay for Kongara. She also directed the poignant short Thangam in Netflix\'s anthology Paava Kadhaigal and the Hindi adaptation Sarfira (2024 starring Akshay Kumar). Sudha Kongara is widely revered for breaking glass ceilings and crafting emotionally gripping, socially resonant cinema with unyielding artistic integrity.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Aparna Balamurali', 'aparna-balamurali', 'Acting', 'Female', '1995-09-11', 'Thrissur, Kerala, India', 'Indian', 'active', '<p><strong>Aparna Balamurali</strong> is a National Film Award-winning Indian actress. She earned the National Award for Best Actress for her spirited, unforgettable role as Bommi opposite <a href=\"/person/suriya\">Suriya</a> in <a href=\"/title/soorarai-pottru-2020\">Soorarai Pottru</a>.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('T. J. Gnanavel', 't-j-gnanavel', 'Directing', 'Male', '1979-05-18', 'Dindigul, Tamil Nadu, India', 'Indian', 'active', '<p><strong>T. J. Gnanavel</strong> is an Indian filmmaker and former journalist who directed the universally acclaimed legal drama <a href=\"/title/jai-bhim-2021\">Jai Bhim</a> starring <a href=\"/person/suriya\">Suriya</a>, shining a powerful light on tribal human rights and constitutional justice.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Hari', 'hari', 'Directing', 'Male', '1966-01-04', 'Katchanavilai, Tamil Nadu, India', 'Indian', 'active', '<p><strong>Hari</strong> is an energetic Tamil commercial filmmaker known for high-speed storytelling and intense cop dramas. He created the legendary <a href=\"/title/singam-2010\">Singam</a> franchise starring <a href=\"/person/suriya\">Suriya</a> as the fiery inspector Duraisingam, creating a nationwide benchmark for police action cinema.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

INSERT INTO `people` (`name`, `slug`, `known_for_department`, `gender`, `birth_date`, `birth_place`, `nationality`, `status`, `biography`, `created_at`, `updated_at`)
VALUES ('Vikram Kumar', 'vikram-kumar', 'Directing', 'Male', '1975-01-29', 'Thrissur, Kerala, India', 'Indian', 'active', '<p><strong>Vikram Kumar</strong> is a National Award-winning director known for complex, inventive concepts executed with heartfelt commercial finesse. He helmed the critically lauded sci-fi time travel masterpiece <a href=\"/title/24-2016\">24</a> starring <a href=\"/person/suriya\">Suriya</a> in a triple role.</p>', NOW(), NOW())
ON DUPLICATE KEY UPDATE `status` = 'active', `biography` = VALUES(`biography`), `updated_at` = NOW();

-- 2. UPSERT 21 SOUTH BLOCKBUSTER TITLES (WITH POSTERS & 1500+ CHAR CONTENT)
-- Movie: Baahubali 2: The Conclusion (baahubali-2-the-conclusion-2017)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Baahubali 2: The Conclusion', 'baahubali-2-the-conclusion-2017', 'movie', 'titles/posters/baahubali-2-the-conclusion-2017.jpg', 'The boy he raised, the man he killed. Discover the ultimate answer to why Kattappa killed Baahubali.', '<p><strong>Baahubali 2: The Conclusion</strong> is the monumental Indian epic historical action drama directed by master storyteller <a href=\"/person/s-s-rajamouli\">S. S. Rajamouli</a> and starring <a href=\"/person/prabhas\">Prabhas</a> in a legendary dual role as Amarendra Baahubali and his avenging son Mahendra Baahubali.</p><p>Set in the majestic kingdom of Mahishmati, the storyline unravels the dramatic backstory of why the loyal commander Kattappa was forced to kill his beloved king Amarendra Baahubali. As jealousy and wicked political conspiracies orchestrated by crown contender Bhallaladeva (<a href=\"/person/rana-daggubati\">Rana Daggubati</a>) and his venomous father Bijjaladeva poison the royal court, Amarendra chooses love and righteousness alongside warrior princess Devasena (<a href=\"/person/anushka-shetty\">Anushka Shetty</a>) over the throne. Decades later, Mahendra Baahubali returns from the waterfalls to unite the oppressed citizens, overthrow Bhallaladeva\'s cruel tyranny, and restore honor to Mahishmati.</p>', '<h3>Detailed Storyline & The Mahishmati Throne Conflict</h3>
<p>The narrative is structured around the pure bond between the kingdom\'s protector Amarendra Baahubali and the fierce, self-respecting princess of Kuntala kingdom, Devasena. When Queen Mother Sivagami is manipulated by Bhallaladeva\'s deceptive games, she misunderstands Baahubali\'s noble intentions and strips him of his rightful crown. Despite losing royal privilege, Amarendra remains deeply adored by common villagers for his kindness, courage, and humble leadership.</p>
<p>The tragedy deepens when Bhallaladeva stages a fabricated assassination conspiracy, forcing Sivagami to order Baahubali\'s execution through Kattappa. The heartbreaking realization of Baahubali\'s innocence arrives too late for Sivagami, setting into motion the fateful night where she carries the infant Mahendra across raging rivers.</p>

<h3>Key Character Arcs</h3>
<ul>
    <li><strong>Amarendra Baahubali (<a href=\"/person/prabhas\">Prabhas</a>):</strong> The noble prince whose strength, moral conviction, and love for justice make him an eternal folklore hero in Indian cinema.</li>
    <li><strong>Mahendra Baahubali / Shivudu (<a href=\"/person/prabhas\">Prabhas</a>):</strong> The energetic young warrior who fulfills his father\'s destiny by conquering Mahishmati and burning the tyrant on the pyre.</li>
    <li><strong>Bhallaladeva (<a href=\"/person/rana-daggubati\">Rana Daggubati</a>):</strong> The ruthless, physically intimidating tyrant whose insatiable jealousy consumes his life and leads to his violent downfall.</li>
    <li><strong>Devasena (<a href=\"/person/anushka-shetty\">Anushka Shetty</a>):</strong> The proud warrior princess who endures 25 years in iron chains while gathering twigs for Bhallaladeva\'s funeral pyre, personifying unshakable resilience.</li>
</ul>

<h3>Box Office Legacy & Global Impact</h3>
<p>Produced on a lavish budget of ₹250 crore, <em>Baahubali 2: The Conclusion</em> shattered all previous records in Indian cinematic history, collecting an astronomical <strong>₹1,810 crore worldwide</strong>. It became the first Indian movie to surpass ₹1,000 crore at the global box office and earned 3 National Film Awards. Fans of grand cinematic scale can explore related stories in our curated <a href=\"/genres/action\">Action movies collection</a> and <a href=\"/genres/adventure\">Adventure film directory</a>.</p>', '2017-04-28', 167, 'U/A 13+', 9.2, 2500000000, 18100000000, 'Telugu', 'India', 'released', 1, 1, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'baahubali-2-the-conclusion-2017';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 2, id FROM `titles` WHERE `slug` = 'baahubali-2-the-conclusion-2017';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 9, id FROM `titles` WHERE `slug` = 'baahubali-2-the-conclusion-2017';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'baahubali-2-the-conclusion-2017' AND p.slug = 's-s-rajamouli'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Amarendra Baahubali / Mahendra Baahubali', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'baahubali-2-the-conclusion-2017' AND p.slug = 'prabhas'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Bhallaladeva', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'baahubali-2-the-conclusion-2017' AND p.slug = 'rana-daggubati'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Devasena', 3, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'baahubali-2-the-conclusion-2017' AND p.slug = 'anushka-shetty'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Kalki 2898 AD (kalki-2898-ad-2024)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Kalki 2898 AD', 'kalki-2898-ad-2024', 'movie', 'titles/posters/kalki-2898-ad-2024.jpg', 'The future begins with the past. A dystopian mythological science fiction epic spanning 6000 years.', '<p><strong>Kalki 2898 AD</strong> is a groundbreaking Indian post-apocalyptic science fiction spectacle directed by Nag Ashwin, featuring pan-Indian superstar <a href=\"/person/prabhas\">Prabhas</a> alongside cinematic legends <a href=\"/person/amitabh-bachchan\">Amitabh Bachchan</a>, <a href=\"/person/kamal-haasan\">Kamal Haasan</a>, and <a href=\"/person/deepika-padukone\">Deepika Padukone</a>.</p><p>Set in a dry, resource-starved world where the holy city of Kasi has become the final surviving human settlement beneath the inverted pyramid fortress known as The Complex, ruled by god-king Supreme Yaskin (<a href=\"/person/kamal-haasan\">Kamal Haasan</a>). Pregnant lab subject SUM-80 (<a href=\"/person/deepika-padukone\">Deepika Padukone</a>) escapes into the wasteland carrying the unborn divine avatar Kalki. When the immortal warrior Ashwatthama (<a href=\"/person/amitabh-bachchan\">Amitabh Bachchan</a>) rises from millennia of meditation to fulfill his sacred vow of protection, he clashes with self-centered bounty hunter Bhairava (<a href=\"/person/prabhas\">Prabhas</a>), whose sole ambition is earning one million units to buy entry into the luxurious Complex.</p>', '<h3>Mythology Meets Cyberpunk Wasteland</h3>
<p>The movie opens at the conclusion of the Kurukshetra War in 3102 BC, where Lord Krishna curses Ashwatthama with painful immortality until the arrival of the tenth avatar, Lord Kalki. Fast forward 6,000 years into 2898 AD, the earth is depleted of clean air and water, ruled by the sinister Project K which extracts fertility serum from fertile women.</p>
<p>Director Nag Ashwin fuses ancient Indian epic lore with futuristic tech, hovercraft combat, and dystopian rebellion. The climactic reveal uncovering Bhairava\'s deep karmic connection to the legendary Mahabharata archer Karna created a storm of excitement in theaters worldwide.</p>

<h3>Key Characters & Performances</h3>
<ul>
    <li><strong>Bhairava (<a href=\"/person/prabhas\">Prabhas</a>):</strong> A witty, street-smart gladiator and bounty hunter aided by his artificial intelligence companion vehicle Bujji. His easygoing humor masks unmatched combat prowess.</li>
    <li><strong>Ashwatthama (<a href=\"/person/amitabh-bachchan\">Amitabh Bachchan</a>):</strong> The towering, eight-foot-tall mythological titan armed with the divine divine staff, driven by unconditional redemption to shield mother and child.</li>
    <li><strong>Sumathi / SUM-80 (<a href=\"/person/deepika-padukone\">Deepika Padukone</a>):</strong> The gentle yet resolute pregnant refugee walking through fire to safeguard humanity\'s messiah.</li>
    <li><strong>Supreme Yaskin (<a href=\"/person/kamal-haasan\">Kamal Haasan</a>):</strong> The mysterious, decaying 200-year-old tyrant seeking the divine serum to achieve absolute cosmic supremacy.</li>
</ul>

<h3>Box Office Triumph</h3>
<p>Mounted on a record-breaking budget of ₹600 crore, <em>Kalki 2898 AD</em> grossed over <strong>₹1,042 crore worldwide</strong>, proving the enormous commercial viability of Indian mythological science fiction. Discover more high-concept futuristic movies in our <a href=\"/genres/sci-fi\">Sci-Fi category</a> and <a href=\"/genres/action\">Action cinema portal</a>.</p>', '2024-06-27', 181, 'U/A 13+', 8.9, 6000000000, 10420000000, 'Telugu', 'India', 'released', 1, 1, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'kalki-2898-ad-2024';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 3, id FROM `titles` WHERE `slug` = 'kalki-2898-ad-2024';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 9, id FROM `titles` WHERE `slug` = 'kalki-2898-ad-2024';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'kalki-2898-ad-2024' AND p.slug = 'nag-ashwin'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Bhairava / Karna', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'kalki-2898-ad-2024' AND p.slug = 'prabhas'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Ashwatthama', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'kalki-2898-ad-2024' AND p.slug = 'amitabh-bachchan'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Sumathi (SUM-80)', 3, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'kalki-2898-ad-2024' AND p.slug = 'deepika-padukone'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Supreme Yaskin', 4, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'kalki-2898-ad-2024' AND p.slug = 'kamal-haasan'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Salaar: Part 1 – Ceasefire (salaar-part-1-ceasefire-2023)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Salaar: Part 1 – Ceasefire', 'salaar-part-1-ceasefire-2023', 'movie', 'titles/posters/salaar-part-1-ceasefire-2023.jpg', 'A friendship turned into the fiercest battle. Welcome to the dark empire of Khansaar.', '<p><strong>Salaar: Part 1 – Ceasefire</strong> is an intense neo-noir action thriller written and directed by <a href=\"/person/prashanth-neel\">Prashanth Neel</a> (the mastermind behind KGF), bringing together <a href=\"/person/prabhas\">Prabhas</a> and Malayalam superstar <a href=\"/person/prithviraj-sukumaran\">Prithviraj Sukumaran</a> in a fierce tale of childhood brotherhood and blood-soaked sovereignty.</p><p>Deva (<a href=\"/person/prabhas\">Prabhas</a>) lives peacefully in self-imposed exile with his mother in Assam, having pledged never to shed blood again. However, when his childhood soulmate Varadharaja Mannar (<a href=\"/person/prithviraj-sukumaran\">Prithviraj Sukumaran</a>) faces a lethal coup inside the fortified city-state of Khansaar where ruthless warlords vie for the royal throne, Deva breaks his vow. Armed with lethal weapons and unmatched savagery, he returns to Khansaar to crown his friend, unleashing a wave of retribution.</p>', '<h3>World-Building of Khansaar</h3>
<p>Khansaar is presented as a lawless, sovereign militaristic city established in 1147 AD by three ruthless tribes: the Mannars, Shourangaas, and Ghindaars. Prashanth Neel crafts a dark industrial landscape powered by coal, oil, heavily armed mercenary battalions, and intricate tribal voting mechanics.</p>
<p>The core emotional heart of the film is the childhood promise made between Deva and Varadha. When Deva had sacrificed his family\'s tribal territory to save young Varadha\'s life decades earlier, Varadha promised that Deva could summon him anytime. Years later, Varadha calls upon Deva as his ultimate weapon of survival.</p>

<h3>Character Analysis</h3>
<ul>
    <li><strong>Devaratha \"Deva\" Raisaar / Salaar (<a href=\"/person/prabhas\">Prabhas</a>):</strong> A quiet giant of lethal restraint whose berserker combat fury turns him into an unstoppable army of one.</li>
    <li><strong>Varadharaja Mannar (<a href=\"/person/prithviraj-sukumaran\">Prithviraj Sukumaran</a>):</strong> The intelligent, strategic prince of Khansaar whose vulnerability and political ambitions make him a fascinating counterpart to Deva.</li>
</ul>

<h3>Box Office Numbers</h3>
<p>Produced by Hombale Films with a budget of ₹270 crore, <em>Salaar: Part 1 – Ceasefire</em> accumulated <strong>₹715 crore worldwide</strong>, establishing new records across both South India and overseas circuits. Discover related crime thrillers in our <a href=\"/genres/crime\">Crime genre hub</a> and <a href=\"/genres/thriller\">Thriller movie list</a>.</p>', '2023-12-22', 175, 'A', 8.7, 2700000000, 7150000000, 'Telugu', 'India', 'released', 1, 0, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'salaar-part-1-ceasefire-2023';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 2, id FROM `titles` WHERE `slug` = 'salaar-part-1-ceasefire-2023';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 4, id FROM `titles` WHERE `slug` = 'salaar-part-1-ceasefire-2023';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'salaar-part-1-ceasefire-2023' AND p.slug = 'prashanth-neel'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Devaratha \"Deva\" Raisaar / Salaar', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'salaar-part-1-ceasefire-2023' AND p.slug = 'prabhas'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Varadharaja Mannar', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'salaar-part-1-ceasefire-2023' AND p.slug = 'prithviraj-sukumaran'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Baahubali: The Beginning (baahubali-the-beginning-2015)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Baahubali: The Beginning', 'baahubali-the-beginning-2015', 'movie', 'titles/posters/baahubali-the-beginning-2015.jpg', 'The beginning of an era.', 'S. S. Rajamouli\'s 2015 fantasy epic Baahubali: The Beginning is the watershed landmark that single-handedly conceived the modern "Pan-Indian Film" industry. Set in the fictional, grand kingdom of Mahishmati, the film opens with Queen Mother Sivagami (Ramya Krishna) drowning in a river while holding an infant boy aloft above the raging waters. Raised by tribal villagers beneath towering waterfalls, the boy grows into the extraordinarily strong, adventurous Shivudu (Prabhas). Driven by curiosity and love for rebel warrior Avantika (Tamannaah Bhatia), Shivudu scales the colossal waterfalls and learns that his mother is Devansena (Anushka Shetty), held in chains for 25 years by the tyrannical Emperor Bhallaladeva (Rana Daggubati). Shivudu rescues Devasena and discovers his royal identity: he is Mahendra Baahubali, the son of the beloved, deceased King Amarendra Baahubali. Through an extended flashback of grand chariot warfare against the barbarian Kalakeya hordes, Sivagami crowns Amarendra as the true king, leading to the greatest cliffhanger in cinematic history: loyal royal slave Kattappa (Sathyaraj) confessing in tears that he was the one who murdered Baahubali. A cultural phenomenon that broke every box office record in India.', '', '2015-07-10', 159, 'Not Rated', 8, 25000000, 100000000, 'English', 'United States', 'released', 0, 0, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'baahubali-the-beginning-2015';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 2, id FROM `titles` WHERE `slug` = 'baahubali-the-beginning-2015';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 9, id FROM `titles` WHERE `slug` = 'baahubali-the-beginning-2015';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'baahubali-the-beginning-2015' AND p.slug = 's-s-rajamouli'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', NULL, 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'baahubali-the-beginning-2015' AND p.slug = 'prabhas'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Chatrapathi (chatrapathi-2005)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Chatrapathi', 'chatrapathi-2005', 'movie', 'titles/posters/ssr_chatrapathi_2005.jpg', 'A leader born from the tears of the oppressed.', 'Chatrapathi is an intense, emotionally volcanic, and profoundly moving action drama directed by S. S. Rajamouli, marking his first historic collaboration with superstar Prabhas and establishing the director-actor partnership that would eventually conquer Indian cinema with the Baahubali franchise. The film opens in a coastal village in Sri Lanka, where Sivaji, an orphaned boy, is adopted and showered with maternal love by a kind-hearted woman named Parvati, much to the bitter, festering resentment of her biological son Ashok. When ethnic riots erupt in Sri Lanka, the refugees are forcibly evacuated to India on overcrowded boats. During the harrowing escape, Ashok maliciously deceives his mother into believing Sivaji drowned at sea, cruelly severing mother and son. Reaching the port city of Visakhapatnam, Sivaji and fellow refugees are enslaved by local port mafioso Baji Rao and his sadistic younger brother Ras Bihari, who exploit the undocumented migrants as bonded laborers under subhuman conditions. For twelve years, Sivaji endures the torment while tirelessly searching for his lost mother. However, when Ras Bihari\'s goons kill an innocent refugee child and demand obedience, Sivaji\'s patience turns into raw, unstoppable fury. In an iconic, rain-soaked confrontation, Sivaji single-handedly decapitates the tyrant, liberating the entire coastal colony. The oppressed refugees hail him as their supreme savior and christen him \'Chatrapathi\' — a warrior king defending the helpless. But as Sivaji wages war against international smuggler Katraju, his treacherous stepbrother Ashok resurfaces, threatening to destroy Sivaji\'s empire and poison his long-sought reunion with his beloved mother.', '', '2005-09-29', 158, 'A', 7.7, 80000000, 220000000, 'Telugu', 'United States', 'released', 0, 0, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'chatrapathi-2005';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 2, id FROM `titles` WHERE `slug` = 'chatrapathi-2005';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 5, id FROM `titles` WHERE `slug` = 'chatrapathi-2005';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'chatrapathi-2005' AND p.slug = 's-s-rajamouli'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Sivaji / Chatrapathi', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'chatrapathi-2005' AND p.slug = 'prabhas'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Neelu', 3, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'chatrapathi-2005' AND p.slug = 'shriya-saran'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Pushpa 2: The Rule (pushpa-2-the-rule-2024)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Pushpa 2: The Rule', 'pushpa-2-the-rule-2024', 'movie', 'titles/posters/pushpa-2-the-rule-2024.jpg', 'Jhukega nahi saala! The rule begins as Pushpa Raj expands his empire across global borders.', '<p><strong>Pushpa 2: The Rule</strong> is the highly anticipated mass action drama directed by master craftsman <a href=\"/person/sukumar\">Sukumar</a>, starring National Film Award-winning superstar <a href=\"/person/allu-arjun\">Allu Arjun</a> alongside <a href=\"/person/rashmika-mandanna\">Rashmika Mandanna</a> and Malayalam powerhouse <a href=\"/person/fahadh-faasil\">Fahadh Faasil</a>.</p><p>Following his triumph over local red sandalwood syndicates, Pushpa Raj (<a href=\"/person/allu-arjun\">Allu Arjun</a>) rises to absolute control over the international smuggling trade. However, his rise is challenged by an obsessive, vindictive nemesis in Superintendent of Police Bhanwar Singh Shekhawat (<a href=\"/person/fahadh-faasil\">Fahadh Faasil</a>), who will stop at nothing to tear down Pushpa\'s pride and empire. Balancing high-stakes syndicate wars, regional politics, and his deep affection for his wife Srivalli (<a href=\"/person/rashmika-mandanna\">Rashmika Mandanna</a>), Pushpa proves that true power comes from unbending conviction.</p>', '<h3>The Evolution of Pushpa Raj</h3>
<p>Unlike traditional movie protagonists, Pushpa Raj is an unapologetic anti-hero who clawed his way up from being an illegitimate, disenfranchised coolie to the supreme lord of the Seshachalam forests. In <em>The Rule</em>, director Sukumar elevates the stakes into international trade routes, political kingmaking, and intense mind games between two egotistical masterminds.</p>
<p>The centerpiece of the movie is the legendary <strong>Jathara sequence</strong>, where Allu Arjun performs in traditional Gangamma Jathara makeup, blue saree, and ornaments, delivering an electrifying, goosebumps-inducing action spectacle that became an instant cultural phenomenon across India.</p>

<h3>Cast & Key Performances</h3>
<ul>
    <li><strong>Pushpa Raj (<a href=\"/person/allu-arjun\">Allu Arjun</a>):</strong> With his distinct shoulder drop, rustic Chittoor slang, and fierce charisma, Allu Arjun commands every second on screen.</li>
    <li><strong>SP Bhanwar Singh Shekhawat (<a href=\"/person/fahadh-faasil\">Fahadh Faasil</a>):</strong> Deranged, calculating, and relentlessly ruthless, Shekhawat serves as the ultimate ideological antithesis to Pushpa.</li>
    <li><strong>Srivalli (<a href=\"/person/rashmika-mandanna\">Rashmika Mandanna</a>):</strong> The anchor of Pushpa\'s humanity, bringing heart, warmth, and resilience to the rugged world.</li>
</ul>

<h3>Unprecedented Box Office Records</h3>
<p>Mounted on a mammoth budget of ₹350 crore, <em>Pushpa 2: The Rule</em> shattered all-time opening day and lifetime records, collecting upwards of <strong>₹1,500 crore worldwide</strong>. It stands as one of the top 3 highest-earning Indian movies ever made. Dive into more pulse-pounding stories in our <a href=\"/genres/action\">Action collection</a> and <a href=\"/genres/drama\">Drama movies section</a>.</p>', '2024-12-05', 200, 'U/A 16+', 9.1, 3500000000, 15000000000, 'Telugu', 'India', 'released', 1, 1, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'pushpa-2-the-rule-2024';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 2, id FROM `titles` WHERE `slug` = 'pushpa-2-the-rule-2024';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 4, id FROM `titles` WHERE `slug` = 'pushpa-2-the-rule-2024';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'pushpa-2-the-rule-2024' AND p.slug = 'sukumar'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Pushpa Raj', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'pushpa-2-the-rule-2024' AND p.slug = 'allu-arjun'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'SP Bhanwar Singh Shekhawat', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'pushpa-2-the-rule-2024' AND p.slug = 'fahadh-faasil'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Srivalli', 3, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'pushpa-2-the-rule-2024' AND p.slug = 'rashmika-mandanna'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Pushpa: The Rise (pushpa-the-rise-2021)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Pushpa: The Rise', 'pushpa-the-rise-2021', 'movie', 'titles/posters/pushpa-the-rise-2021.jpg', 'Pushpa... Pushpa Raj... Thaggedhe Le! The gritty rise of a forest laborer to sandalwood kingpin.', '<p><strong>Pushpa: The Rise</strong> is the super-hit action thriller written and directed by <a href=\"/person/sukumar\">Sukumar</a> that turned <a href=\"/person/allu-arjun\">Allu Arjun</a> into a pan-Indian household name, co-starring <a href=\"/person/rashmika-mandanna\">Rashmika Mandanna</a> and <a href=\"/person/fahadh-faasil\">Fahadh Faasil</a>.</p><p>Set against the backdrop of the dense Seshachalam forests of Andhra Pradesh, the plot follows Pushpa Raj (<a href=\"/person/allu-arjun\">Allu Arjun</a>), a courageous daily wage laborer who cuts rare red sandalwood trees. Blessed with sharp intelligence and fearless daring, Pushpa outsmarts forest rangers, police checks, and senior smuggling bosses to climb the ranks of the syndicate. Along the way, he falls in love with milk vendor Srivalli (<a href=\"/person/rashmika-mandanna\">Rashmika Mandanna</a>), while facing an unexpected rival in the eccentric police officer Bhanwar Singh Shekhawat (<a href=\"/person/fahadh-faasil\">Fahadh Faasil</a>).</p>', '<h3>The Birth of a Phenomenon</h3>
<p>Released during the post-pandemic recovery era in December 2021, <em>Pushpa: The Rise</em> ignited unprecedented craze across India. The film earned Allu Arjun the prestigious <strong>National Film Award for Best Actor</strong>, making him the first Telugu actor in history to win the coveted honor in the category.</p>
<p>From the iconic beard stroke gesture and the dialogue <em>\"Thaggedhe Le\"</em> (\"Main Jhukega Nahi\") to chartbuster songs composed by Devi Sri Prasad like <em>\"Srivalli\"</em>, <em>\"Oo Antava\"</em>, and <em>\"Saami Saami\"</em>, the film infiltrated popular culture globally.</p>

<h3>Box Office Success</h3>
<p>Produced with a budget of ₹170 crore, the movie grossed <strong>₹373 crore worldwide</strong>, emerging as the highest-grossing Indian film of 2021. Explore similar high-adrenaline films in our <a href=\"/genres/action\">Action directory</a>.</p>', '2021-12-17', 179, 'U/A 13+', 8.6, 1700000000, 3730000000, 'Telugu', 'India', 'released', 0, 0, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'pushpa-the-rise-2021';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 2, id FROM `titles` WHERE `slug` = 'pushpa-the-rise-2021';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 4, id FROM `titles` WHERE `slug` = 'pushpa-the-rise-2021';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'pushpa-the-rise-2021' AND p.slug = 'sukumar'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Pushpa Raj', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'pushpa-the-rise-2021' AND p.slug = 'allu-arjun'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Srivalli', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'pushpa-the-rise-2021' AND p.slug = 'rashmika-mandanna'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'SP Bhanwar Singh Shekhawat', 3, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'pushpa-the-rise-2021' AND p.slug = 'fahadh-faasil'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Ala Vaikunthapurramuloo (ala-vaikunthapurramuloo-2020)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Ala Vaikunthapurramuloo', 'ala-vaikunthapurramuloo-2020', 'movie', 'titles/posters/ala-vaikunthapurramuloo-2020.jpg', 'A heartwarming family celebration of love, identity, and the pure joy of doing the right thing.', '<p><strong>Ala Vaikunthapurramuloo</strong> is the iconic Telugu musical action drama directed by dialogue wizard <a href=\"/person/trivikram-srinivas\">Trivikram Srinivas</a>, starring Stylish Star <a href=\"/person/allu-arjun\">Allu Arjun</a> alongside <a href=\"/person/pooja-hegde\">Pooja Hegde</a>, Tabu, and Jayaram.</p><p>Bantu (<a href=\"/person/allu-arjun\">Allu Arjun</a>) is a hardworking, humorous, and good-natured young man who grows up under the relentless insults of his envious father Valmiki. Unbeknownst to Bantu, Valmiki had switched him at birth with the son of his wealthy boss Ramachandra to secure a luxurious life for his own biological child. When Bantu finally uncovers the truth of his royal birthright, he chooses not to claim the wealth for himself, but instead enters the lavish mansion \"Vaikunthapurram\" to secretly protect his biological family from corporate greed and violent enemies, winning hearts with his wit, charm, and filial loyalty.</p>', '<h3>Wholesome Family Entertainment & Trivikram\'s Writing</h3>
<p><em>Ala Vaikunthapurramuloo</em> represents the gold standard of modern Telugu commercial cinema. Trivikram Srinivas combines sharp social philosophy with rib-tickling humor, vibrant family dynamics, and clean, wholesome storytelling. The boardroom conference scene where Allu Arjun improvises a stylish dance sequence to vintage Telugu cinema hits remains one of the most celebrated comedic moments of the decade.</p>

<h3>Music Sensation by Thaman S</h3>
<p>The film\'s music album composed by Thaman S became an international viral sensation:
<ul>
    <li><em>\"Butta Bomma\"</em>: Surpassed 800 million views on YouTube, with global celebrities and cricketers mimicking Allu Arjun\'s effortless footwork.</li>
    <li><em>\"Samajavaragamana\"</em>: One of the fastest Telugu songs to cross 100 million views, showcasing soulful melodies.</li>
    <li><em>\"Ramuloo Ramulaa\"</em>: The quintessential party anthem across South India.</li>
</ul>
</p>

<h3>Box Office Milestone</h3>
<p>Mounted on a production cost of ₹100 crore, <em>Ala Vaikunthapurramuloo</em> delivered a staggering <strong>₹280 crore worldwide gross</strong> during Sankranti 2020, becoming one of the highest-grossing non-mythological Telugu movies of all time. Explore more lighthearted dramas in our <a href=\"/genres/comedy\">Comedy portal</a> and <a href=\"/genres/drama\">Drama category</a>.</p>', '2020-01-12', 165, 'U/A 13+', 8.8, 1000000000, 2800000000, 'Telugu', 'India', 'released', 1, 0, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'ala-vaikunthapurramuloo-2020';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 2, id FROM `titles` WHERE `slug` = 'ala-vaikunthapurramuloo-2020';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 6, id FROM `titles` WHERE `slug` = 'ala-vaikunthapurramuloo-2020';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'ala-vaikunthapurramuloo-2020' AND p.slug = 'trivikram-srinivas'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Bantu', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'ala-vaikunthapurramuloo-2020' AND p.slug = 'allu-arjun'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Amulya', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'ala-vaikunthapurramuloo-2020' AND p.slug = 'pooja-hegde'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Sarrainodu (sarrainodu-2016)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Sarrainodu', 'sarrainodu-2016', 'movie', 'titles/posters/sarrainodu-2016.jpg', 'When law enforcement fails the innocent, one fearless soldier delivers absolute justice.', '<p><strong>Sarrainodu</strong> is a high-octane mass action blockbuster directed by Boyapati Srinu, starring <a href=\"/person/allu-arjun\">Allu Arjun</a> as an ex-military commando alongside Rakul Preet Singh, Catherine Tresa, and Aadhi Pinisetty.</p><p>Gana (<a href=\"/person/allu-arjun\">Allu Arjun</a>) is an honorable former army officer who cannot tolerate injustice. Frustrated by legal loopholes that let criminals walk free, Gana beats up anti-social elements and forces the judicial system to hold them accountable. His crusade brings him into direct, bloody conflict with Vairam Dhanush (Aadhi Pinisetty), the sadistic and politically untouchable son of the Chief Minister. When Dhanush wipes out innocent villagers to seize their ancestral lands, Gana stands as a one-man army to protect a terrified survivor and dismantle Dhanush\'s reign of terror.</p>', '<h3>High-Voltage Mass Cinema at its Peak</h3>
<p>Directed with explosive energy by mass specialist Boyapati Srinu, <em>Sarrainodu</em> presented Allu Arjun in a fiercely masculine, heavy-weight action avatar that stunned audiences. The confrontation scenes between Allu Arjun and Aadhi Pinisetty\'s chillingly cold antagonist created thunderous theater responses.</p>
<p>The film achieved historic television and digital viewership across India. Its Hindi-dubbed version on YouTube shattered all records, amassing over <strong>500 million views</strong> and cementing Allu Arjun\'s immense popularity among Hindi-speaking audiences years before <em>Pushpa</em>.</p>

<h3>Financial Success</h3>
<p>Produced by Geetha Arts with a budget of ₹50 crore, <em>Sarrainodu</em> collected <strong>₹127 crore worldwide</strong>, emerging as one of the biggest commercial blockbusters of 2016. Check out more adrenaline-filled titles in our <a href=\"/genres/action\">Action movies guide</a>.</p>', '2016-04-22', 159, 'U/A 13+', 8.2, 500000000, 1270000000, 'Telugu', 'India', 'released', 0, 0, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'sarrainodu-2016';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 2, id FROM `titles` WHERE `slug` = 'sarrainodu-2016';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Gana (Ganesh)', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'sarrainodu-2016' AND p.slug = 'allu-arjun'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Pokiri (pokiri-2006)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Pokiri', 'pokiri-2006', 'movie', 'titles/posters/pokiri-2006.jpg', 'He kills for money, fears no one, and obeys no rules. Until his true identity changes the game.', '<p><strong>Pokiri</strong> is the legendary industry-defining Telugu action crime thriller directed by <a href=\"/person/puri-jagannadh\">Puri Jagannadh</a>, starring Superstar <a href=\"/person/mahesh-babu\">Mahesh Babu</a> in his most iconic mass performance alongside Ileana D\'Cruz and Prakash Raj.</p><p>Krishna Manohar alias Pandu (<a href=\"/person/mahesh-babu\">Mahesh Babu</a>) is a cold, fearless mercenary hitman operating in Hyderabad\'s criminal underworld who will do any dirty job for money. As rival gang wars intensify between local boss Mani and Dubai-based ruthless mafia don Ali Bhai (Prakash Raj), Pandu plays both sides with lethal precision while developing feelings for a soft-hearted aerobics teacher Shruti. However, in an electrifying third-act twist that revolutionized Indian action cinema, Pandu is revealed to be undercover IPS officer Krishna Manohar, sent on a deadly mission to eradicate the mafia from its roots.</p>', '<h3>The Landmark That Redefined Indian Action Cinema</h3>
<p><em>Pokiri</em> is widely regarded by film historians as a watershed moment in South Indian commercial cinema. Director Puri Jagannadh stripped away cinematic clichés to deliver raw, punchy dialogues, stylish cinematography, and an effortlessly cool protagonist whose nonchalant swagger set fashion and attitude trends for an entire generation.</p>
<p>The famous punch dialogue <em>\"Okka sari commit ayithe na maata nene vinanu\"</em> (Once I commit, I don\'t even listen to myself) became immortalized across Indian pop culture. The film\'s massive formula was later officially remade in Tamil as <em>Pokkiri</em> starring Vijay and in Hindi as Salman Khan\'s career-reviving blockbuster <em>Wanted</em> (2009).</p>

<h3>Record-Breaking Theatrical Run</h3>
<p>Produced on a modest budget of ₹12 crore, <em>Pokiri</em> completed an astonishing <strong>500-day run</strong> in theaters and collected over <strong>₹66 crore worldwide</strong> in 2006, holding the record as the highest-grossing Telugu movie of all time for over three years. Fans of crime fiction can explore more in our <a href=\"/genres/crime\">Crime movie catalog</a> and <a href=\"/genres/action\">Action movies section</a>.</p>', '2006-04-28', 161, 'U/A 13+', 9.2, 120000000, 660000000, 'Telugu', 'India', 'released', 1, 1, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'pokiri-2006';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 4, id FROM `titles` WHERE `slug` = 'pokiri-2006';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 5, id FROM `titles` WHERE `slug` = 'pokiri-2006';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'pokiri-2006' AND p.slug = 'puri-jagannadh'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Krishna Manohar IPS / Pandu', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'pokiri-2006' AND p.slug = 'mahesh-babu'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Srimanthudu (srimanthudu-2015)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Srimanthudu', 'srimanthudu-2015', 'movie', 'titles/posters/srimanthudu-2015.jpg', 'A billionaire who gave up an empire to give life back to a forgotten village.', '<p><strong>Srimanthudu</strong> is an emotionally resonant social action drama written and directed by <a href=\"/person/koratala-siva\">Koratala Siva</a>, starring Superstar <a href=\"/person/mahesh-babu\">Mahesh Babu</a> alongside Shruti Haasan, Jagapathi Babu, and Rajendra Prasad.</p><p>Harsha Vardhan (<a href=\"/person/mahesh-babu\">Mahesh Babu</a>) is the philosophical and compassionate sole heir to his father Ravikanth\'s multi-billion dollar business conglomerate. Uninterested in hoarding corporate wealth, Harsha seeks meaningful purpose in life. While studying rural development, he meets Charuseela (Shruti Haasan) and discovers that his family roots trace back to Devarakotta, a drought-ravaged village plagued by poverty, disease, and extortion by ruthless feudal politician Sasi. Renouncing his luxury, Harsha arrives in Devarakotta to adopt the village, building schools, sanitation systems, and water pipelines with his own hands while fearlessly fighting off the corrupt mafia.</p>', '<h3>Real-World Social Impact</h3>
<p><em>Srimanthudu</em> transcended cinema to spark a nationwide real-world revolution. Inspired by Mahesh Babu\'s on-screen character Harsha, thousands of politicians, business executives, and NRI professionals adopted underdeveloped villages across Andhra Pradesh and Telangana to build basic civic infrastructure. Mahesh Babu himself adopted his ancestral village Burripalem in Andhra Pradesh and Siddhapuram in Telangana.</p>

<h3>Storytelling & Music Excellence</h3>
<p>Koratala Siva struck the perfect equilibrium between meaningful social commentary and high-energy commercial heroism. Devi Sri Prasad composed an inspiring soundtrack featuring hits like <em>\"Jaago\"</em> and <em>\"Rama Rama\"</em>, enhancing the emotional grandeur of rural revitalization.</p>

<h3>Box Office Landmark</h3>
<p>Produced by Mythri Movie Makers with a budget of ₹50 crore, <em>Srimanthudu</em> grossed an extraordinary <strong>₹200 crore worldwide</strong>, becoming the second-highest-grossing Telugu film of its time behind only Baahubali. Explore more inspiring stories in our <a href=\"/genres/drama\">Drama film section</a>.</p>', '2015-08-07', 163, 'U/A 13+', 8.9, 500000000, 2000000000, 'Telugu', 'India', 'released', 1, 0, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'srimanthudu-2015';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 2, id FROM `titles` WHERE `slug` = 'srimanthudu-2015';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'srimanthudu-2015' AND p.slug = 'koratala-siva'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Harsha Vardhan', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'srimanthudu-2015' AND p.slug = 'mahesh-babu'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Dookudu (dookudu-2011)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Dookudu', 'dookudu-2011', 'movie', 'titles/posters/dookudu-2011.jpg', 'Dare and Dashing. An undercover cop stages the ultimate comedy illusion to save his father and hunt his foes.', '<p><strong>Dookudu</strong> is a blockbuster action comedy directed by Srinu Vaitla, starring <a href=\"/person/mahesh-babu\">Mahesh Babu</a> and <a href=\"/person/samantha-ruth-prabhu\">Samantha Ruth Prabhu</a> in one of the most entertaining and hilarious movies in modern Telugu cinema.</p><p>Ajay Kumar (<a href=\"/person/mahesh-babu\">Mahesh Babu</a>) is a daring undercover IPS officer hunting down international underworld kingpin Nayak (Sonu Sood). Meanwhile, Ajay\'s idealistic politician father Shankar Narayana (Prakash Raj) awakens from a 14-year coma following a staged car crash. Because doctors warn that any sudden shock or stress will prove fatal to Shankar Narayana, Ajay must conceal his police career and the changed political landscape. With the help of an aspiring film director and a bumbling actor Padmasri (Brahmanandam), Ajay stages an elaborate fictional reality environment where his father believes he is an MLA, all while covertly tracking down the criminals who tried to murder his dad.</p>', '<h3>Masterclass in Action Comedy Entertainment</h3>
<p><em>Dookudu</em> represents the pinnacle of Srinu Vaitla\'s signature action-comedy formula. The comedic interplay between Mahesh Babu, comedy titan Brahmanandam, and MS Narayana generated non-stop laughter and remains heavily quoted in television reruns and social media memes.</p>
<p>The film swept <strong>6 Filmfare Awards South</strong> and <strong>7 Nandi Awards</strong>, winning Best Actor for Mahesh Babu, Best Film, and Best Director.</p>

<h3>Overseas Box Office Breakthrough</h3>
<p>Produced by 14 Reels Entertainment on a budget of ₹38 crore, <em>Dookudu</em> collected <strong>₹101 crore worldwide</strong>. Notably, it became the first Telugu film to gross over $1 million in the United States, opening up North America as a major commercial distribution territory for Telugu cinema. Discover more comedic action hits in our <a href=\"/genres/comedy\">Comedy portal</a>.</p>', '2011-09-23', 170, 'U/A 13+', 8.7, 380000000, 1010000000, 'Telugu', 'India', 'released', 0, 0, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'dookudu-2011';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 6, id FROM `titles` WHERE `slug` = 'dookudu-2011';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Ajay Kumar IPS', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'dookudu-2011' AND p.slug = 'mahesh-babu'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Prashanthi', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'dookudu-2011' AND p.slug = 'samantha-ruth-prabhu'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Bharat Ane Nenu (bharat-ane-nenu-2018)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Bharat Ane Nenu', 'bharat-ane-nenu-2018', 'movie', 'titles/posters/bharat-ane-nenu-2018.jpg', 'A promise is a promise. A young leader takes oath to rebuild governance from the ground up.', '<p><strong>Bharat Ane Nenu</strong> is an intelligent, high-voltage political drama written and directed by <a href=\"/person/koratala-siva\">Koratala Siva</a>, featuring <a href=\"/person/mahesh-babu\">Mahesh Babu</a> as a youthful Chief Minister alongside Kiara Advani and Prakash Raj.</p><p>Bharat Ram (<a href=\"/person/mahesh-babu\">Mahesh Babu</a>) is a brilliant young graduate who has earned five degrees from Oxford University and has lived overseas for most of his life. Following the sudden death of his father, the Chief Minister of Andhra Pradesh, Bharat is reluctantly convinced by veteran politician Varadarajulu (Prakash Raj) to step in and take oath as the state\'s new leader. Rather than serving as a political puppet, Bharat takes his oath seriously. Guided by his mother\'s lesson that breaking a promise is the greatest sin, he launches radical reforms in traffic safety, public education, hospital accountability, and anti-corruption, shaking the corrupt political establishment to its core.</p>', '<h3>Civic Responsibility & Clean Governance</h3>
<p><em>Bharat Ane Nenu</em> delivers an inspiring thesis on good governance, citizen accountability, and transparent politics. The film gained massive praise for presenting realistic administrative solutions—such as heavy traffic penalties to instill road discipline, educational fee caps, and direct local governance (Panchayat empowerment)—rather than relying on unrealistic vigilante violence.</p>

<h3>Performances and Musical Soul</h3>
<p>Mahesh Babu delivered a composed, authoritative, and dignified performance that captured the poise of an Oxford-educated statesman. The press conference scene, where Bharat systematically dismantles sensation-seeking media journalism and hypocritical politicians, is widely considered one of the finest monologue scenes in modern Indian cinema.</p>

<h3>Commercial Milestone</h3>
<p>Mounted with a budget of ₹65 crore, <em>Bharat Ane Nenu</em> collected <strong>₹187 crore worldwide</strong>, winning widespread acclaim from critics, audiences, and political analysts alike. Explore related dramas in our <a href=\"/genres/drama\">Drama catalog</a>.</p>', '2018-04-20', 173, 'U/A 13+', 8.8, 650000000, 1870000000, 'Telugu', 'India', 'released', 1, 0, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'bharat-ane-nenu-2018';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 2, id FROM `titles` WHERE `slug` = 'bharat-ane-nenu-2018';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'bharat-ane-nenu-2018' AND p.slug = 'koratala-siva'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Bharat Ram (Chief Minister)', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'bharat-ane-nenu-2018' AND p.slug = 'mahesh-babu'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: RRR (rrr-2022)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('RRR', 'rrr-2022', 'movie', 'titles/posters/rrr-2022.jpg', 'Rise, Roar, Revolt. The Oscar-winning revolutionary brotherhood that took the world by storm.', '<p><strong>RRR</strong> is the global cinematic sensation directed by legendary visionary <a href=\"/person/s-s-rajamouli\">S. S. Rajamouli</a>, starring Mega Power Star <a href=\"/person/ram-charan\">Ram Charan</a> alongside Young Tiger <a href=\"/person/jr-ntr\">Jr NTR</a>, <a href=\"/person/alia-bhatt\">Alia Bhatt</a>, and Ajay Devgn.</p><p>Set in 1920s British-occupied India, the fictionalized historical epic brings together two real-life legendary freedom fighters: Alluri Sitarama Raju (<a href=\"/person/ram-charan\">Ram Charan</a>), a fiercely disciplined Indian police officer working undercover inside the British force, and Komaram Bheem (<a href=\"/person/jr-ntr\">Jr NTR</a>), a Gond tribal protector who travels to Delhi to rescue a young tribal girl named Malli abducted by tyrannical British Governor Scott. Ignorant of each other\'s secret identities, the two men form an unbreakable bond of brotherhood after heroically saving a young boy from a fiery train explosion, until duty, sacrifice, and imperial betrayal test their loyalty to the absolute limits.</p>', '<h3>Global Acclaim and Oscar History</h3>
<p><em>RRR</em> became an unprecedented worldwide phenomenon, capturing the hearts of Hollywood directors, critics, and global audiences. The electrifying dance anthem <strong>\"Naatu Naatu\"</strong>, composed by M. M. Keeravani and performed with mind-blowing synchronization by Ram Charan and Jr NTR, won the <strong>Academy Award for Best Original Song (Oscars 2023)</strong> and the <strong>Golden Globe Award</strong>, making history as the first Indian feature film song to achieve the honor.</p>

<h3>Ram Charan\'s Career-Defining Performance</h3>
<p>Ram Charan delivered an acting masterclass showcasing incredible range across three distinct phases:
<ul>
    <li>The ruthless, cold British officer enduring internal agony while hunting rebels.</li>
    <li>The warm, loving brother laughing and dancing alongside Bheem and Sita (<a href=\"/person/alia-bhatt\">Alia Bhatt</a>).</li>
    <li>The divine, saffron-clad warrior wielding bow and arrow in the image of Lord Rama, laying waste to the British military complex.</li>
</ul>
</p>

<h3>Historic Worldwide Box Office</h3>
<p>Produced by DVV Entertainment on a colossal budget of ₹550 crore, <em>RRR</em> earned an astounding <strong>₹1,387 crore worldwide</strong>, making it the third highest-grossing Indian film of all time. Explore more adrenaline-filled epics in our <a href=\"/genres/action\">Action movies portal</a> and <a href=\"/genres/adventure\">Adventure section</a>.</p>', '2022-03-25', 187, 'U/A 16+', 9.3, 5500000000, 13870000000, 'Telugu', 'India', 'released', 1, 1, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'rrr-2022';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 2, id FROM `titles` WHERE `slug` = 'rrr-2022';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 9, id FROM `titles` WHERE `slug` = 'rrr-2022';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'rrr-2022' AND p.slug = 's-s-rajamouli'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Alluri Sitarama Raju', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'rrr-2022' AND p.slug = 'ram-charan'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Komaram Bheem', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'rrr-2022' AND p.slug = 'jr-ntr'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Sita', 3, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'rrr-2022' AND p.slug = 'alia-bhatt'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Rangasthalam (rangasthalam-2018)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Rangasthalam', 'rangasthalam-2018', 'movie', 'titles/posters/rangasthalam-2018.jpg', 'A village ruled by fear. A deaf hero who hears the heartbeat of justice.', '<p><strong>Rangasthalam</strong> is an award-winning rustic period action drama written and directed by <a href=\"/person/sukumar\">Sukumar</a>, starring <a href=\"/person/ram-charan\">Ram Charan</a> in a career-defining performance alongside <a href=\"/person/samantha-ruth-prabhu\">Samantha Ruth Prabhu</a>, Aadhi Pinisetty, and Jagapathi Babu.</p><p>Set in the 1980s in the dusty Godavari village of Rangasthalam, Chitti Babu (<a href=\"/person/ram-charan\">Ram Charan</a>) is a cheerful, partially hearing-impaired sound-engine mechanic whose unconditional love for his family and simple village life is his greatest joy. For thirty years, the village has lived under the ruthless grip of tyrannical feudal President Phanindra Bhupathi (Jagapathi Babu). When Chitti Babu\'s Dubai-returned educated elder brother Kumar Babu (Aadhi Pinisetty) decides to contest village elections against the oppressive dictator, Chitti Babu becomes his shadow protector. But when political bloodshed strikes close to home, Chitti Babu unleashes righteous fury against the hidden culprits.</p>', '<h3>Masterclass in Realistic Period Storytelling</h3>
<p>Director Sukumar abandoned glamorous commercial tropes to create a 100% authentic village ecosystem. Ram Charan completely surrendered to the character of Chitti Babu, mastering the Godavari coastal accent, innocent physical comedy, and raw emotional vulnerability, earning the <strong>Filmfare Award for Best Actor – Telugu</strong>.</p>
<p>The chemistry between Ram Charan and Samantha (playing the outspoken village girl Rama Lakshmi) was deeply cherished. Devi Sri Prasad\'s raw folk songs—including <em>\"Rangamma Mangamma\"</em>, <em>\"Jigelu Rani\"</em>, and <em>\"Yentha Sakkagunnave\"</em>—became massive pan-India hits.</p>

<h3>Blockbuster Box Office Reception</h3>
<p>Produced by Mythri Movie Makers on a budget of ₹60 crore, <em>Rangasthalam</em> grossed over <strong>₹216 crore worldwide</strong>, emerging as the highest-grossing non-Baahubali film in Telugu cinema history at the time of its release. Explore more authentic stories in our <a href=\"/genres/drama\">Drama movie hub</a>.</p>', '2018-03-30', 179, 'U/A 13+', 9, 600000000, 2160000000, 'Telugu', 'India', 'released', 1, 0, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'rangasthalam-2018';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 2, id FROM `titles` WHERE `slug` = 'rangasthalam-2018';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'rangasthalam-2018' AND p.slug = 'sukumar'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Chitti Babu', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'rangasthalam-2018' AND p.slug = 'ram-charan'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Rama Lakshmi', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'rangasthalam-2018' AND p.slug = 'samantha-ruth-prabhu'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Magadheera (magadheera-2009)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Magadheera', 'magadheera-2009', 'movie', 'titles/posters/ssr_magadheera_2009.jpg', 'A love story separated by four hundred years of destiny, revived for vengeance and eternal union.', '<p><strong>Magadheera</strong> is the landmark fantasy reincarnation action epic directed by <a href=\"/person/s-s-rajamouli\">S. S. Rajamouli</a> that catapulted <a href=\"/person/ram-charan\">Ram Charan</a> into overnight superstardom in only his second movie, co-starring Kajal Aggarwal and Dev Gill.</p><p>Harsha (<a href=\"/person/ram-charan\">Ram Charan</a>) is a daring motorcycle stuntman in Hyderabad whose accidental touch of a woman\'s hand triggers flashes of a past life. As he falls in love with Indu (Kajal Aggarwal), he uncovers his heroic past life from 1609 AD in the kingdom of Udaygadh. 400 years ago, he was Kala Bhairava, the peerless warrior commander who loved princess Mithravinda and defended his kingdom against treasonous cousin Ranadev Billa. When reincarnated evil threatens Indu once more, Harsha taps into his ancient martial fury to conquer destiny.</p>', '<h3>The 100-Warrior Cliffside Battle</h3>
<p>The hallmark of <em>Magadheera</em> is the breathtaking 100-warrior cliff battle choreographed by Peter Hein and directed by S. S. Rajamouli, where Kala Bhairava single-handedly battles an imperial army on a narrow mountain ridge to shield his princess. The sequence remains one of the greatest hand-to-hand combat scenes in Indian cinema history.</p>
<p>The film won <strong>2 National Film Awards</strong> (Best Special Effects and Best Choreography) and 6 Filmfare Awards South, proving Rajamouli\'s unparalleled visual grandeur years before Baahubali.</p>

<h3>Unprecedented Box Office Legacy</h3>
<p>Produced by Geetha Arts with a groundbreaking budget of ₹40 crore, <em>Magadheera</em> collected an astonishing <strong>₹150 crore worldwide</strong> in 2009, maintaining the title of the highest-grossing Telugu film for over five consecutive years. Experience more fantasy epics in our <a href=\"/genres/adventure\">Adventure hub</a>.</p>', '2009-07-31', 166, 'U/A 13+', 9, 400000000, 1500000000, 'Telugu', 'India', 'released', 0, 0, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'magadheera-2009';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 8, id FROM `titles` WHERE `slug` = 'magadheera-2009';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 9, id FROM `titles` WHERE `slug` = 'magadheera-2009';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'magadheera-2009' AND p.slug = 's-s-rajamouli'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Kala Bhairava / Harsha', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'magadheera-2009' AND p.slug = 'ram-charan'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Mithravinda Devi / Indu', 3, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'magadheera-2009' AND p.slug = 'kajal-aggarwal'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Dhruva (dhruva-2016)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Dhruva', 'dhruva-2016', 'movie', 'titles/posters/dhruva-2016.jpg', 'My enemy defines my capacity. A razor-sharp intellectual battle between an IPS officer and a criminal mastermind.', '<p><strong>Dhruva</strong> is a slick, stylish psychological action thriller directed by Surender Reddy, starring <a href=\"/person/ram-charan\">Ram Charan</a> as a relentless police officer locked in a high-stakes duel of intellect against mastermind scientist <a href=\"/person/arvind-swamy\">Arvind Swamy</a>.</p><p>Dhruva (<a href=\"/person/ram-charan\">Ram Charan</a>) is an exceptionally gifted IPS probationer who uses private data mapping to connect seemingly unrelated crimes across the country. He realizes that behind every political scam, illegal drug trial, and counterfeit operation stands one hidden puppet master: Dr. Siddharth Abhimanyu (<a href=\"/person/arvind-swamy\">Arvind Swamy</a>), a charming, sociopathic Padma Shri award-winning medical scientist. When Dhruva targets Siddharth to destroy the root cause of corruption, Siddharth plants hidden listening bugs and strikes back with clinical cunning, initiating a razor-edge game of cat and mouse.</p>', '<h3>Intellectual Cat-and-Mouse Brilliance</h3>
<p><em>Dhruva</em> broke conventional mass film stereotypes by presenting a story where brainpower, strategic surveillance, and psychological traps take precedence over mindless fistfights. Ram Charan underwent a dramatic physical transformation to portray the athletic, disciplined IPS officer, delivering a focused and intense performance.</p>
<p>Arvind Swamy received universal praise for making Siddharth Abhimanyu one of the most sophisticated, fashionable, and memorable villains in modern Indian cinema. Hiphop Tamizha\'s pulse-pounding electronic background score elevated the suspense to international standards.</p>

<h3>Commercial Success</h3>
<p>Produced by Geetha Arts with a budget of ₹50 crore, <em>Dhruva</em> grossed over <strong>₹88 crore worldwide</strong>, winning widespread acclaim for its taut screenplay. Discover more mind-bending thrillers in our <a href=\"/genres/thriller\">Thriller section</a> and <a href=\"/genres/action\">Action collection</a>.</p>', '2016-12-09', 159, 'U/A 13+', 8.5, 500000000, 880000000, 'Telugu', 'India', 'released', 0, 0, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'dhruva-2016';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 4, id FROM `titles` WHERE `slug` = 'dhruva-2016';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 5, id FROM `titles` WHERE `slug` = 'dhruva-2016';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Dhruva IPS', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'dhruva-2016' AND p.slug = 'ram-charan'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Dr. Siddharth Abhimanyu', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'dhruva-2016' AND p.slug = 'arvind-swamy'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Soorarai Pottru (soorarai-pottru-2020)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Soorarai Pottru', 'soorarai-pottru-2020', 'movie', 'titles/posters/soorarai-pottru-2020.jpg', 'Praise the brave. The awe-inspiring journey of a rebel who made the common man fly for one rupee.', '<p><strong>Soorarai Pottru</strong> is the inspiring 5-time National Film Award-winning biographical drama directed by <a href=\"/person/sudha-kongara\">Sudha Kongara</a>, starring <a href=\"/person/suriya\">Suriya</a> in a tour-de-force performance alongside <a href=\"/person/aparna-balamurali\">Aparna Balamurali</a> and Paresh Rawal.</p><p>Inspired by the real life of Captain G. R. Gopinath (founder of Air Deccan), Nedumaaran Rajangam \"Maara\" (<a href=\"/person/suriya\">Suriya</a>) is a passionate former Indian Air Force captain haunted by the tragedy of being unable to afford a last-minute flight ticket to see his dying father. Determined that poverty should never stop any Indian from flying, Maara dreams of launching \"Deccan Air\", a low-cost passenger airline offering tickets for just one rupee. In his way stand monopolistic airline tycoons led by the arrogant Paresh Goswami (Paresh Rawal) and corrupt aviation bureaucrats who repeatedly sabotage his planes, safety clearances, and finances. Supported by his spirited bakery-entrepreneur wife Bommi (<a href=\"/person/aparna-balamurali\">Aparna Balamurali</a>), Maara fights against all odds to conquer the skies.</p>', '<h3>Swept 5 National Film Awards</h3>
<p><em>Soorarai Pottru</em> achieved historic critical acclaim, sweeping <strong>5 National Film Awards</strong> at the 68th National Film Awards:
<ul>
    <li><strong>Best Actor:</strong> <a href=\"/person/suriya\">Suriya</a> (shared for his deeply emotional, vulnerable portrayal of Maara).</li>
    <li><strong>Best Actress:</strong> <a href=\"/person/aparna-balamurali\">Aparna Balamurali</a> (for her fierce, fiercely supportive role as Bommi).</li>
    <li><strong>Best Feature Film:</strong> Produced by 2D Entertainment.</li>
    <li><strong>Best Screenplay:</strong> Sudha Kongara and Shalini Ushadevi.</li>
    <li><strong>Best Music Direction (Background Score):</strong> G. V. Prakash Kumar.</li>
</ul>
</p>

<h3>A Universal Emotional Triumph</h3>
<p>The film\'s raw emotional depth resonates deeply with every working-class family that has dared to dream big. The airport runway climax, where hundreds of ordinary villagers board their maiden flight wearing simple slippers and traditional attire with tears of pride, stands as one of the most emotional moments in Indian cinema.</p>

<h3>Global Streaming Sensation</h3>
<p>Premiering globally on Amazon Prime Video due to pandemic theater closures, <em>Soorarai Pottru</em> was viewed in over 180 countries, entering the Oscars 2021 eligibility race and ranking among the highest user-rated films on IMDb worldwide. Explore more biographical triumphs in our <a href=\"/genres/drama\">Drama movies library</a>.</p>', '2020-11-12', 153, 'U/A 13+', 9.3, 450000000, 1800000000, 'Tamil', 'India', 'released', 1, 1, 1, NOW(), NOW())
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
SELECT 2, id FROM `titles` WHERE `slug` = 'soorarai-pottru-2020';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'soorarai-pottru-2020' AND p.slug = 'sudha-kongara'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Nedumaaran \"Maara\" Rajangam', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'soorarai-pottru-2020' AND p.slug = 'suriya'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Sundari \"Bommi\" Nedumaaran', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'soorarai-pottru-2020' AND p.slug = 'aparna-balamurali'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Jai Bhim (jai-bhim-2021)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Jai Bhim', 'jai-bhim-2021', 'movie', 'titles/posters/jai-bhim-2021.jpg', 'Injustice anywhere is a threat to justice everywhere. A legal battle for dignity and human rights.', '<p><strong>Jai Bhim</strong> is the hard-hitting, critically acclaimed courtroom legal drama written and directed by <a href=\"/person/t-j-gnanavel\">T. J. Gnanavel</a>, starring <a href=\"/person/suriya\">Suriya</a> as the righteous human rights advocate K. Chandru alongside Lijomol Jose and Manikandan.</p><p>Based on a harrowing true 1993 legal battle in Tamil Nadu, the story follows Rajakannu and his pregnant wife Sengeni (Lijomol Jose), members of the marginalized Irula tribal community who survive by catching venomous snakes and rats. When a theft occurs in a village headman\'s home, corrupt police frame Rajakannu and subject him and his relatives to horrific custodial torture, leading to his secret death in detention while falsely claiming he escaped. Desperate for answers, Sengeni approaches fearless human rights lawyer Advocate K. Chandru (<a href=\"/person/suriya\">Suriya</a>), who files a constitutional Habeas Corpus petition in the Madras High Court, waging an unyielding legal war against state brutality to uncover the truth.</p>', '<h3>Constitutional Justice & Human Dignity</h3>
<p><em>Jai Bhim</em> is a monumental piece of cinema grounded in the egalitarian philosophy of Dr. B. R. Ambedkar. Director T. J. Gnanavel avoids melodramatic courtroom theatrics to present meticulous procedural realism, showcasing how the Indian Constitution\'s fundamental rights can be used to hold oppressive state machinery accountable.</p>
<p>Lijomol Jose delivered a heart-wrenching, authentic performance as Sengeni that earned international praise. Suriya\'s decision to play Advocate Chandru—a disciplined, unheroic lawyer who lets the oppressed community\'s voice take center stage rather than performing superhero fight sequences—demonstrated exemplary artistic courage.</p>

<h3>International Acclaim & Oscar Recognition</h3>
<p>Upon its digital release, <em>Jai Bhim</em> briefly surpassed <em>The Shawshank Redemption</em> and <em>The Godfather</em> to become the highest user-rated film on IMDb with a 9.6 rating. A scene from the film was featured on the official Oscars YouTube channel under the \"Scene at the Academy\" showcase. Explore more legal dramas in our <a href=\"/genres/drama\">Drama portal</a> and <a href=\"/genres/crime\">Crime collection</a>.</p>', '2021-11-02', 164, 'A', 9.4, 400000000, 1600000000, 'Tamil', 'India', 'released', 1, 0, 1, NOW(), NOW())
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
SELECT 2, id FROM `titles` WHERE `slug` = 'jai-bhim-2021';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 4, id FROM `titles` WHERE `slug` = 'jai-bhim-2021';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 10, id FROM `titles` WHERE `slug` = 'jai-bhim-2021';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'jai-bhim-2021' AND p.slug = 't-j-gnanavel'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'jai-bhim-2021' AND p.slug = 'sudha-kongara'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Advocate K. Chandru', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'jai-bhim-2021' AND p.slug = 'suriya'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: Singam (singam-2010)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('Singam', 'singam-2010', 'movie', 'titles/posters/singam-2010.jpg', 'When he roars, crime trembles. The iconic police blockbuster that set the blueprint for Indian cop cinema.', '<p><strong>Singam</strong> is the roaring cop action blockbuster directed by <a href=\"/person/hari\">Hari</a>, featuring <a href=\"/person/suriya\">Suriya</a> in his immortal avatar as the ferocious police officer Duraisingam, alongside <a href=\"/person/anushka-shetty\">Anushka Shetty</a> and Prakash Raj.</p><p>Duraisingam (<a href=\"/person/suriya\">Suriya</a>) is an honest, respected Sub-Inspector of Police serving peacefully in his coastal native village of Nallur. He resolves village disputes with compassion and falls in love with Kavya (<a href=\"/person/anushka-shetty\">Anushka Shetty</a>). However, when Chennai-based ruthless extortionist and kidnapping kingpin Mayil Vaaganam (Prakash Raj) is mandated by court to sign daily conditional bail in Nallur, he insults Duraisingam\'s police honor. Mayil Vaaganam uses his political influence to transfer Singam to the bustling harbor city of Chennai to humiliate him. Instead of backing down, Duraisingam roars like a lion, mobilizing honest officers to demolish Mayil Vaaganam\'s mafia syndicate.</p>', '<h3>The Blueprint of Modern Indian Police Cinema</h3>
<p><em>Singam</em> revolutionized the police action genre in Indian cinema with its lightning-fast pacing, electrifying editing, and iconic dialogues. Suriya\'s thunderous delivery of the signature punchline <em>\"Ongi adicha 1.5 ton weight-u da, paakuriya?\"</em> (If I hit with full force, it\'s 1.5 tonnes of weight, want to see?) became a pop-culture sensation.</p>
<p>The film\'s massive success spawned an official Tamil franchise (<em>Singam II</em> and <em>Si3</em>) and was officially remade into Hindi by Rohit Shetty as the smash hit <em>Singham</em> starring Ajay Devgn, which launched the famous Bollywood Cop Universe.</p>

<h3>Box Office Blockbuster</h3>
<p>Produced by Studio Green on a budget of ₹15 crore, <em>Singam</em> collected <strong>₹100 crore worldwide</strong>, running for over 100 days across theaters in Tamil Nadu and overseas. Check out related adrenaline-filled films in our <a href=\"/genres/action\">Action movies guide</a>.</p>', '2010-05-28', 160, 'U/A 13+', 8.8, 150000000, 1000000000, 'Tamil', 'India', 'released', 0, 0, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = 'singam-2010';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 2, id FROM `titles` WHERE `slug` = 'singam-2010';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 4, id FROM `titles` WHERE `slug` = 'singam-2010';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'singam-2010' AND p.slug = 'hari'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Inspector Duraisingam', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'singam-2010' AND p.slug = 'suriya'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Kavya Mahalingam', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = 'singam-2010' AND p.slug = 'anushka-shetty'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

-- Movie: 24 (24-2016)
INSERT INTO `titles` (`title`, `slug`, `type`, `poster_path`, `tagline`, `overview`, `description`, `release_date`, `runtime_minutes`, `content_rating`, `rating`, `budget`, `box_office`, `original_language`, `origin_country`, `status`, `is_featured`, `is_trending`, `is_active`, `created_at`, `updated_at`)
VALUES ('24', '24-2016', 'movie', 'titles/posters/24-2016.jpg', 'A watch that controls time. Three faces of destiny spanning three generations.', '<p><strong>24</strong> is a breathtaking Indian science-fiction time travel thriller written and directed by <a href=\"/person/vikram-kumar\">Vikram Kumar</a>, featuring <a href=\"/person/suriya\">Suriya</a> in an extraordinary triple role alongside <a href=\"/person/samantha-ruth-prabhu\">Samantha Ruth Prabhu</a> and Nithya Menen, with an Oscar-winning musical score by A. R. Rahman.</p><p>Genius inventor Dr. Sethuraman (<a href=\"/person/suriya\">Suriya</a>) invents \"Project 24\", a wrist-watch mechanism capable of rewinding, pausing, and fast-forwarding time up to 24 hours. His evil twin brother Athreya (<a href=\"/person/suriya\">Suriya</a>) attacks the laboratory to steal the watch, murdering Sethuraman and his wife Priya (Nithya Menen). However, Sethuraman manages to save his infant son Mani and hides the time-watch in a locked chest. Twenty-six years later, Mani (<a href=\"/person/suriya\">Suriya</a>), now a charming watchmaker in Chennai, unlocks the mysterious watch and discovers its magical time-manipulating powers, unaware that a paralyzed, vengeful Athreya has awakened from a coma and is hunting him to reclaim his lost youth.</p>', '<h3>Suriya\'s Dazzling Tour-de-Force Triple Role</h3>
<p>Suriya delivered one of the most versatile acting demonstrations in Indian cinema history by playing three completely distinct characters:
<ul>
    <li><strong>Dr. Sethuraman:</strong> A gentle, bespectacled scientist devoted to his family and ethical science.</li>
    <li><strong>Mani:</strong> A vivacious, romantic young watchmaker who discovers time travel and uses it for sweet romance with Sathya (<a href=\"/person/samantha-ruth-prabhu\">Samantha Ruth Prabhu</a>).</li>
    <li><strong>Athreya:</strong> A cold, wheelchair-bound sociopathic mastermind whose chilling laugh, piercing gaze, and ruthless intelligence created one of the greatest villains of modern Indian cinema.</li>
</ul>
</p>

<h3>2 National Film Awards & Rahman\'s Music</h3>
<p>The film was honored with <strong>2 National Film Awards</strong> for Best Cinematography (Tirru) and Best Production Design (Amit Ray and Subrata Chakraborty). A. R. Rahman\'s background score and songs—including <em>\"Mei Nigara\"</em> and <em>\"Naan Un\"</em>—provided futuristic soul to the intricate time-travel mechanics.</p>

<h3>Global Box Office Success</h3>
<p>Produced on a lavish budget of ₹70 crore, <em>24</em> grossed over <strong>₹100 crore worldwide</strong> and surpassed $1.5 million in the United States, hailed internationally as one of the most cohesive, imaginative time travel screenplays ever written. Explore more futuristic titles in our <a href=\"/genres/sci-fi\">Sci-Fi category</a> and <a href=\"/genres/thriller\">Thriller section</a>.</p>', '2016-05-06', 164, 'U/A 13+', 9, 700000000, 1000000000, 'Tamil', 'India', 'released', 1, 0, 1, NOW(), NOW())
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
SELECT 1, id FROM `titles` WHERE `slug` = '24-2016';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 3, id FROM `titles` WHERE `slug` = '24-2016';
INSERT IGNORE INTO `genre_title` (`genre_id`, `title_id`)
SELECT 5, id FROM `titles` WHERE `slug` = '24-2016';

INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Directing', 'Director', NULL, 0, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = '24-2016' AND p.slug = 'vikram-kumar'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Mani / Dr. Sethuraman / Athreya', 1, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = '24-2016' AND p.slug = 'suriya'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();
INSERT INTO `credits` (`creditable_type`, `creditable_id`, `person_id`, `department`, `job`, `character_name`, `billing_order`, `is_featured`, `created_at`, `updated_at`)
SELECT 'App\\Models\\Title', t.id, p.id, 'Acting', 'Actor', 'Sathya', 2, 1, NOW(), NOW()
FROM `titles` t, `people` p
WHERE t.slug = '24-2016' AND p.slug = 'samantha-ruth-prabhu'
ON DUPLICATE KEY UPDATE `job` = VALUES(`job`), `character_name` = VALUES(`character_name`), `billing_order` = VALUES(`billing_order`), `is_featured` = 1, `updated_at` = NOW();

SET FOREIGN_KEY_CHECKS = 1;
-- === SCRIPT COMPLETE ===
