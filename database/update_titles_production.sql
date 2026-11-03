-- ==============================================================================
-- PRODUCTION SQL UPDATE SCRIPT: Content Enrichment for 75 Titles (>1,500 chars)
-- Database: tonightonscreen (or production database)
-- Safe: Matches by unique `slug` (with fallback to `id`)
-- Generated on: 2026-11-02 05:34:06
-- ==============================================================================

START TRANSACTION;

-- -----------------------------------------------------------------------------
-- [1] Oppenheimer (2023) | Content Length: 2036 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Oppenheimer is an epic biographical drama directed by Christopher Nolan that explores the brilliant life, moral struggles, and devastating legacy of theoretical physicist J. Robert Oppenheimer, portrayed with haunting intensity by Cillian Murphy. The narrative follows Oppenheimer from his early days studying quantum physics in Europe to his appointment as the scientific director of the secretive Manhattan Project in Los Alamos, New Mexico, where world-class scientists raced against Nazi Germany to build the world\'s first atomic weapon.

The film revolves around pivotal characters who shape Oppenheimer\'s scientific journey and personal life. Major General Leslie Groves, played by Matt Damon, acts as the no-nonsense military leader who cuts through bureaucratic red tape to keep the atomic lab moving forward. Katherine \"Kitty\" Oppenheimer, played by Emily Blunt, stands by her husband as a fierce, razor-sharp biologist grappling with emotional isolation and family pressure. Jean Tatlock, portrayed by Florence Pugh, is a passionate psychiatrist whose romantic ties to Oppenheimer and Communist associations later fuel intense political scrutiny. Meanwhile, Lewis Strauss, played by Robert Downey Jr. in an Oscar-winning performance, emerges as Oppenheimer\'s vindictive political rival inside the Atomic Energy Commission, orchestrating a closed-door security hearing aimed at stripping the physicist of his national security clearance and credibility. Legendary physicist Albert Einstein, played by Tom Conti, offers quiet, foreboding wisdom about how the world eventually turns on its most celebrated visionaries once their creations become dangerous.

Written in thoughtful, clear prose, this powerful historical narrative captures the thrilling countdown to the Trinity test, the devastating bombings of Hiroshima and Nagasaki, and the profound guilt that plagued Oppenheimer as he foresaw an uncontrolled nuclear arms race. It stands as a timeless warning about human ingenuity, political betrayal, and moral consequence.',
    `updated_at` = NOW()
WHERE `slug` = 'oppenheimer-2023' OR `id` = 1;

-- -----------------------------------------------------------------------------
-- [3] The Last Horizon (2025) | Content Length: 1889 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'The Last Horizon is an exhilarating cinematic adventure that takes audiences across the vast, unforgiving desert frontier in search of humanity\'s forgotten origins. Set in a near future where water has become the planet\'s rarest currency, the story centers on Nathan Drake, played with weathered grit and quiet optimism by Tom Hanks. Nathan is a veteran cartographer and desert explorer who has spent his life tracing ancient satellite anomalies to locate the legendary lost city of Irem, a mythical settlement rumored to hold a clean geothermal water reservoir capable of reviving desolate lands.

Nathan is joined on his perilous expedition by Elena Vance, played with fierce intellect, scientific determination, and physical bravery by Emma Watson. As an environmental archaeologist, Elena believes the lost civilization was brought down by climate catastrophe rather than warfare, searching for cultural records that can teach modern survivors how to restore dying ecosystems. Along their journey through scorching dunes and razor-sharp sandstorms, the pair is guided by Silas, played with enigmatic charm and questionable loyalties by Cillian Murphy, a desert nomad and former military engineer who knows the shifting terrain better than anyone. Complicating their mission is Maya, portrayed by Florence Pugh, the ruthless leader of a motorized scavenger syndicate determined to plunder the ancient sanctuary for weapons technology. Through pulse-pounding vehicle chases across salt flats, underground labyrinth explorations, and breathtaking visual landscapes, the travelers learn that true survival depends on cooperation and environmental respect rather than brute force.

With stunning practical cinematography, realistic survival dynamics, and an emotionally uplifting message about conservation, The Last Horizon delivers a sweeping cinematic journey of courage and rediscovery.',
    `updated_at` = NOW()
WHERE `slug` = 'the-last-horizon-2025' OR `id` = 3;

-- -----------------------------------------------------------------------------
-- [4] Shadow Protocol (2025) | Content Length: 1769 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Shadow Protocol is a high-octane, neon-drenched cyber-espionage thriller series that pulls back the curtain on the invisible digital wars shaping global geopolitics. Set in a near-future metropolis shrouded in perpetual rain and dense coastal fog, the narrative follows Agent Sarah Drake, portrayed with lethal martial prowess, tech intelligence, and moral conflict by Emma Watson. Sarah is an elite covert operative working for a clandestine international security division tasked with hunting down rogue hackers and black-market digital syndicates.

When a series of coordinated cyber-attacks disables satellite communications and financial infrastructure across three continents, Sarah uncovers the emergence of \"Shadow Protocol\"—a self-learning quantum artificial intelligence weapon designed to manipulate global stock markets and trigger military conflicts. To neutralize the threat, Sarah teams up with Marcus Vance, played with world-weary cynicism and sharp intellect by Tom Hanks, a legendary former cryptographer living in off-grid isolation after exposing government surveillance programs decades earlier. Together, Sarah and Marcus navigate a treacherous underworld of dark-web brokerages, luxury corporate penthouses, and underground data vaults, pursued by shadowy hitmen dispatched by powerful defense contractors who profit from global instability. As personal secrets from Sarah\'s past are weaponized by the AI, she must decide whether destroying the digital weapon is worth sacrificing the only people who know her true identity.

Filled with heart-stopping hand-to-hand combat, intelligent tactical espionage, and pulse-pounding electronic beats, Shadow Protocol offers a terrifyingly realistic look at modern cyber-warfare and digital surveillance.',
    `updated_at` = NOW()
WHERE `slug` = 'shadow-protocol-2025' OR `id` = 4;

-- -----------------------------------------------------------------------------
-- [5] Broken Dreams (2024) | Content Length: 1931 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Broken Dreams is a poignant, beautifully staged romantic drama that explores the bittersweet reunion of two gifted artists at the twilight of their creative careers, reflecting on lost love, artistic compromise, and the healing power of forgiveness. Set against the sun-drenched vineyards, golden olive groves, and rustic stone cottages of rural Provence, France, the film follows Julien Rossi, portrayed with tender vulnerability and quiet sorrow by Tom Hanks. Julien is a celebrated landscape painter who has spent the last decade in creative seclusion following personal illness and the commercialization of his work.

Julien\'s quiet world is gently disrupted by the arrival of Clara Miller, played with luminous grace, emotional complexity, and artistic passion by Emma Watson. Clara is an acclaimed sculptor and Julien\'s former apprentice and passionate lover from their youth in Paris, whom Julien abandoned decades earlier out of fear of domestic commitment. Having received a joint retrospective exhibition invitation from a prestigious Parisian gallery, Clara proposes that they spend one final summer together collaborating on a joint multi-medium masterpiece that bridges painting and sculpture. As the two artists work side by side in an open-air stone barn, old creative sparks and buried emotional resentments reignite. Their artistic process is observed by Sophie Laurent, played with gentle warmth by Florence Pugh, Julien\'s devoted local caretaker who encourages him to open his heart before time runs out. Through intimate conversations over home-cooked meals, quiet strolls through lavender fields, and emotionally raw studio sessions, Julien and Clara confront the painful sacrifices demanded by artistic ambition.

With naturalistic lighting, delicate classical piano compositions, and deeply moving performances, Broken Dreams is an inspiring testament to the enduring power of second chances in art and love.',
    `updated_at` = NOW()
WHERE `slug` = 'broken-dreams-2024' OR `id` = 5;

-- -----------------------------------------------------------------------------
-- [6] The Silent Path (2025) | Content Length: 1753 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'The Silent Path is a gripping, atmospheric mystery television drama that explores the dark generational secrets, hidden crimes, and unspoken grief lingering beneath the surface of a quiet mountain community. Set in the dense, pine-covered wilderness of the Pacific Northwest, the story begins when a series of unexplained disappearances along an ancient, secluded hiking trail sends shockwaves through the small logging town of Blackwood.

The investigation is spearheaded by Detective Laura Hayes, portrayed with dogged determination, intuitive brilliance, and emotional grit by Emma Watson. Having recently returned to her hometown to escape personal trauma in Chicago, Laura finds herself clashing with the town\'s weary veteran sheriff, Thomas Miller, played with stoic authority and protective caution by Tom Hanks. Thomas is reluctant to acknowledge that the trail holds sinister dangers, fearing the collapse of the town\'s fragile eco-tourism economy. As Laura hikes deep into the misty ravines and abandoned logging camps, she uncovers disturbing evidence suggesting that the recent vanishings are connected to a thirty-year-old cold case involving her own family. She forms a cautious alliance with Evelyn Cross, played with eccentric insight by Florence Pugh, a local botanist who lives on the edge of the forest and understands the mountain\'s forgotten folklore and clandestine trails. Together, they confront a web of powerful town elders, corrupt land developers, and hidden family bloodlines determined to keep the truth buried at any cost.

Brimming with scenic drone cinematography, tense investigative procedurals, and rich character drama, The Silent Path is a captivating mystery that keeps viewers guessing until the final revelation.',
    `updated_at` = NOW()
WHERE `slug` = 'the-silent-path-2025' OR `id` = 6;

-- -----------------------------------------------------------------------------
-- [7] Beyond the Sky (2024) | Content Length: 1824 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Beyond the Sky is an awe-inspiring, intellectually profound science fiction adventure that explores human resilience, the vast mysteries of deep space, and the psychological boundaries of perception. Set in the late twenty-first century, the narrative follows the maiden voyage of the exploratory starship Odyssey, sent on a historic mission to investigate an anomalous electromagnetic distortion detected near the rings of Saturn that defies the known laws of astrophysics.

Leading the diverse international mission is Commander Mark Reynolds, played with stoic leadership and deep empathy by Tom Hanks. Mark is a decorated astronaut carrying the private grief of leaving his terminally ill wife behind on Earth, viewing this voyage as his final contribution to human knowledge. Working beside him is Dr. Lisa Chen, portrayed with sharp scientific curiosity and courageous resolve by Emma Watson, an astrophysicist who discovers that the spatial rift is actually an artificial wormhole acting as an ancient cosmic repository of memory. As the spacecraft draws closer to the event horizon, the crew—supported by security specialist Major Jack Carter (Cillian Murphy) and ship engineer Elena (Florence Pugh)—begins experiencing vivid shared hallucinations where past memories, alternate life choices, and future premonitions blend into physical reality. Aboard the ship, the crew must rely on their emotional trust in one another and the objective calculations of AURA, the ship\'s intelligent navigational core, to navigate the anomaly and find their way home without losing their sanity.

Featuring scientifically accurate orbital mechanics, breathtaking zero-gravity visual sequences, and a deeply emotional human core, Beyond the Sky is a modern sci-fi journey celebrating humanity\'s eternal drive to explore the unknown.',
    `updated_at` = NOW()
WHERE `slug` = 'beyond-the-sky-2024' OR `id` = 7;

-- -----------------------------------------------------------------------------
-- [8] The Gilded Crown (2023) | Content Length: 1693 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'The Gilded Crown is a lavish, high-stakes historical television drama that chronicles the cutthroat palace politics, dynastic intrigue, and societal upheavals of nineteenth-century European royalty. Set in an opulent empire on the brink of industrial revolution and democratic rebellion, the series delves into the gilded halls of the Winter Palace, where wealth, privilege, and absolute power mask poisonous rivalries and personal heartbreak.

At the center of this volatile kingdom is Princess Beatrice, portrayed with fiery intelligence, progressive vision, and regal elegance by Emma Watson. As the eldest daughter of the reigning monarch, Beatrice refuses to be treated as a political pawn in arranged marriages, secretly funding working-class education initiatives and advocating for parliamentary reforms. Her greatest ally and ideological opponent is her father, King Henry VII, played with commanding majesty, private weariness, and tactical cunning by Tom Hanks. Burdened by declining health and mounting national debt, King Henry must protect the dynasty from foreign military invasions while managing the predatory ambitions of Lord Chancellor Malakor, played with icy aristocratic malice by Cillian Murphy. When an assassination attempt throws the court into chaos, Beatrice is forced to step into the political arena, navigating dangerous court whispers, duels of honor, and underground revolutionary factions led by romantic idealist Julian (Florence Pugh) to prevent civil war.

With breathtaking period costuming, authentic castle locations, and razor-sharp political dialogue, The Gilded Crown is an enthralling historical epic exploring the heavy price of wearing the crown.',
    `updated_at` = NOW()
WHERE `slug` = 'the-gilded-crown-2023' OR `id` = 8;

-- -----------------------------------------------------------------------------
-- [9] Midnight Symphony (2023) | Content Length: 1891 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Midnight Symphony is an enchanting, deeply romantic musical drama that celebrates the transcendent power of music to bridge social divides, heal emotional wounds, and inspire artistic greatness. Set in the majestic concert halls, cobblestone alleys, and historic coffeehouses of Vienna during the golden age of classical romanticism, the story follows two virtuoso musicians from rival conservatories whose chance meeting under the midnight arches of St. Stephen\'s Cathedral sparks an unforgettable creative partnership.

Jonathan Vance, portrayed with soulful warmth, weathered nobility, and passionate artistry by Tom Hanks, is a celebrated master composer who has fallen into a severe creative drought following the tragic loss of his hearing and the commercialization of the imperial orchestra. His stagnant world is illuminated when he hears the raw, revolutionary piano playing of Clara Schumann, played with luminous grace, rebellious spirit, and jaw-dropping musical precision by Emma Watson. Clara is an impoverished prodigy who defies conservative academy traditions by incorporating lively eastern folk melodies into classical sonatas. Recognizing her untamed genius, Jonathan invites Clara to collaborate with him on his final magnum opus, a sweeping orchestral symphony commissioned for the Emperor\'s grand jubilee. As they compose through the night, their initial intellectual debates over musical structure blossom into a tender, passionate romance that scandalizes the conservative Viennese aristocracy. Together, they confront pompous academy directors, financial ruin, and societal snobbery to premiere a musical masterpiece that forever alters the classical world.

Featuring sublime original orchestral compositions, breathtaking Viennese architecture, and tender romantic chemistry, Midnight Symphony is an emotional tribute to the universal language of melody and love.',
    `updated_at` = NOW()
WHERE `slug` = 'midnight-symphony-2023' OR `id` = 9;

-- -----------------------------------------------------------------------------
-- [10] Neon Nights (2024) | Content Length: 1713 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Neon Nights is a high-octane, stylish neo-noir crime action thriller that takes audiences on a breathless, adrenaline-fueled ride through the rain-slicked expressways, underground nightclubs, and shadowy corporate towers of modern Chicago. The story follows Jax Thorne, a master getaway driver and precision thief who has spent years perfecting the art of untraceable urban heists. Jax is offered an astronomical payday to execute one final, impossible job: infiltrating a high-security vault beneath a downtown skyscraper to retrieve an encrypted ledger that holds the secret banking records of the city\'s most ruthless crime syndicate.

Hot on his trail is Detective Miller, portrayed with grizzled determination, sharp investigative instincts, and world-weary cynicism by Tom Hanks. Miller is a veteran robbery detective on the brink of forced retirement who has studied Jax\'s driving patterns for years, viewing this high-stakes game of cat-and-mouse as his last opportunity to bring real justice to a corrupt city. Aiding Jax is Raven, played with razor-sharp charisma, tactical combat skills, and mysterious motives by Emma Watson, a skilled tech specialist and luxury nightclub owner who knows the city\'s surveillance blind spots better than anyone. As the heist unfolds on a stormy Friday night, Jax and Raven realize they have been double-crossed by a corrupt police commissioner, forcing them into an explosive, high-speed chase across multi-level freeways and industrial bridges with both the mob and police squads closing in.

Boasting pulse-pounding practical car chases, sleek neon cinematography, and a killer synthwave soundtrack, Neon Nights delivers non-stop thrills and razor-sharp crime drama.',
    `updated_at` = NOW()
WHERE `slug` = 'neon-nights-2024' OR `id` = 10;

-- -----------------------------------------------------------------------------
-- [11] Echoes of Silence (2024) | Content Length: 1772 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Echoes of Silence is a chilling, atmospheric psychological horror thriller that explores the terrifying boundary between acute human grief, audio parapsychology, and malevolent supernatural forces. The story centers on Samuel Vance, an obsessive audio engineer and sound designer who retreats to a remote, snowbound cabin in the Blackwood Forest following the tragic, unexplained drowning of his eight-year-old daughter. Desperate to find closure, Samuel sets up an elaborate recording studio equipped with sensitive parabolic microphones and vintage reel-to-reel magnetic tape recorders to capture ambient natural sounds for a meditation album.

Late one freezing night, Samuel begins capturing inexplicable auditory anomalies on his audio tapes—faint whispers, anomalous electromagnetic frequencies, and rhythmic tapping sounds that gradually assemble into coherent messages foretelling deadly events before they happen. Convinced that the recordings are communications from his daughter, Samuel descends into obsessive sleep deprivation and paranoia, ignoring the desperate warnings of Dr. Hannah Reed, a parapsychologist who warns him that the forest was the site of an ancient occult sanctuary and that the voices are predatory entities mimicking his child to gain physical entry into our world. As shadows begin detaching from walls, clocks run backwards, and violent physical manifestations trap Samuel inside the cabin during a blinding blizzard, he must confront his own suppressed guilt before the malevolent force claims his soul.

With masterful sound design that uses binaural audio frequencies to create genuine psychological dread without cheap jumpscares, Echoes of Silence is a haunting, sophisticated horror film that lingers long after the credits roll.',
    `updated_at` = NOW()
WHERE `slug` = 'echoes-of-silence-2024' OR `id` = 11;

-- -----------------------------------------------------------------------------
-- [12] Cosmic Comedy (2025) | Content Length: 1834 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Cosmic Comedy is an uproarious, visually dazzling sci-fi family adventure comedy that proves family dysfunctions, awkward road trips, and petty arguments are just as hilarious in zero gravity as they are on Earth. The story takes off in the near future, where commercial space tourism has become as routine as a weekend family vacation. The Hanson family books what was supposed to be a relaxing three-day sub-orbital cruise to a luxury lunar resort aboard the experimental passenger liner Star Hopper.

Chaos erupts when family patriarch Captain Bob Hanson, played with bumbling enthusiasm, physical comedy, and good-natured warmth by Tom Hanks, accidentally pushes the emergency override sequence during a tour of the bridge, engaging the ship\'s experimental hyperspace engine and launching the vessel millions of miles off course into deep planetary space. Forced to assume command of a spaceship he has no idea how to fly, Bob must rely on his razor-sharp, exasperated scientist daughter, Dr. Chloe Adams, played with brilliant deadpan comedic timing and intellectual authority by Emma Watson. Chloe tries to calculate orbital trajectories while managing her chaotic family members: a hyperactive teenage brother obsessed with alien social media streaming, an eccentric grandmother who insists on knitting space suits, and a robotic ship butler whose programming glitches into existential depression. Along their hilarious voyage, the family accidentally rescues a friendly alien creature, navigates an asteroid obstacle course using vacuum cleaners, and outsmarts an uptight galactic traffic patrol officer to find their way back home.

Brimming with clever sci-fi parodies, heartwarming family reconciliation, and vibrant visual effects, Cosmic Comedy is a joyful, laugh-out-loud cinematic ride for audiences of all generations.',
    `updated_at` = NOW()
WHERE `slug` = 'cosmic-comedy-2025' OR `id` = 12;

-- -----------------------------------------------------------------------------
-- [13] The Dark Knight (2008) | Content Length: 1978 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'The Dark Knight is a legendary superhero crime thriller directed by Christopher Nolan that forever changed modern cinematic storytelling. Set in a decaying Gotham City plagued by organized crime and institutional corruption, the story follows billionaire vigilante Bruce Wayne, played by Christian Bale, who dons the cape and cowl of Batman to protect innocent citizens while questioning how far a hero can bend the law without breaking his own moral code.

The core conflict of the film is driven by an incredible ensemble of deeply developed characters. Bruce Wayne teams up with the idealistic new District Attorney Harvey Dent, played by Aaron Eckhart, Gotham\'s \"White Knight\" whose relentless courtroom crusades give citizens hope for a peaceful future without masked vigilantes. Supporting them is Lieutenant James Gordon, played by Gary Oldman, an honest police officer who navigates treacherous department corruption with quiet courage. Rachel Dawes, played by Maggie Gyllenhaal, serves as Bruce\'s lifelong friend and moral compass, torn between her affection for Bruce and her shared vision of justice with Harvey. However, Gotham\'s fragile hope is violently shattered by the Joker, portrayed by Heath Ledger in an unforgettable, Oscar-winning tour de force. As an anarchic terrorist wearing clown makeup, the Joker seeks no money or territory; instead, he exists purely to expose the dark hypocrisy of civilized society, pushing Batman, Harvey Dent, and ordinary citizens into psychological agony. Loyal butler Alfred Pennyworth, played by Michael Caine, and technology wizard Lucius Fox, played by Morgan Freeman, provide Bruce with unwavering wisdom and tactical ground support as the city descends into chaos.

Through pulse-pounding action sequences, grounded practical stunts, and profound philosophical dilemmas, The Dark Knight remains the gold standard of dramatic crime cinema, exploring the heavy sacrifice required to preserve justice in an imperfect world.',
    `updated_at` = NOW()
WHERE `slug` = 'the-dark-knight-2008' OR `id` = 13;

-- -----------------------------------------------------------------------------
-- [14] Interstellar (2014) | Content Length: 2075 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Interstellar is a breathtaking, emotionally resonant science fiction masterpiece directed by Christopher Nolan that examines human survival, cosmic exploration, and the unbreakable bond between a father and his children. Set in a near future where blight, dust storms, and crop failures threaten human civilization with extinction, the story focuses on Joseph Cooper, played by Matthew McConaughey, a former NASA test pilot turned reluctant corn farmer who is chosen to lead a daring interstellar voyage through a mysterious wormhole near Saturn in search of a habitable new planet.

The heart of the journey lies in the profound relationships Cooper shares with those he leaves behind and those who travel with him into the dark unknown. Cooper\'s brilliant, fiercely loving daughter Murphy \"Murph\" Cooper, portrayed as a young girl by Mackenzie Foy and later as an adult physicist by Jessica Chastain, dedicates her entire life on a dying Earth to solving a grand gravitational equation that can lift humanity into the stars, all while grappling with the agonizing feeling that her father abandoned her. Aboard the spacecraft Endurance, Cooper is joined by Dr. Amelia Brand, played by Anne Hathaway, a determined biologist guided by scientific intellect and profound faith in the enduring power of love. Her father, Professor John Brand, played by Michael Caine, directs the global mission from Earth while secretly guarding a devastating truth about humanity\'s chances of survival. The crew is aided by TARS, an intelligent, box-shaped military robot voiced with warm wit and humor by Bill Irwin. On their desperate journey across alien worlds, they encounter Dr. Mann, played by Matt Damon, a revered scientist whose cowardly betrayal proves that human survival instincts can be as lethal as any cosmic hazard.

Propelled by Hans Zimmer\'s iconic organ-heavy score and scientifically grounded depictions of black holes and time dilation, Interstellar delivers an unforgettable cinematic experience celebrating courage, sacrifice, and the enduring reach of the human spirit.',
    `updated_at` = NOW()
WHERE `slug` = 'interstellar-2014' OR `id` = 14;

-- -----------------------------------------------------------------------------
-- [15] Memento (2001) | Content Length: 1947 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Memento is an ingenious, groundbreaking psychological neo-noir thriller written and directed by Christopher Nolan that pioneered non-linear cinematic storytelling. The story follows Leonard Shelby, portrayed with raw vulnerability and desperate focus by Guy Pearce, a former insurance claims investigator who suffers from anterograde amnesia—a condition that leaves him completely unable to create new short-term memories following a brutal home invasion in which his beloved wife was murdered.

Determined to avenge his wife\'s death despite his debilitating memory condition, Leonard constructs an elaborate personal system of Polaroid photographs, handwritten notes, and permanent tattoos etched across his skin to keep track of critical clues and suspect descriptions. As he navigates a bleak underworld of California motels, industrial alleys, and desolate diners, Leonard crosses paths with two deeply untrustworthy figures who manipulate his vulnerability for their own agendas. Natalie, played by Carrie-Anne Moss, is a weary, sharp-minded bartender who appears sympathetic to Leonard\'s plight while secretly using his lethal investigative skills to eliminate her own enemies in the local drug scene. Teddy, played by Joe Pantoliano in a masterclass of nervous, fast-talking deception, poses as Leonard\'s cheerful friend and handler, though his conflicting instructions and suspicious motives keep the viewer constantly guessing about his true identity. Through flashbacks, Leonard recounts the cautionary tale of Sammy Jankis, played by Stephen Tobolowsky, a former amnesiac client whose tragic fate serves as a mirror for Leonard\'s own emotional denial.

Unfolding in two alternating timelines—one moving forward in black-and-white and the other backwards in color—Memento challenges our fundamental trust in memory, identity, and personal truth, culminating in a shocking revelation that cements its status as a timeless cinema landmark.',
    `updated_at` = NOW()
WHERE `slug` = 'memento-2000' OR `id` = 15;

-- -----------------------------------------------------------------------------
-- [16] Inception (2010) | Content Length: 2198 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Inception is an exhilarating, mind-bending sci-fi heist thriller directed by Christopher Nolan that takes audiences into the clandestine architecture of human dreams. The narrative centers on Dom Cobb, played by Leonardo DiCaprio, a world-class corporate thief who specializes in \"extraction\"—stealing valuable secrets from deep within the subconscious minds of high-profile targets while they sleep. Haunted by personal guilt and barred from returning home to his children in America, Cobb is offered an impossible deal by powerful Japanese energy tycoon Mr. Saito, played by Ken Watanabe: perform \"inception\"—the reverse act of planting an original idea inside someone\'s mind—in exchange for a clean legal slate.

To pull off this unprecedented mental heist, Cobb assembles an elite crew of specialists, each possessing unique skills and distinct personalities. Arthur, played with sharp professionalism by Joseph Gordon-Levitt, acts as the reliable point man who manages logistics, research, and zero-gravity tactical combat. Ariadne, played by Elliot Page, is a brilliant young architecture student recruited to design complex, multi-layered dream labyrinths; she quickly becomes the only crew member who understands the dark psychological trauma eating away at Cobb\'s sanity. Eames, played with charismatic swagger by Tom Hardy, serves as the master forger capable of shifting identities within dreams to manipulate target emotions. Yusuf, played by Dileep Rao, is the gifted chemist who concocts powerful sedatives necessary to stabilize three deeper dream tiers simultaneously. Their target is Robert Fischer, played by Cillian Murphy, a vulnerable corporate heir whose unresolved emotional issues with his dying father make him receptive to the inception. Complicating the entire mission is Mal, played with chilling beauty by Marion Cotillard, the phantom projection of Cobb\'s late wife whose disruptive appearances threaten to trap the entire team in subconscious limbo forever.

Combining practical physics-defying stunts, emotional depth, and Hans Zimmer\'s pulsating musical themes, Inception remains one of the most inventive and beloved cinematic triumphs of the twenty-first century.',
    `updated_at` = NOW()
WHERE `slug` = 'inception-2010' OR `id` = 16;

-- -----------------------------------------------------------------------------
-- [17] The Wolf of Wall Street (2013) | Content Length: 2121 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'The Wolf of Wall Street is a blisteringly funny, wildly kinetic biographical black comedy directed by Martin Scorsese that chronicles the outrageous rise and thunderous fall of Long Island stockbroker Jordan Belfort. Portrayed with relentless physical energy, manic charm, and moral recklessness by Leonardo DiCaprio, Belfort transforms from an ambitious, innocent young newcomer on Wall Street into the ruthless mastermind of Stratton Oakmont, a boiler-room brokerage firm that defrauded thousands of working-class investors out of hundreds of millions of dollars through aggressive penny stock pump-and-dump schemes.

The film\'s vibrant narrative is anchored by an unforgettable cast of eccentric, larger-than-life characters who dive headfirst into unprecedented decadence, drugs, and greed. Donnie Azoff, played by Jonah Hill in an Oscar-nominated performance, is Jordan\'s hyperactive, bleach-toothed business partner who quit his furniture sales job on the spot to join Jordan\'s empire, fueling their office culture with quaaludes, cash tossing, and wild workplace antics. Naomi Lapaglia, portrayed with fiery charisma by Margot Robbie in her breakout Hollywood performance, becomes Jordan\'s glamorous second wife \"the Duchess of Bay Ridge,\" whose luxurious lifestyle gradually turns into a bitter, high-stakes battleground as Jordan\'s out-of-control drug addiction and paranoia escalate. Mark Hanna, played by Matthew McConaughey in an iconic early cameo, introduces Jordan to the cynical philosophy of Wall Street over a boozy lunch, teaching him that the stock market is a game designed solely to keep the broker rich while clients take all the risk. Standing on the side of justice is FBI Special Agent Patrick Denham, played with cool, unshakeable integrity by Kyle Chandler, who patiently tracks Stratton Oakmont\'s financial paper trail, culminating in an exhilarating cat-and-mouse game aboard Belfort\'s luxury yacht.

Delivered with breakneck pacing, razor-sharp dialogue, and unapologetic satire, The Wolf of Wall Street offers a mesmerizing critique of unchecked American consumerism, ambition, and excess.',
    `updated_at` = NOW()
WHERE `slug` = 'the-wolf-of-wall-street-2013' OR `id` = 17;

-- -----------------------------------------------------------------------------
-- [18] The Revenant (2015) | Content Length: 1970 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'The Revenant is a visceral, visually stunning frontier survival epic directed by Alejandro González Iñárritu that portrays the extraordinary endurance of the human body and spirit against untamed nature and human cruelty. Set in the freezing winter wilderness of the uncharted Dakota Territory during 1823, the story follows veteran scout Hugh Glass, played by Leonardo DiCaprio in an Oscar-winning performance of sheer physical commitment and minimal dialogue. While scouting ahead for an expedition of fur trappers, Glass suffers a catastrophic, bone-crushing mauling by a ferocious grizzly bear that leaves him on the brink of death.

The dramatic stakes of the film hinge on the bitter clash between Glass and the men tasked with tending to him in his final hours. John Fitzgerald, played with menacing, self-serving intensity by Tom Hardy, is a mercenary, bitter trapper who views the paralyzed Glass as an intolerable financial and physical liability in hostile native territory. Fitzgerald mercilessly murders Glass\'s half-Pawnee teenage son Hawk, played by Forrest Goodluck, in front of the helpless father, and deceives young, impressionable trapper Jim Bridger, played by Will Poulter, into burying Glass alive in a shallow grave. Fuelled by an unquenchable desire for vengeance and love for his murdered son, Glass miraculously claws his way out of the earth. He embarks on an agonizing 200-mile odyssey across snow-covered mountains, surviving hypothermia, raging rivers, and starvation by eating raw bison liver and sleeping inside an animal carcass. Meanwhile, Captain Andrew Henry, played with honor and quiet dignity by Domhnall Gleeson, leads the trapping company at Fort Kiowa and ensures that justice is ultimately served when Glass finally returns from the dead.

Shot entirely in natural lighting by cinematographer Emmanuel Lubezki, The Revenant is an unforgettable cinematic journey of raw resilience, grief, and the hollow pursuit of retribution.',
    `updated_at` = NOW()
WHERE `slug` = 'the-revenant-2015' OR `id` = 18;

-- -----------------------------------------------------------------------------
-- [19] Peaky Blinders (2013) | Content Length: 2099 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Peaky Blinders is a stylish, pulse-pounding historical television drama created by Steven Knight that delves deep into the gritty underworld of post-World War I Birmingham, England. The series follows the notorious criminal enterprise and explosive rise of the Shelby family, known on the streets as the Peaky Blinders due to the razor blades famously stitched into the peaks of their newsboy caps. At the center of the empire is Thomas Shelby, played with mesmerizing, ice-cold brilliance by Cillian Murphy, a decorated war hero whose traumatic combat memories from the trenches of France have stripped him of fear and filled him with relentless, calculated ambition.

The rich dramatic tension of the series is driven by the intricate family dynamics and deadly adversaries surrounding Tommy. Polly Gray, portrayed with commanding warmth and fierce intelligence by the late Helen McCrory, is the family\'s matriarch and treasurer who ran the business during the war and acts as Tommy\'s sharpest moral conscience. Arthur Shelby, played with volatile fury and tragic vulnerability by Paul Anderson, is the eldest brother whose violent outbursts and heavy drinking mask deep emotional scars from the battlefield. John Shelby, played by Joe Cole, serves as the loyal, hot-tempered foot soldier always ready for street warfare. Ada Thorne, played by Sophie Rundle, is the strong-willed Shelby sister who rebels against her brothers\' criminal violence in pursuit of political activism. Their expanding illegal gambling racket draws the ruthless attention of Chief Inspector Chester Campbell, played by Sam Neill, an uncompromising lawman sent by Winston Churchill to purge the city of gangs and recover a cache of stolen military munitions. Adding romance and danger is Grace Burgess, played by Annabelle Wallis, an undercover operative with a mysterious past who falls deeply in love with Tommy despite her mission to betray him.

With its iconic rock-and-roll soundtrack, sharp vintage tailoring, and razor-sharp scripts, Peaky Blinders stands as a monumental achievement in modern prestige television.',
    `updated_at` = NOW()
WHERE `slug` = 'peaky-blinders-2013' OR `id` = 19;

-- -----------------------------------------------------------------------------
-- [20] Iron Man (2008) | Content Length: 1879 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Iron Man is the groundbreaking superhero blockbuster directed by Jon Favreau that launched the multi-billion-dollar Marvel Cinematic Universe and redefined modern comic book cinema. The film centers on Tony Stark, played with effortless wit, arrogance, and charismatic genius by Robert Downey Jr. in a career-defining performance. As the billionaire CEO of Stark Industries, the world\'s leading weapons manufacturer, Tony lives a carefree, hedonistic lifestyle until he is ambushed and captured by a terrorist faction known as the Ten Rings in war-torn Afghanistan.

Tony\'s transformative journey from selfish war-profiteer to selfless protector is catalyzed by the key figures in his life. While trapped in a desert cave with shrapnel moving toward his heart, Tony meets Dr. Ho Yinsen, played with soulful warmth by Shaun Toub, a captive physician who builds an electromagnetic chest plate to keep Tony alive and helps him construct the crude Mark I armored suit, sacrificing his own life so Tony can escape. Upon returning home with a profound change of heart, Tony announces that Stark Industries will immediately cease weapons manufacturing, shocking his longtime executive partner Obadiah Stane, played with sinister corporate ruthlessness by Jeff Bridges. While Obadiah secretly conspires to steal Tony\'s miniature arc reactor technology to build the monstrous Iron Monger armor, Tony works tirelessly in his laboratory, aided by his devoted assistant Virginia \"Pepper\" Potts, played by Gwyneth Paltrow, who keeps his chaotic life organized, and his steadfast military liaison Lieutenant Colonel James \"Rhodey\" Rhodes, played by Terrence Howard.

Infused with snappy naturalistic humor, top-tier visual effects, and a revolutionary hero whose true power comes from his engineering intellect, Iron Man transformed comic book movies into globally dominant cultural phenomena.',
    `updated_at` = NOW()
WHERE `slug` = 'iron-man-2008' OR `id` = 20;

-- -----------------------------------------------------------------------------
-- [21] Lost in Translation (2003) | Content Length: 1914 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Lost in Translation is a delicate, deeply poignant romantic comedy-drama written and directed by Sofia Coppola that captures the quiet ache of loneliness, cultural displacement, and fleeting human connection. Set against the neon-lit, mesmerizing skyline of Tokyo, the film chronicles the unexpected meeting of two wandering souls staying at the luxurious Park Hyatt Hotel who find solace in each other\'s company while feeling completely invisible to the rest of the world.

The narrative is brought to life through the captivating, tender chemistry of its two lead characters. Bob Harris, played by Bill Murray in one of the most acclaimed, nuanced performances of his illustrious career, is an aging American movie star whose passion for life and long-standing marriage have grown stale; he has traveled to Japan to film lucrative commercial endorsements for Suntory whisky while enduring acute jet lag and midlife weariness. In the hotel bar, he crosses paths with Charlotte, portrayed with luminous, gentle melancholy by Scarlett Johansson in her breakthrough adult performance. Charlotte is a thoughtful, recently graduated philosophy student who has accompanied her celebrity-photographer husband John, played by Giovanni Ribisi, to Japan, only to spend long, empty days gazing out the hotel window wondering who she is and what direction her life should take. As John busies himself with shallow Hollywood acquaintances like bubbly starlet Kelly, played by Anna Faris, Bob and Charlotte drift through Tokyo\'s bustling karaoke lounges, sushi bars, and temple courtyards together, sharing quiet laughter and deep late-night conversations about marriage, career fears, and the elusive nature of happiness.

Brimming with atmospheric cinematography, dream-pop melodies, and unspoken emotions, Lost in Translation is an unforgettable cinematic tribute to the rare encounters that gently change our lives forever.',
    `updated_at` = NOW()
WHERE `slug` = 'lost-in-translation-2003' OR `id` = 21;

-- -----------------------------------------------------------------------------
-- [22] Marriage Story (2019) | Content Length: 1822 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Marriage Story is an incisive, profoundly moving domestic drama written and directed by Noah Baumbach that examines the messy, painful, and deeply compassionate reality of divorce. The film tracks the unraveling marriage of Charlie Barber, played by Adam Driver, a successful and devoted avant-garde theater director in New York City, and Nicole Barber, played by Scarlett Johansson, a gifted actress who has long felt overshadowed by her husband\'s creative dominance and seeks to reclaim her artistic voice by starring in a television pilot in Los Angeles.

What begins as an amicable desire to separate without legal warfare quickly spirals into an agonizing, high-stakes custody dispute over their eight-year-old son Henry, played by Azhy Robertson, as cutthroat divorce attorneys enter the picture and weaponize private grievances. Nora Fanshaw, played by Laura Dern in an electric, Oscar-winning performance, is Nicole\'s fiercely glamorous, sharp-witted attorney who knows exactly how to manipulate the family court system to her client\'s advantage. Charlie, desperate to keep Henry from being permanently relocated to California, scrambles between high-priced lawyers, first consulting Bert Spitz, played with gentle folksy wisdom by Alan Alda, before being forced to hire Jay Marotta, played with combative, cynical brutality by Ray Liotta. As the legal bills drain their savings and courtroom mudslinging reaches a fever pitch, Charlie and Nicole find themselves locked in an explosive, heart-wrenching private confrontation where years of suppressed resentments erupt in tears and bitter shouting.

Boasting tour-de-force performances, razor-sharp dialogue, and a bittersweet score by Randy Newman, Marriage Story is an extraordinary portrait of love that survives even as the institution of marriage falls apart.',
    `updated_at` = NOW()
WHERE `slug` = 'marriage-story-2019' OR `id` = 22;

-- -----------------------------------------------------------------------------
-- [23] Barbie (2023) | Content Length: 2018 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Barbie is a vibrant, razor-sharp fantasy comedy directed by Greta Gerwig that transforms the world\'s most iconic fashion doll into a hilarious and profound exploration of identity, feminism, and human existence. The story begins in Barbieland, a picture-perfect, pastel-pink utopia where all women are self-sufficient, confident leaders—holding all positions as presidents, supreme court justices, and Nobel Prize winners—while the various Kens exist purely as accessories whose worth depends on the attention of the Barbies.

The narrative takes off when Stereotypical Barbie, played with incandescent charm, physical comedy, and deep vulnerability by Margot Robbie, begins experiencing unprecedented human glitches, including unprompted thoughts of mortality, cold morning showers, and the ultimate horror: flat feet. Seeking answers, she visits Weird Barbie, played with hilarious contortionist eccentricity by Kate McKinnon, who sends her on a quest into the Real World to find the human child playing with her. Accompanied by her eager, lovesick companion Ken, played by Ryan Gosling in an uproarious, scene-stealing comedic performance, Barbie arrives in modern Los Angeles. There, she discovers that real-world society is dominated by patriarchy, corporate bureaucracy, and female self-doubt, while Ken discovers horses, gym bros, and male privilege, promptly returning to Barbieland to stage a hilarious \"Kendom\" revolution. Barbie teams up with Gloria, played by America Ferrera, a stressed Mattel employee whose real-life melancholy sparked Barbie\'s existential awakening, and Gloria\'s rebellious teenage daughter Sasha, played by Ariana Greenblatt. Together with Mattel\'s bumbling CEO, played by Will Ferrell, and Allan, played by Michael Cera, the group launches a clever counter-operation to restore balance and self-worth to Barbieland.

With dazzling production design, infectious musical numbers, and empowering emotional depth, Barbie became a global cultural phenomenon and box-office record-breaker.',
    `updated_at` = NOW()
WHERE `slug` = 'barbie-2023' OR `id` = 23;

-- -----------------------------------------------------------------------------
-- [24] Top Gun: Maverick (2022) | Content Length: 2074 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Top Gun: Maverick is an adrenaline-charged, visually breathtaking aerial action blockbuster directed by Joseph Kosinski that masterfully revitalized the legacy of the 1986 original film while pushing the boundaries of practical cinematic filmmaking. Set over thirty years after his graduation from the Navy\'s premier fighter weapons school, Captain Pete \"Maverick\" Mitchell, played by Tom Cruise in a quintessential display of movie-star charisma and unmatched physical dedication, continues to serve as a fearless naval test pilot, deliberately dodging promotions that would ground him behind a desk.

When Maverick is assigned by high-ranking naval brass to train a detached group of elite young Top Gun graduates for a dangerous, near-impossible strike against an unsanctioned uranium enrichment facility, he finds himself confronting painful ghosts from his past. The most emotionally charged challenge comes from Lieutenant Bradley \"Rooster\" Bradshaw, played with intense conviction by Miles Teller, the son of Maverick\'s late best friend and radar officer Goose; Rooster harbors deep resentment toward Maverick for previously holding back his military career application. Competing alongside Rooster is a fierce squad of young aviators, led by the cocky, hyper-talented Lieutenant Jake \"Hangman\" Seresin, played by Glen Powell, and the razor-sharp Lieutenant Natasha \"Phoenix\" Trace, played by Monica Barbaro. Maverick finds steady emotional support and renewed romance with Penny Benjamin, played by Jennifer Connelly, an independent single mother and waterfront bar owner. In one of the film\'s most moving sequences, Maverick visits his old rival turned guardian angel, Admiral Tom \"Iceman\" Kazansky, played with poignant grace by Val Kilmer, who provides Maverick with the spiritual validation he needs to guide the young pilots through the deadly mission.

Featuring real cockpit footage shot inside supersonic F/A-18 Super Hornet jets, Top Gun: Maverick delivered an unforgettable, universally celebrated celebration of aviation mastery and emotional brotherhood.',
    `updated_at` = NOW()
WHERE `slug` = 'top-gun-maverick-2022' OR `id` = 24;

-- -----------------------------------------------------------------------------
-- [25] Mission: Impossible - Fallout (2018) | Content Length: 2034 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Mission: Impossible - Fallout is a relentless, masterfully executed espionage action thriller directed by Christopher McQuarrie that stands as one of the greatest modern action films ever made. The story follows Ethan Hunt, portrayed with astonishing physical bravery and unwavering moral determination by Tom Cruise, and his trusted Impossible Missions Force (IMF) team as they race against time to recover three stolen plutonium cores before a shadowy terrorist network known as the Apostles can detonate them across major holy cities to trigger global anarchy.

The film\'s high-stakes narrative thrives on an intricate web of shifting loyalties and electrifying character dynamics. When Ethan prioritizes the lives of his team over the nuclear material during a botched deal in Belfast, CIA Director Erika Sloane, played by Angela Bassett, forces Ethan to accept August Walker, played by Henry Cavill in a menacing, physically imposing performance, as a stern watchdog. Walker\'s ruthless methods and suspicious double-dealing soon escalate tensions, leading to the shocking revelation that he is secretly the elusive terrorist mastermind John Lark. Ethan is joined by his steadfast IMF technical allies: loyal computer genius Luther Stickell, played by Ving Rhames, and witty tech specialist Benji Dunn, played by Simon Pegg, along with IMF Secretary Alan Hunley, played with dignified gravitas by Alec Baldwin. Adding deadly complexity is Ilsa Faust, played by Rebecca Ferguson, an independent MI6 operative torn between her duty to the British government and her deep personal connection to Ethan. Meanwhile, anarchist prisoner Solomon Lane, played by Sean Harris, schemes to unleash nuclear destruction in Kashmir, putting Ethan\'s estranged wife Julia Meade, played by Michelle Monaghan, directly in the line of fire.

Featuring heart-stopping practical stunts, including a real HALO skydive over Paris and Cruise piloting a helicopter through narrow New Zealand mountain ravines, Fallout is a masterclass in cinematic suspense.',
    `updated_at` = NOW()
WHERE `slug` = 'mission-impossible-fallout-2018' OR `id` = 25;

-- -----------------------------------------------------------------------------
-- [26] The Prestige (2006) | Content Length: 2141 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'The Prestige is a spellbinding, intricately constructed psychological thriller directed by Christopher Nolan that explores the dark depths of artistic obsession, professional rivalry, and personal sacrifice within the competitive world of Victorian-era stage magic. Set in London at the dawn of the twentieth century, the story charts the bitter, lifelong feud between two ambitious young illusionists whose former friendship fractures into deadly animosity after a tragic stage accident claims the life of a magician\'s assistant during an underwater escape trick.

The dramatic core of the film is driven by the stark contrast between its two brilliant central characters. Robert Angier, played with theatrical flair and tortured grief by Hugh Jackman, is a consummate showman blessed with natural charisma and commercial polish, yet plagued by creative insecurity because he lacks original technical genius. In sharp contrast, Alfred Borden, played with brooding, secretive intensity by Christian Bale, is a purist artisan of illusion who possesses groundbreaking magical innovation but lacks Angier\'s effortless stage presence. Borden invents an impossible, mind-bending teleportation illusion called \"The Transported Man,\" driving Angier into an all-consuming madness to uncover its closely guarded secret. John Cutter, played with warm paternal wisdom by Michael Caine, serves as Angier\'s stage engineer who designs elaborate stage illusions while warning of the destructive cost of revenge. Olivia Wenscombe, played by Scarlett Johansson, is an alluring stage assistant sent by Angier to infiltrate Borden\'s workshop, only to become emotionally conflicted as she falls for Borden. Angier\'s desperate quest takes him across the Atlantic to Colorado Springs, where he commissions reclusive scientific visionary Nikola Tesla, played with enigmatic brilliance by rock icon David Bowie, to build a machine that defies the natural laws of physics.

With its multi-layered narrative structure mirroring the three acts of a magic trick—the Pledge, the Turn, and the Prestige—the film leaves audiences spellbound with a chilling, tragic climax.',
    `updated_at` = NOW()
WHERE `slug` = 'the-prestige-2006' OR `id` = 26;

-- -----------------------------------------------------------------------------
-- [27] Dune: Part Two (2024) | Content Length: 2129 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Dune: Part Two is a monumental, visionary science fiction epic directed by Denis Villeneuve that completes the first chapter of Frank Herbert\'s legendary novel with awe-inspiring visual scale and profound thematic weight. Picking up immediately after the devastating fall of House Atreides, the film follows young Paul Atreides, played by Timothée Chalamet with transformative power as he evolves from a frightened, grieving duke into an enigmatic galactic messiah known across the desert wastes of Arrakis as Muad\'Dib.

The complex narrative weaves together the fates of unforgettable characters across vast cultural and political divides. Chani, portrayed with fierce emotional strength and independent spirit by Zendaya, is a proud Fremen warrior who falls deeply in love with Paul while remaining fiercely skeptical of the religious prophecies surrounding him, terrified that blind faith will enslave her people rather than liberate them. Paul\'s pregnant mother, Lady Jessica, played by Rebecca Ferguson, fully embraces her Bene Gesserit training to become the Fremen\'s Reverend Mother, ruthlessly manipulating ancient religious myths to cement her son\'s divine authority. Stilgar, played with commanding charisma by Javier Bardem, serves as the devout Fremen leader whose unwavering belief in the messiah guides Paul\'s ascension. From the shadowy home world of Geidi Prime comes Feyd-Rautha Harkonnen, played with psychopathic, razor-sharp malice by Austin Butler; as the sociopathic nephew of Baron Vladimir Harkonnen (Stellan Skarsgård), Feyd-Rautha is unleashed to crush Fremen resistance and duel Paul in a climactic fight for the imperial throne. Gurney Halleck, played by Josh Brolin, reunites with Paul as his battle-hardened military mentor, while Princess Irulan, played by Florence Pugh, and Emperor Shaddam IV, played by Christopher Walken, watch helplessly as the spice-rich planet slips from their grasp.

Combining Hans Zimmer\'s thunderous soundscape, Greig Fraser\'s stunning desert cinematography, and a harrowing warning about charismatic leaders, Dune: Part Two is an undisputed science fiction masterpiece.',
    `updated_at` = NOW()
WHERE `slug` = 'dune-part-two-2024' OR `id` = 27;

-- -----------------------------------------------------------------------------
-- [28] Challengers (2024) | Content Length: 1940 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Challengers is an electric, high-octane romantic sports drama directed by Luca Guadagnino that transforms the intense, sun-drenched world of professional tennis into a breathless, decade-spanning battleground of ambition, sexual tension, and psychological dominance. The film revolves around a turbulent love triangle between three deeply competitive individuals whose lives and careers have been hopelessly tangled together since their teenage years on the junior tennis circuit.

At the center of this volatile dynamic is Tashi Duncan, played with fierce, razor-sharp intensity by Zendaya. Tashi is a former tennis prodigy whose soaring career was tragically cut short by a catastrophic knee injury, leading her to channel her relentless competitive hunger into becoming a mastermind coach who controls the men in her life with surgical precision. Her husband, Art Donaldson, played with fragile vulnerability by Mike Faist, is a multi-millionaire Grand Slam champion currently on an embarrassing losing streak, whose confidence and physical stamina are fading under the relentless pressure to stay at the top. To rebuild Art\'s winning momentum before the US Open, Tashi signs him up for a low-tier Challenger tournament in New Rochelle, where he unexpectedly faces Patrick Zweig, played with untamed swagger and bruised pride by Josh O\'Connor. Patrick is Art\'s former childhood best friend and doubles partner, as well as Tashi\'s passionate ex-boyfriend, who now survives on small tournament earnings while living out of his car. As the grueling match between Art and Patrick unfolds in the sweltering heat, high-speed tennis volleys become a direct metaphor for suppressed intimate resentments, secret rendezvous, and unresolved emotional betrayals.

Driven by Trent Reznor and Atticus Ross\'s pulse-pounding electronic synth-techno score, Challengers is an exhilarating, sweat-soaked cinematic spectacle that reinvents the sports genre.',
    `updated_at` = NOW()
WHERE `slug` = 'challengers-2024' OR `id` = 28;

-- -----------------------------------------------------------------------------
-- [29] Fight Club (1999) | Content Length: 1964 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Fight Club is a provocative, darkly humorous psychological thriller directed by David Fincher that brilliantly satirizes late-twentieth-century corporate consumerism, alienation, and the crisis of modern masculinity. The film follows an unnamed Narrator, played with exhausted cynicism and dry wit by Edward Norton, an insomniac automobile recall specialist living in a soulless high-rise apartment furnished entirely with designer catalog items, desperately seeking meaning by attending terminal illness support groups under false pretenses.

His monotonous existence is permanently disrupted when he meets two chaotic forces of nature. Marla Singer, played with nihilistic glamour and raw emotional vulnerability by Helena Bonham Carter, is a fellow support-group fraud whose abrasive presence ruins the Narrator\'s ability to cry and sleep. Soon after his apartment is mysteriously destroyed in a gas explosion, the Narrator seeks refuge with Tyler Durden, played by Brad Pitt in one of cinema\'s most iconic performances of pure charisma, anarchic philosophy, and physical swagger. Tyler, an anti-consumerist soap salesman living in a dilapidated, leaking Victorian house on Paper Street, introduces the Narrator to the cathartic release of bare-knuckle fist fighting in the basement of a local bar. What begins as a small, informal weekly fight club for dissatisfied working-class men rapidly expands into a nationwide underground cult called \"Project Mayhem.\" Led by Tyler\'s militaristic anti-capitalist doctrine, members—including the loyal, tragic Robert \"Bob\" Paulson, played with tender innocence by Meat Loaf—launch widespread acts of corporate sabotage aimed at erasing the world\'s debt records, forcing the Narrator into a frantic psychological confrontation with his own fractured sanity.

Filled with groundbreaking visual effects, subversive dialogue, and a mind-bending twist, Fight Club remains a timeless, fiercely intelligent cultural touchstone.',
    `updated_at` = NOW()
WHERE `slug` = 'fight-club-1999' OR `id` = 29;

-- -----------------------------------------------------------------------------
-- [30] Once Upon a Time in Hollywood (2019) | Content Length: 1958 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Once Upon a Time in Hollywood is Quentin Tarantino\'s affectionate, gorgeously detailed love letter to the golden twilight of 1969 Los Angeles, celebrating the magic of cinema while rewriting a tragic chapter of American cultural history. The story unfolds across three pivotal days in late winter and summer, following aging television western star Rick Dalton, played by Leonardo DiCaprio with incredible vulnerability, comic insecurity, and emotional depth, as he struggles to transition into mainstream Hollywood features while watching his star power slowly fade.

Rick\'s emotional anchor and lifelong confidant is Cliff Booth, played by Brad Pitt in an Oscar-winning performance of effortless cool, laconic charm, and lethal physical capability. Cliff is a war veteran and blacklisted stunt double who lives in a humble trailer behind a Van Nuys drive-in theater with his beloved pit bull Brandy, happily serving as Rick\'s driver, handyman, and steadfast best friend. While Rick battles self-doubt on the set of a television western pilot directed by Sam Wanamaker, Cliff\'s travels across Los Angeles take him to the sun-baked Spahn Movie Ranch, where he encounters the unsettling, real-world hippie commune controlled by Charles Manson, confronting suspicious cult members like Pussycat (Margaret Qualley) and Tex Watson (Austin Butler). Living right next door to Rick on Cielo Drive is radiant young actress Sharon Tate, portrayed with joyful grace and luminous optimism by Margot Robbie. The film tenderly depicts Sharon going about her daily life—dancing in the sunshine, buying a rare book for her husband Roman Polanski, and delighting in the appreciative laughter of an afternoon cinema audience watching her in The Wrecking Crew.

Blending nostalgic pop-music soundtracks, rich retro production design, and an explosive, revisionist finale, Tarantino crafts a warm, funny, and deeply satisfying fairy tale about friendship and artistic survival.',
    `updated_at` = NOW()
WHERE `slug` = 'once-upon-a-time-in-hollywood-2019' OR `id` = 30;

-- -----------------------------------------------------------------------------
-- [31] Little Women (2019) | Content Length: 2060 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Little Women is a radiant, deeply inventive coming-of-age period drama written and directed by Greta Gerwig, bringing Louisa May Alcott\'s cherished classic novel to life with fresh energy, modern emotional resonance, and a brilliant non-linear narrative structure. Set against the backdrop of Concord, Massachusetts during and immediately after the American Civil War, the story chronicles the vibrant lives, artistic aspirations, and enduring sisterhood of the four March sisters as they navigate poverty, love, and societal expectations.

The heart of the film beats through the distinct personalities and fiercely independent dreams of each sister. Jo March, played with breathless passion, humor, and raw determination by Saoirse Ronan, is the fiery second daughter who aspires to become a successful independent author in New York City, refusing to accept that a woman\'s only destiny is marriage. Amy March, portrayed with breathtaking nuance, mature ambition, and sharp intellect by Florence Pugh in an Oscar-nominated turn, travels to Paris to study fine art while wrestling with the pragmatic financial realities required of women in high society. Meg March, played with gentle grace by Emma Watson, is the eldest sister who yearns for luxury but chooses a humble marriage with an impoverished tutor based on authentic love. Beth March, played with angelic sweetness by Eliza Scanlen, is the musical soul of the house whose quiet strength and fragile health unite the family through immense sorrow. Surrounding the sisters is Theodore \"Laurie\" Laurence, played with charming, boyish adoration by Timothée Chalamet, the wealthy boy next door whose heart is intimately tied to both Jo and Amy. Guiding them is Marmee March, played with infinite compassion by Laura Dern, a selfless mother teaching her daughters to maintain dignity and empathy regardless of hardship.

With Alexandre Desplat\'s sweeping score and Gerwig\'s warm visual palette, Little Women is a timeless, joy-filled celebration of feminine ambition, creative freedom, and family devotion.',
    `updated_at` = NOW()
WHERE `slug` = 'little-women-2019' OR `id` = 31;

-- -----------------------------------------------------------------------------
-- [34] Dilwale Dulhania Le Jayenge (1995) | Content Length: 1809 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Dilwale Dulhania Le Jayenge is an iconic, record-breaking romantic drama directed by Aditya Chopra that defined modern Indian popular cinema and set the gold standard for cinematic romance across generations. The story chronicles the joyous journey of two non-resident Indians living in London whose contrasting personalities clash and unite during a scenic month-long Eurail tour across Switzerland.

Raj Malhotra, portrayed with effortless boyish charm, infectious wit, and deep emotional sincerity by Shah Rukh Khan, is a wealthy, carefree young man whose humorous antics mask a deeply respectful heart. Simran Singh, played with radiant grace and quiet longing by Kajol, is a dutiful young woman raised in a conservative household where traditional Punjabi family values, female modesty, and arranged marriage expectations are strictly enforced. Despite initial bickering, Raj and Simran fall deeply in love amidst the snowy Swiss Alps. However, their dreams are threatened when Simran\'s strict, proud father, Chaudhary Baldev Singh, played with towering authority by Amrish Puri, learns of the romance and immediately relocates the family to Punjab to execute an arranged wedding with Kuljeet Singh, played by Parmeet Sethi, the arrogant son of his childhood friend. Rather than eloping, Raj follows Simran to rural Punjab, determined to win the blessings of her entire conservative family without dishonesty. Supported by Simran\'s loving mother Lajjo, played with gentle warmth by Farida Jalal, Raj weaves his way into the hearts of the household, proving that true love honors family and culture.

With its unforgettable music composed by Jatin-Lalit, glorious mustard fields, and the historic train-station finale, Dilwale Dulhania Le Jayenge remains the longest-running film in Indian cinema history.',
    `updated_at` = NOW()
WHERE `slug` = 'dilwale-dulhania-le-jayenge-1995' OR `id` = 34;

-- -----------------------------------------------------------------------------
-- [35] Swades (2004) | Content Length: 1946 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Swades is a profoundly moving, critically revered drama directed by Ashutosh Gowariker that celebrates patriotism, rural empowerment, and the vital responsibility educated citizens have toward their homeland. The narrative follows Mohan Bhargava, portrayed with quiet restraint, scientific curiosity, and emotional depth by Shah Rukh Khan in one of the finest dramatic performances of his career. Mohan is a brilliant project manager at NASA in Greenbelt, Maryland, leading the deployment of the Global Precipitation Measurement satellite, who lives a comfortable, technologically advanced life in the United States.

Longing to reconnect with his roots, Mohan takes a temporary leave of absence to travel to India in search of Kaveri Amma, played with maternal warmth and wisdom by Kishori Ballal, the elderly nanny who raised him with boundless affection following his parents\' death. Mohan tracks her down to Charanpur, an impoverished, caste-divided village in rural Uttar Pradesh. There, he encounters Gita, played with fierce dignity and independent grace by Gayatri Joshi, an idealistic childhood friend who works tirelessly as a village schoolteacher fighting for girl-child education and caste equality. While initially experiencing culture shock amidst frequent power outages, rigid caste discrimination, and bureaucratic apathy, Mohan gradually falls in love with the villagers and their struggles. Aided by village postmaster Nivaran Dayal Srivastava, played by Rajesh Vivek, and Melaram, played by Dayashankar Pandey, a humble cook dreaming of better days, Mohan applies his engineering expertise to build a local hydroelectric generator from a natural mountain reservoir, lighting up the village and discovering that true patriotism lies in selfless grassroots action.

Anchored by A. R. Rahman\'s soul-stirring musical masterpiece \"Yeh Jo Des Hai Tera,\" Swades is a timeless, inspiring ode to nation-building and personal integrity.',
    `updated_at` = NOW()
WHERE `slug` = 'swades-2004' OR `id` = 35;

-- -----------------------------------------------------------------------------
-- [36] Piku (2015) | Content Length: 1971 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Piku is a delightfully warm, quirky, and deeply perceptive comedy-drama directed by Shoojit Sircar that turns the everyday absurdities of aging parents, family duty, and chronic digestive troubles into an unforgettable celebration of unconditional love. The story revolves around Piku Banerjee, played with sharp-witted authenticity, stressed vulnerability, and natural grace by Deepika Padukone. Piku is an independent, successful architect in New Delhi whose daily existence is constantly derailed by the endless demands and eccentric hypochondria of her 70-year-old widowed father.

Her father, Bhashkor Banerjee, portrayed in a comic masterclass of stubborn obstinacy and theatrical eccentricity by Amitabh Bachchan, is a retired civil engineer who micro-manages every household detail and views his chronic constipation as the central philosophical crisis of the universe. When Bhashkor stubbornly insists on visiting his ancestral home in Kolkata but adamantly refuses to travel by air or train due to his erratic bowel movements, Piku is forced to organize a grueling 1,500-kilometer road trip in an ambassador car. Enter Rana Chaudhary, played with deadpan brilliance, world-weary patience, and gentle charm by the legendary Irrfan Khan. Rana is the owner of a boutique taxi service who is reluctantly forced to drive the bickering father and daughter himself after all his drivers refuse the difficult assignment. Along the highway, Rana\'s pragmatic advice and calm diplomacy slowly bridge the communication gap between Piku and Bhashkor, sparking a subtle, mature romance between Rana and Piku. Moushumi Chatterjee enlivens the journey as Chhobi Mashi, Piku\'s outspoken aunt whose pragmatic views on marriage and modern life contrast hilariously with Bhashkor\'s conservative fears.

With its organic humor, realistic family banter, and heartwarming melancholia, Piku stands as a modern cinematic gem about honoring our parents through life\'s strangest journeys.',
    `updated_at` = NOW()
WHERE `slug` = 'piku-2015' OR `id` = 36;

-- -----------------------------------------------------------------------------
-- [37] Padmaavat (2018) | Content Length: 1932 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Padmaavat is Sanjay Leela Bhansali\'s opulent, visually breathtaking historical epic that dramatizes the legendary tale of honor, valor, and supreme sacrifice from 14th-century India. Set against the sun-baked sands of Rajasthan and the lavish court of the Delhi Sultanate, the film centers on Rani Padmavati, portrayed with luminous beauty, regal dignity, and unyielding courage by Deepika Padukone. Padmavati is a visionary Singhal princess who becomes the queen of Mewar after marrying the noble and righteous Rajput ruler Maharawal Ratan Singh, played with steadfast warrior pride and traditional chivalry by Shahid Kapoor.

The idyllic realm of Chittorgarh is thrown into grave peril by Sultan Alauddin Khilji, portrayed with feral intensity, insatiable ambition, and hypnotic villainy by Ranveer Singh in a career-defining performance. Having ruthlessly assassinated his uncle to seize the Delhi throne, the power-hungry Khilji becomes utterly obsessed with capturing Padmavati after hearing poet Raghav Chetan\'s descriptions of her unmatched beauty. Khilji marches his colossal imperial army to Chittor, laying an agonizing months-long siege outside the impregnable desert fortress. Even as Khilji\'s cunning slave-general Malik Kafur, played with venomous devotion by Jim Sarbh, uses treacherous tactics, and Khilji\'s neglected first wife Mehrunissa, played with quiet grace by Aditi Rao Hydari, risks her life to help the Rajputs, Ratan Singh refuses to compromise his warrior code. When Ratan Singh is treacherously killed in combat, Padmavati leads the women of Chittorgarh in the sacred ritual of Jauhar (self-immolation), walking into the fire with serene smiles to deny Khilji his conquest, forever preserving their eternal dignity.

Boasting grandiose sets, stunning traditional choreography in songs like \"Ghoomar,\" and powerful themes of moral triumph over raw tyranny, Padmaavat is an unforgettable visual spectacle.',
    `updated_at` = NOW()
WHERE `slug` = 'padmaavat-2018' OR `id` = 37;

-- -----------------------------------------------------------------------------
-- [38] Sholay (1975) | Content Length: 1931 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Sholay is the undisputed crown jewel of Indian popular cinema, an epic action-adventure blockbuster directed by Ramesh Sippy that redefined Bollywood storytelling with its unforgettable characters, thrilling action choreography, and immortal dialogue written by the legendary duo Salim-Javed. Set in the rugged, ravine-filled terrain of Ramgarh, the story chronicles the epic showdown between law, brotherhood, and a ruthless band of dacoits terrorizing the countryside.

Thakur Baldev Singh, portrayed with quiet gravitas and simmering vengeance by Sanjeev Kumar, is a principled former police officer whose entire family was mercilessly slaughtered by the psychopathic dacoit leader Gabbar Singh, played by Amjad Khan in one of cinema\'s most terrifying and quoted villainous debuts. Having had his arms brutally severed by Gabbar, Thakur hires two small-time convicts and expert sharpshooters with hearts of gold to capture Gabbar alive. Jai, played with dry sarcasm, cool demeanor, and quiet loyalty by Amitabh Bachchan, and Veeru, played with exuberant charm, comedic energy, and fiery courage by Dharmendra, form an unbreakable bond of brotherhood. While defending Ramgarh against Gabbar\'s raids, Veeru falls hilariously in love with Basanti, played with feisty, talkative brilliance by Hema Malini, the village horse-cart driver, while Jai forms a subtle, unspoken emotional connection with Thakur\'s widowed daughter-in-law Radha, played with gentle sorrow by Jaya Bhaduri. Memorable supporting characters—including the loyal blind Imam (A.K. Hangal), the comic jailor (Asrani), and Gabbar\'s terrified henchmen Samba and Kaalia—elevate the tension toward an explosive, heartbreaking climax where Jai makes the ultimate sacrifice so his friends can survive.

Featuring R.D. Burman\'s iconic score, explosive horse chases, and the ultimate victory of good over evil, Sholay remains a monumental cultural pillar of Indian cinema.',
    `updated_at` = NOW()
WHERE `slug` = 'sholay-1975' OR `id` = 38;

-- -----------------------------------------------------------------------------
-- [39] Black (2005) | Content Length: 1965 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Black is Sanjay Leela Bhansali\'s deeply moving, masterfully crafted psychological drama inspired by the life of Helen Keller, exploring the profound journey of a deafblind girl emerging from darkness into the radiant light of knowledge and self-expression. Shot in a shadowy, dreamlike palette reminiscent of European cinema, the story follows Michelle McNally, played with astonishing emotional physical intensity by Rani Mukerji (and as a feral child by Ayesha Kapur), an Anglo-Indian girl in Shimla who was left deaf, blind, and unable to speak following a severe childhood illness.

Living in a terrifying void of sensory silence, young Michelle grows up aggressive, isolated, and uncontrollable, leading her desperate father Paul, played by Dhritiman Chatterjee, to contemplate consigning her to a mental asylum. Refusing to surrender her daughter, Michelle\'s mother Catherine, played with maternal tenderness by Shernaz Patel, hires Debraj Sahai, portrayed with fierce, eccentric passion and weathered nobility by Amitabh Bachchan. Debraj is an aging, alcoholic teacher who has dedicated his life to unlocking the minds of deafblind children. Through months of tough, relentless physical training, Debraj breaks through Michelle\'s wall of darkness, teaching her the meaning of words through touch, water, and sign language. As Michelle blossoms into a determined young woman who defies all odds to earn an arts degree from a mainstream university, the narrative takes a heartbreaking turn when Debraj develops Alzheimer\'s disease, gradually losing his memories, his speech, and his ability to recognize the world. In an extraordinary role reversal of selfless love, Michelle becomes the teacher, gently guiding Debraj back toward awareness in a rain-swept hospital room.

With minimal background music, brilliant sound design, and career-best performances, Black is a transcendent cinematic triumph honoring human resilience and the eternal gift of education.',
    `updated_at` = NOW()
WHERE `slug` = 'black-2005' OR `id` = 39;

-- -----------------------------------------------------------------------------
-- [40] Barfi! (2012) | Content Length: 1966 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Barfi! is Anurag Basu\'s whimsical, bittersweet, and visually dazzling romantic comedy-drama that proves love, joy, and emotional connection have no need for spoken words. Set against the picturesque, mist-veiled tea gardens of Darjeeling and the heritage streets of 1970s Kolkata, the film charts the life of Murphy \"Barfi\" Johnson, portrayed with Charlie Chaplin-esque physical comedy, boundless optimism, and infectious charm by Ranbir Kapoor in an extraordinary non-verbal performance. Deaf and mute since birth, Barfi navigates the world with playful mischief, joyful resilience, and an open heart.

Barfi\'s life is forever transformed by two remarkable women from completely different worlds. Shruti Ghosh, played with understated elegance and melancholic beauty by Ileana D\'Cruz, is a wealthy, refined young woman who visits Darjeeling and falls deeply in love with Barfi\'s pure spirit; however, societal pressure and parental warnings about financial security lead her to abandon Barfi and marry a wealthy, respectable husband, a choice that haunts her with regret for decades. Soon after, Barfi reunites with his childhood acquaintance Jhilmil Chatterjee, portrayed with breathtaking innocence, sensitivity, and authenticity by Priyanka Chopra Jonas in one of the greatest portrayals of an autistic character in Indian cinema history. Abandoned by her wealthy, dysfunctional family who view her as an embarrassment, Jhilmil finds safety, absolute acceptance, and pure happiness in Barfi\'s protective care. When a botched kidnapping attempt to pay for his father\'s medical treatment puts Darjeeling police inspector Sudhanshu Dutta, played with warm comic exhaustion by Saurabh Shukla, on Barfi\'s trail, Barfi and Jhilmil run away together, forging an unbreakable, lifelong bond of pure companionship.

Powered by Pritam\'s acoustic melodies and Basu\'s painterly visual composition, Barfi! is a heartwarming celebration of life\'s simplest and purest treasures.',
    `updated_at` = NOW()
WHERE `slug` = 'barfi-2012' OR `id` = 40;

-- -----------------------------------------------------------------------------
-- [41] Bajirao Mastani (2015) | Content Length: 2026 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Bajirao Mastani is Sanjay Leela Bhansali\'s sweeping, grandiose historical romantic epic that dramatizes the passionate, tragic love affair between the undefeated 18th-century Maratha Peshwa and a warrior princess, set against the backdrop of imperial conquest and orthodox palace politics. The film centers on Peshwa Bajirao I, portrayed with electrifying martial swagger, soaring charisma, and raw emotional intensity by Ranveer Singh. Renowned as a tactical military genius who expanded the Maratha Empire across forty victorious battles without a single defeat, Bajirao finds his personal world completely upturned when he meets his match in battle and romance.

While riding to the defense of the besieged Bundelkhand kingdom, Bajirao encounters Mastani, played with ethereal beauty, fiery swordsmanship, and unyielding romantic courage by Deepika Padukone. Mastani is the daughter of Hindu King Chhatrasal and his Persian Muslim wife Ruhaani Begum; captivated by Bajirao\'s bravery, she fearlessly rides to Pune to claim her place as his second wife, braving cruel social ostracization, physical imprisonment, and assassination plots orchestrated by Bajirao\'s orthodox Brahmin mother Radhabai, played with icy conviction by Tanvi Azmi, and brother Chimaji Appa. Caught between this passionate storm is Kashibai, portrayed with heartbreaking dignity, gentle grace, and quiet strength by Priyanka Chopra Jonas. As Bajirao\'s loyal, loving first wife, Kashibai endures devastating emotional heartbreak when Bajirao brings Mastani to Shaniwar Wada, yet she preserves her royal pride and even forms a bittersweet understanding with Mastani, culminating in the dazzling dance duet \"Pinga.\" As political schemers conspire to separate the lovers while Bajirao battles a deadly fever on the banks of the Narmada River, their timeless devotion reaches a haunting, tragic crescendo.

With its breathtaking palaces, grand battle sequences, and Bhansali\'s opulent musical score, Bajirao Mastani is a monumental triumph of Indian cinema.',
    `updated_at` = NOW()
WHERE `slug` = 'bajirao-mastani-2015' OR `id` = 41;

-- -----------------------------------------------------------------------------
-- [42] Citadel (2023) | Content Length: 1980 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Citadel is an adrenaline-fueled, globetrotting sci-fi spy thriller series executive produced by the Russo Brothers that plunges viewers into a shadowy, high-tech war between two rival intelligence syndicates. Eight years prior, Citadel—an independent global spy agency dedicated to upholding humanity\'s safety without allegiance to any country—was brutally destroyed from within by Manticore, a sinister syndicate founded by the world\'s wealthiest dynastic families to manipulate world events from the shadows.

The story follows elite Citadel agent Mason Kane, played with gritty physical intensity and emotional confusion by Richard Madden. Survived by a miraculous escape from an ambushed train in the Italian Alps, Mason had his memory completely wiped by a failsafe protocol, living for eight years as Kyle Conroy, an ordinary family man in Oregon with no recollection of his lethal past. His quiet life is shattered when Bernard Orlick, played with sharp comedic wit and tech wizardry by Stanley Tucci, tracks him down; as the last surviving Citadel spymaster, Bernard recruits Mason to prevent Manticore from acquiring nuclear launch codes. To stop the threat, Mason must track down his former partner and lover Nadia Sinh, portrayed with magnetic charisma, lethal martial arts combat, and emotional depth by Priyanka Chopra Jonas. Nadia, who has also been living under a new identity in Spain, holds critical puzzle pieces about the final mission and the identity of the mole who betrayed Citadel. Together, Mason and Nadia navigate dangerous shootouts across Europe and North Africa, battling ruthless Manticore operative Dahlia Archer, played with chilling aristocratic malice by Lesley Manville, while confronting shocking personal secrets that test whether their love was real or an engineered espionage deception.

Featuring cutting-edge action choreography, high-tech gadgets, and dynamic multi-layered plotting, Citadel delivers premium international entertainment.',
    `updated_at` = NOW()
WHERE `slug` = 'citadel-2023' OR `id` = 42;

-- -----------------------------------------------------------------------------
-- [43] 3 Idiots (2009) | Content Length: 1937 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = '3 Idiots is Rajkumar Hirani\'s universally adored comedy-drama masterpiece that humorously and poignantly critiques the hyper-competitive, rote-learning pressures of the Indian educational system while celebrating genuine friendship, original thinking, and the pursuit of true passion. Set primarily at the prestigious Imperial College of Engineering (ICE) in Delhi, the narrative unfolds across two timelines as two college friends embark on a scenic road trip across Himachal Pradesh and Ladakh to find their long-lost college roommate who mysteriously disappeared on graduation day.

Ranchhoddas \"Rancho\" Shamaldas Chanchad, portrayed with infectious optimism, sharp intellect, and boyish charm by Aamir Khan, is an unconventional genius who believes that education should inspire curiosity rather than anxiety. Rancho transforms the lives of his two stressed roommates: Farhan Qureshi, played with endearing sincerity and relatable emotion by R. Madhavan, an aspiring wildlife photographer trapped in engineering by his overbearing father, and Raju Rastogi, played with moving vulnerability by Sharman Joshi, an impoverished student paralyzed by fear of failure and bad luck. The trio\'s free-thinking antics draw the fury of the college director, Dr. Viru Sahastrabuddhe, famously nicknamed \"Virus\" and played in a brilliant, razor-sharp performance by Boman Irani. Virus represents the ruthless academic machine that values grades over human life. While Rancho wins the heart of Virus\'s compassionate doctor daughter Pia, played with radiant warmth by Kareena Kapoor Khan, he also humiliates Chatur Ramalingam \"Silencer,\" played with hilarious vanity by Omi Vaidya, whose rote memorization speech becomes an iconic comedy sequence.

Delivering the timeless philosophy \"Pursue excellence, and success will chase you,\" 3 Idiots is an emotional, laughter-filled classic that resonates deeply with audiences of all ages across the globe.',
    `updated_at` = NOW()
WHERE `slug` = '3-idiots-2009' OR `id` = 43;

-- -----------------------------------------------------------------------------
-- [44] Dangal (2016) | Content Length: 2092 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Dangal is Nitesh Tiwari\'s record-breaking biographical sports drama that stands as the highest-grossing Indian film in history, telling the incredible, inspiring true story of a father who defied deep-seated societal patriarchy to train his daughters into world-class wrestling champions. Set in the conservative rural village of Balali in Haryana, the film chronicles the relentless crusade of Mahavir Singh Phogat, portrayed with transformative physical dedication, stoic resolve, and emotional depth by Aamir Khan. Unable to win an international gold medal for India due to financial constraints, Mahavir vows that his unborn son will fulfill his dream, only to father four daughters.

Realizing that a gold medal is a gold medal regardless of gender, Mahavir seizes the opportunity when his elder daughters Geeta and Babita thrash two neighborhood boys who bullied them. Mahavir subjects the young girls—played with phenomenal grit and spirit by Zaira Wasim and Suhani Bhatnagar—to grueling 5:00 AM training regimens, cutting their hair short, making them wrestle boys in muddy village akharas, and braving the vicious mockery of their conservative community, while his wife Daya Shobha Kaur, played with gentle warmth by Sakshi Tanwar, quietly worries for their social future. As they grow into elite athletes, Geeta, played with fierce athletic power by Fatima Sana Shaikh, and Babita, played with steadfast loyalty by Sanya Malhotra, break through male bastions to win national titles. The narrative reaches intense emotional heights when Geeta enters the National Sports Academy in Patiala, where elite coach Pramod Kadam, played by Girish Kulkarni, attempts to discard Mahavir\'s traditional techniques, leading to a bitter father-daughter rift before Geeta realizes that her father\'s unconditional belief is her true strength, culminating in an electric, gold-medal victory at the 2010 Commonwealth Games.

With Pritam\'s energetic rural soundtrack and authentic wrestling choreography, Dangal is an empowering, tear-jerking masterpiece celebrating female power and parental devotion.',
    `updated_at` = NOW()
WHERE `slug` = 'dangal-2016' OR `id` = 44;

-- -----------------------------------------------------------------------------
-- [45] Lagaan (2001) | Content Length: 2018 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Lagaan: Once Upon a Time in India is Ashutosh Gowariker\'s monumental, Oscar-nominated period sports drama that masterfully weaves British colonial oppression, cricket, and grassroots peasant solidarity into an unforgettable three-and-a-half-hour cinematic triumph. Set in 1893 in the drought-stricken village of Champaner in Central India, the story centers on Bhuvan, played with inspiring leadership, fiery pride, and charismatic courage by Aamir Khan. Bhuvan is an outspoken young farmer who boldly confronts the cruel, arrogant British cantonment commander, Captain Andrew Russell, played with aristocratic malice by Paul Blackthorne.

When the British demand double the agricultural tax (Lagaan) despite a devastating drought, Russell offers Bhuvan an outrageous wager: if the villagers can defeat the British officers in an unfamiliar game of cricket, their tax will be completely waived for three years; if they lose, they must pay triple tax, facing certain starvation. Bhuvan accepts the impossible challenge, uniting a skeptical, divided community of villagers to form a cricket team from scratch. He is secretly aided by Russell\'s kindhearted sister Elizabeth, played with luminous grace by Rachel Shelley, who sympathizes with the villagers\' plight and sneaks into the village to teach them the complex rules of the game. Bhuvan is supported by Gauri, played with spirited devotion and village charm by Gracy Singh, who loves Bhuvan while feeling jealousy toward Elizabeth. The village team forms an inspiring cross-section of Indian society—including the elderly physician Ishwar, the fierce Muslim archer Ismail, the treacherous woodcutter Lakha (Yashpal Sharma), and the disabled, untouchable spinner Kachra, played with haunting poignancy by Aditya Lakhia, whose magical spin bowling becomes their secret weapon.

Boasting A. R. Rahman\'s iconic rural soundtrack and one of the most nail-biting sports matches ever filmed, Lagaan is a globally celebrated cinematic marvel about courage, unity, and hope.',
    `updated_at` = NOW()
WHERE `slug` = 'lagaan-2001' OR `id` = 45;

-- -----------------------------------------------------------------------------
-- [46] Gangubai Kathiawadi (2022) | Content Length: 2004 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Gangubai Kathiawadi is Sanjay Leela Bhansali\'s vibrant, empowering biographical crime drama that tells the extraordinary, hard-hitting story of a young girl from Gujarat who was betrayed, sold into prostitution, and rose to become the fierce, benevolent matriarch of Mumbai\'s notorious red-light district. Set across the neon-lit, chaotic streets of Kamathipura during the 1950s and 60s, the film stars Alia Bhatt in a career-defining, tour-de-force performance as Gangubai Harjivandas. Lured to Bombay with the false promise of a film career by her deceitful lover, Ganga is sold into a brothel for a mere thousand rupees, yet she refuses to let tragedy crush her spirit.

Transforming her grief into formidable power, Gangu earns the respect of Kamathipura\'s four thousand sex workers by standing up to abusive clients and extortionists. When a violent gangster assaults her, Gangu fearlessly approaches Mumbai\'s legendary underworld don Rahim Lala, played with commanding gravitas and magnetic authority by Ajay Devgn. Impressed by her fearless courage, Lala accepts Gangu as his sworn sister, providing her with the political and financial muscle to take over the brothels, shut down alcohol bootlegging, and guarantee fair wages and medical protection for the women. Shantanu Maheshwari plays Afsaan, a young, gentle tailor whose pure romantic devotion gives Gangu a glimpse of domestic happiness, though she selflessly sacrifices her personal love to arrange his marriage to a young brothel girl to save her future. Gangu wages an electric political campaign for local leadership against her ruthless transgender rival Raziabai, portrayed with menacing brilliance by Vijay Raaz, before taking her crusade for sex workers\' rights and children\'s education all the way to Prime Minister Jawaharlal Nehru.

With exquisite visual staging, powerful feminist anthems like \"Dholida,\" and Alia Bhatt\'s commanding presence, Gangubai Kathiawadi is an unforgettable tribute to dignity, resilience, and justice.',
    `updated_at` = NOW()
WHERE `slug` = 'gangubai-kathiawadi-2022' OR `id` = 46;

-- -----------------------------------------------------------------------------
-- [47] Raazi (2018) | Content Length: 1965 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Raazi is Meghna Gulzar\'s taut, emotionally devastating espionage thriller that redefines the spy genre by stripping away glamorous action tropes in favor of raw human empathy, moral conflict, and quiet, unsung patriotism. Based on Harinder Sikka\'s novel Calling Sehmat, the film is set against the tense buildup to the Indo-Pakistani War of 1971. The narrative follows Sehmat Khan, portrayed with heartbreaking vulnerability, steely resolve, and emotional nuance by Alia Bhatt. Sehmat is a gentle, twenty-year-old Kashmiri college student who willingly leaves her innocent youth behind to serve her country as an undercover RAW operative in Pakistan.

Sehmat\'s mission is arranged by her terminally ill, patriotic father Hidayat Khan, played with dignified grace by Rajit Kapur, who uses his longstanding friendship with a high-ranking Pakistani military general to marry Sehmat to the general\'s younger son, Iqbal Syed. Iqbal, played with sensitive gentleness, culture, and deep affection by Vicky Kaushal, is an honorable military officer who treats Sehmat with immense kindness and respect, making her espionage duties agonizingly painful. Under the rigorous, uncompromising training of RAW spymaster Khalid Mir, played with icy professionalism by Jaideep Ahlawat, Sehmat establishes a covert Morse code transmitter in her Pakistani marital home, secretly tapping into the telephone lines of her father-in-law, Brigadier Parvez Syed (Shishir Sharma). As Sehmat uncovers top-secret Pakistani naval plans to sink the Indian aircraft carrier INS Vikrant, she is forced to eliminate loyal family servant Abdul and brother-in-law Mehboob to prevent her cover from being blown, suffering immense psychological trauma as she realizes that war consumes innocent, honorable people on both sides of the border.

Filled with quiet suspense, poetic soulfulness in songs like \"Ae Watan,\" and Alia Bhatt\'s unforgettable performance, Raazi is a masterpiece of patriotic cinema.',
    `updated_at` = NOW()
WHERE `slug` = 'raazi-2018' OR `id` = 47;

-- -----------------------------------------------------------------------------
-- [48] Gully Boy (2019) | Content Length: 2019 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Gully Boy is Zoya Akhtar\'s vibrant, culturally explosive coming-of-age musical drama that brought India\'s underground street-hop revolution into the mainstream cultural spotlight. Inspired by the real-life journeys of Mumbai street rappers Divine and Naezy, the film chronicles the life of Murad Ahmed, portrayed with simmering internal rage, poetic sensitivity, and undeniable swag by Ranveer Singh. Murad is a twenty-two-year-old college student living in a cramped tin-roofed shanty in Mumbai\'s sprawling Dharavi slum, struggling under the weight of his conservative father\'s demands, domestic abuse, and the suffocating feeling that his social background defines his destiny.

Murad channels his anger and acute observational insights into gritty Urdu-Hindi hip-hop poetry, finding a lifeline when he encounters Shrikant Bhosle, famously known as \"MC Sher\" and played with infectious generosity, swagger, and brotherly warmth by Siddhant Chaturvedi in an electric breakout performance. MC Sher welcomes Murad into Mumbai\'s underground rap battles, mentoring him to find his authentic voice as \"Gully Boy.\" Murad\'s personal world is further ignited by Safeena Firdausi, portrayed with fiery possessiveness, unfiltered humor, and fierce ambition by Alia Bhatt. Safeena is an aspiring surgeon from a conservative Muslim family whose explosive protectiveness over Murad provides some of the film\'s funniest and most memorable moments. As Murad navigates a part-time job as a chauffeur for the wealthy, tensions with his abusive father Aftab, played with stern realism by Vijay Raaz, and a brief creative connection with wealthy music-production student Sky, played by Kalki Koechlin, he realizes that his music speaks for millions of marginalized youth fighting to claim their space in the sun, culminating in an electric performance of \"Apna Time Aayega.\"

With its authentic street jargon, energetic beats, and deeply empathetic social vision, Gully Boy is a modern triumph of youthful rebellion and artistic passion.',
    `updated_at` = NOW()
WHERE `slug` = 'gully-boy-2019' OR `id` = 48;

-- -----------------------------------------------------------------------------
-- [49] War (2019) | Content Length: 1932 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'War is Siddharth Anand\'s adrenaline-charged, visually spectacular action thriller that united two of Indian cinema\'s greatest action superstars in a high-stakes, globetrotting battle of wits, military combat, and mind-bending espionage deceptions. The film revolves around Major Kabir Luthra, portrayed with rugged movie-star charisma, lethal physical precision, and enigmatic gravitas by Hrithik Roshan. Kabir is the Indian intelligence agency\'s most decorated covert operative who shocks the defense establishment when he suddenly turns rogue, assassinating a senior military officer and launching a series of high-profile hits across the globe.

To hunt down and neutralize the rogue commander, RAW chief Colonel Sunil Luthra, played with stern authority by Ashutosh Rana, assigns Captain Khalid Rahmani, portrayed with intense agility, physical power, and boyish devotion by Tiger Shroff. Khalid is a fiercely patriotic soldier who owes his elite combat training to Kabir, yet carries the heavy stigma of his late father\'s treason. Khalid accepts the mission to eliminate his mentor, sparking a breathless pursuit that spans thrilling car chases on freezing Arctic ice, rooftop shootouts in Morocco, and luxury motorcycle duels on Portuguese mountain highways. Adding emotional resonance to Kabir\'s mission is Naina, played with elegance by Vaani Kapoor, a civilian dancer recruited by Kabir into an undercover operation with tragic consequences. As Khalid corners Kabir, the narrative delivers a breathtaking plot twist regarding plastic surgery, identity theft, and a treacherous double agent named Saurabh, forcing the two combatants into an explosive, brutal hand-to-hand climax inside a collapsing church in Italy.

Packed with jaw-dropping stunts, slick international cinematography, and the sensational dance battle \"Jai Jai Shivshankar,\" War set new box-office records and delivered pure adrenaline-fueled entertainment.',
    `updated_at` = NOW()
WHERE `slug` = 'war-2019' OR `id` = 49;

-- -----------------------------------------------------------------------------
-- [50] Zindagi Na Milegi Dobara (2011) | Content Length: 2103 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Zindagi Na Milegi Dobara is Zoya Akhtar\'s sublime, universally cherished coming-of-age comedy-drama that celebrates friendship, self-discovery, and the profound liberation of living in the present moment. Set against the sun-kissed, picturesque landscapes of Spain, the story follows three childhood friends who reunite for a three-week road trip before one of them ties the knot, agreeing to a unique pact where each friend selects an extreme adventure sport that the other two must participate in without knowing in advance.

The emotional depth of the journey is anchored by the distinct internal struggles of the three friends. Arjun Saluja, played with intense focus and gradual emotional thawing by Hrithik Roshan, is a workaholic London financial broker whose obsession with accumulating wealth has blinded him to personal happiness and strained his friendships. Kabir Dewan, played with easygoing warmth and subtle anxiety by Abhay Deol, is an architect who has impulsively proposed to his wealthy girlfriend Natasha Arora, played with hilarious, neurotic possessiveness by Kalki Koechlin, only to realize he is terrified of marriage. Imran Qureshi, portrayed with irrepressible wit, charm, and hidden melancholy by Farhan Akhtar, is an advertising copywriter and poet who uses humor to mask deep emotional pain as he secretly searches for his estranged biological father, played in a moving cameo by Naseeruddin Shah. Along the way, the friends encounter Laila, portrayed with radiant freedom, wisdom, and bohemian joy by Katrina Kaif. As a diving instructor, Laila guides Arjun through an unforgettable deep-sea diving experience in Costa Brava that breaks his emotional walls and transforms his outlook on life. Between skydiving in Seville, the exhilarating Tomatina festival in Buñol, and running with the bulls in Pamplona, the friends confront their deepest fears, forgive past betrayals, and embrace the beauty of existence.

Filled with soulful poetry, breathtaking scenery, and infectious camaraderie, Zindagi Na Milegi Dobara remains a timeless cinematic celebration of life and love.',
    `updated_at` = NOW()
WHERE `slug` = 'zindagi-na-milegi-dobara-2011' OR `id` = 50;

-- -----------------------------------------------------------------------------
-- [51] Super 30 (2019) | Content Length: 2083 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Super 30 is Vikas Bahl\'s deeply inspiring biographical drama that chronicles the extraordinary, uphill struggle of acclaimed Patna-based mathematician Anand Kumar, who revolutionized education for underprivileged children in India. Portrayed with humble warmth, fiery determination, and heartfelt conviction by Hrithik Roshan, Anand is a brilliant lower-middle-class student whose exceptional mathematical genius earns him an admission offer to the prestigious Cambridge University; however, extreme poverty and the sudden death of his postal-worker father leave the family unable to afford the travel fare, forcing Anand to sell papads on the dusty streets of Bihar to survive.

Anand\'s fortunes initially take a lucrative turn when he is hired by Lallan Singh, played with oily corporate arrogance by Aditya Srivastava, to teach at the prestigious Excellence Coaching Institute, catering to the wealthy children of politicians and businessmen. Yet, Anand\'s conscience is deeply troubled when he realizes that education in India has become a commercial monopoly designed to keep the poor marginalized, remembering his late father\'s words: \"The king\'s son will no longer become king; only the one who deserves it will become king.\" Anand shocks the city by quitting his high-paying job, establishing a free residential coaching program called \"Super 30\" to train thirty exceptionally talented but impoverished children—sons and daughters of sweepers, rickshaw pullers, and daily-wage laborers—for the grueling IIT-JEE entrance examination. Supported by his loyal younger brother Pranav, played by Nandish Sandhu, and former flame Supriya, played by Mrunal Thakur, Anand provides food, shelter, and innovative practical teaching methods to the students, braving violent armed attacks and assassination attempts orchestrated by corrupt education minister Shriram Singhal, played with cynical menace by Pankaj Tripathi.

Filled with emotional triumphs, student empowerment, and Ajay-Atul\'s stirring music, Super 30 is a powerful cinematic salute to the democratizing power of education.',
    `updated_at` = NOW()
WHERE `slug` = 'super-30-2019' OR `id` = 51;

-- -----------------------------------------------------------------------------
-- [52] Animal (2023) | Content Length: 2028 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Animal is Sandeep Reddy Vanga\'s intense, hyper-violent, and emotionally turbulent action drama that explores the dark psychological depths of toxic masculinity, multi-generational trauma, and an all-consuming obsession with filial devotion. The story centers on Ranvijay Singh, portrayed with unhinged intensity, manic charisma, and physical ferocity by Ranbir Kapoor in one of the most polarizing and talked-about performances in modern Indian cinema. Ranvijay is the billionaire heir to Swastik Steel, India\'s largest industrial conglomerate, who grows up carrying deep psychological scars caused by the emotional absence of his workaholic father.

His father, Balbir Singh, played with quiet corporate coldness and weary aristocratic detachment by veteran superstar Anil Kapoor, continually brushes aside his son\'s desperate longing for affection, sending Ranvijay to an American boarding school after violent teenage outbursts. Years later, after living in the United States with his outspoken, resilient wife Geetanjali, played with fiery emotional strength by Rashmika Mandanna, Ranvijay rushes back to India upon learning that an unknown assassin has shot his father. Vowing to slaughter anyone who dares threaten his father\'s life, Ranvijay transforms into an uncontrollable force of retribution, assembling an army of loyal Punjabi cousins and commissioning military-grade heavy machine guns to purge Mumbai\'s underworld. The conflict reaches a savage fever pitch when Ranvijay uncovers the mastermind behind the assassination attempt: his mute, feral estranged cousin Abrar Haque, portrayed with terrifying physical presence and menacing brutality by Bobby Deol in a career-reviving cameo. As Ranvijay\'s blood-soaked crusade destroys his marriage, sanity, and family peace, he is forced into a tragic realization that his father\'s love was an illusion he destroyed himself to chase.

With its relentless pacing, viral musical score, and uncompromising vision, Animal emerged as a massive global box-office blockbuster.',
    `updated_at` = NOW()
WHERE `slug` = 'animal-2023' OR `id` = 52;

-- -----------------------------------------------------------------------------
-- [53] Rockstar (2011) | Content Length: 2016 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Rockstar is Imtiaz Ali\'s deeply soulful, tragic musical masterpiece that explores the destructive, transcendent connection between human heartbreak, artistic genius, and spiritual liberation. The film charts the tumultuous journey of Janardhan \"Jordan\" Jakhar, portrayed with raw vulnerability, explosive physical energy, and heartbreaking pathos by Ranbir Kapoor in a legendary, career-defining performance. Janardhan is a simple, naive Jat college student from Delhi who dreams of becoming a world-famous rock musician, but is mocked by friends who tell him that all great art and soulful music are born from deep, agonizing pain.

In his desperate quest to experience heartbreak, Janardhan deliberately courts Heer Kaul, played with radiant, melancholic grace by Nargis Fakhri. Heer is St. Stephen\'s College\'s untouchable, high-society \"bad girl\" who is preparing for an arranged wedding in Prague. The two forge an uninhibited, chaotic friendship that sparks an unspoken, all-consuming passion before Heer marries and moves to Europe. Expelled from his family home, Janardhan finds spiritual refuge inside the Nizamuddin Dargah, where his raw voice begins to absorb mystical Sufi rhythms. Aided by local music manager Khatana, played with warm sincerity by Kumud Mishra, and recognized by veteran classical maestro Ustad Jameel Khan, played in an iconic final film appearance by Shammi Kapoor, Janardhan transforms into \"Jordan\"—a volatile, anti-establishment rock phenomenon whose electrifying stage performances take the world by storm. However, when Jordan reunites with Heer in Prague, discovering that she is suffering from a terminal bone-marrow illness and that only his presence keeps her alive, their passionate, forbidden love ignites a public scandal, driving Jordan into self-destructive madness as his music reaches heights of cosmic ecstasy.

Elevated by A. R. Rahman\'s greatest musical soundtrack and Mohit Chauhan\'s haunting vocals, Rockstar is an immortal cinematic ballad of love and rebellion.',
    `updated_at` = NOW()
WHERE `slug` = 'rockstar-2011' OR `id` = 53;

-- -----------------------------------------------------------------------------
-- [54] Bajrangi Bhaijaan (2015) | Content Length: 2031 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Bajrangi Bhaijaan is Kabir Khan\'s heartwarming, critically acclaimed cross-border comedy-drama that champions human empathy, peace, and the triumph of pure love over religious and political borders. The story centers on Pawan Kumar Chaturvedi, affectionately known as \"Bajrangi,\" portrayed with boundless honesty, childlike innocence, and immense warmth by Salman Khan in one of his most beloved performances. Bajrangi is a devout, upright follower of Lord Hanuman living in Delhi who refuses to tell a lie or enter a house without permission.

Bajrangi\'s peaceful existence is upended during a religious festival when he encounters Shahida, nicknamed \"Munni\" and played with angelic innocence and expressive silent beauty by child actress Harshaali Malhotra. Munni is a six-year-old mute girl from a picturesque mountain village in Pakistani Kashmir who was accidentally separated from her mother at an Indian railway station during their journey home from Delhi\'s Nizamuddin Dargah. When corrupt travel agents attempt to sell the helpless child, Bajrangi takes it upon himself to personally escort Munni back to Pakistan without a passport, visa, or official clearance, guided solely by moral duty and his love for the girl. Supported by his sensible fiancée Rasika, played with radiant warmth by Kareena Kapoor Khan, Bajrangi crosses the desert border into Pakistan, where his naive honesty draws the suspicion of Pakistani security forces. Along his perilous journey, Bajrangi is joined by Chand Nawab, portrayed with hilarious deadpan timing and heartfelt journalism by Nawazuddin Siddiqui. Chand Nawab is a struggling Pakistani television reporter who initially covers Bajrangi\'s arrest for a viral story, but soon recognizes the purity of his mission, using his broadcast to rally ordinary Pakistani citizens to protect Bajrangi and guide Munni home.

Filled with emotional warmth, memorable music like \"Bhar Do Jholi Meri,\" and a triumphant border finale, Bajrangi Bhaijaan is a timeless cinematic bridge of unity and hope.',
    `updated_at` = NOW()
WHERE `slug` = 'bajrangi-bhaijaan-2015' OR `id` = 54;

-- -----------------------------------------------------------------------------
-- [55] Sultan (2016) | Content Length: 2020 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Sultan is Ali Abbas Zafar\'s inspiring, hard-hitting sports drama that explores the themes of personal redemption, humility, and the unbreakable resilience of the human heart inside and outside the combat arena. The story chronicles the life of Sultan Ali Khan, portrayed with extraordinary physical transformation, emotional vulnerability, and raw power by Salman Khan. Sultan is a charming, aimless middle-aged man from the small town of Rewari in Haryana who spends his youth flying kites and doing casual jobs until his heart is struck by love.

His life finds purpose when he falls for Aarfa Hussain, played with fiery independence, athletic excellence, and dignity by Anushka Sharma. Aarfa is a state-level wrestling champion who trains at her father\'s traditional akhara and dreams of winning Olympic gold for India; when Sultan proposes to her, Aarfa rebuffs him, declaring that she can only respect an accomplished equal, not an aimless slacker. Stung by her rejection, Sultan dedicates his life to the grueling discipline of wrestling, mastering the mud pit to win the state title, national championships, and ultimately an Olympic Gold medal at the 2012 London Games. However, his meteoric rise fuels arrogant complacency, causing Sultan to prioritize commercial fame over family, leading to a tragic personal loss that shatters his marriage and causes Aarfa to leave him. A decade later, broken, overweight, and living in regret, Sultan is approached by Aakash Oberoi, played by Amit Sadh, a struggling promoter who invites Sultan to join a high-stakes Mixed Martial Arts (MMA) tournament in Delhi. Under the relentless training of veteran combat coach Fateh Singh, played with weathered toughness by Randeep Hooda, Sultan undertakes an agonizing comeback, battling younger, brutal international cage fighters to earn back his self-respect and Aarfa\'s forgiveness.

With Vishal-Shekhar\'s rousing soundtrack and authentic wrestling choreography, Sultan is an emotionally gripping celebration of second chances.',
    `updated_at` = NOW()
WHERE `slug` = 'sultan-2016' OR `id` = 55;

-- -----------------------------------------------------------------------------
-- [56] Tiger 3 (2023) | Content Length: 1988 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Tiger 3 is Maneesh Sharma\'s explosive, high-stakes espionage action spectacle that expands the Yash Raj Films Spy Universe, uniting intense personal stakes with gripping international diplomacy. The story catches up with legendary Indian Research and Analysis Wing (RAW) super-agent Avinash Singh Rathore, universally known as \"Tiger,\" portrayed with commanding physical power, world-weary charisma, and unyielding patriotic devotion by Salman Khan, and his lethal wife Zoya Humaimi, played with breathtaking martial arts prowess, elegance, and emotional strength by Katrina Kaif.

Having retired to a quiet family life with their young son Junior, Tiger and Zoya are violently thrust back into global conflict when a perilous mission in St. Petersburg reveals a terrifying conspiracy aimed at toppling the Pakistani democracy. The mastermind behind the plot is Aatish Rehman, portrayed with chilling malice, psychological intelligence, and bitter personal vengeance by Emraan Hashmi. Aatish is a former deputy director of Pakistan\'s ISI and Zoya\'s former mentor, who blames Tiger and Zoya for the death of his pregnant wife during a past covert operation. Aatish orchestrates an elaborate trap that frames Tiger and Zoya as traitors to their respective nations, blackmailing them into executing an impossible heist inside Istanbul\'s highest-security vaults to secure nuclear missile launch codes. With RAW chief Colonel Sunil Luthra, played by Ashutosh Rana, under orders to eliminate them, Tiger and Zoya must navigate high-octane shootouts in Austria, daring escapes from a maximum-security Siberian gulag—featuring an electrifying rescue cameo by Shah Rukh Khan\'s Pathaan—and a desperate race against time inside the Pakistani Prime Minister\'s palace in Islamabad to prevent a catastrophic military coup.

Featuring heart-stopping practical action sequences, dynamic spycraft, and the powerhouse duo of Salman and Katrina, Tiger 3 delivers an adrenaline-fueled theatrical blockbuster.',
    `updated_at` = NOW()
WHERE `slug` = 'tiger-3-2023' OR `id` = 56;

-- -----------------------------------------------------------------------------
-- [57] Jab We Met (2007) | Content Length: 1993 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Jab We Met is Imtiaz Ali\'s radiant, timeless romantic comedy that captured the hearts of millions across India, redefining the romance genre with its infectious optimism, memorable dialogue, and irresistible characters. The story begins on a late-night train departing Mumbai, where two young travelers from entirely different emotional universes cross paths. Aditya Kashyap, portrayed with gentle melancholy, restrained elegance, and soulful vulnerability by Shahid Kapoor, is a severely depressed young industrialist who has walked away from his corporate empire, family disputes, and romantic betrayal, contemplating ending his life.

His dark world is permanently derailed by Geet Dhillon, played with incandescent energy, non-stop banter, and charming eccentricity by Kareena Kapoor Khan in one of the most iconic, celebrated comedic performances in Indian cinema history. Geet is an irrepressible Punjabi girl from Bhatinda who believes that life is a grand celebration and that one should follow one\'s heart without regret. When Aditya misses the train at an isolated railway station and Geet jumps off to rescue him, the two become stranded in the rural heartlands of Madhya Pradesh, embarking on an unforgettable road trip in a taxi and cycle-rickshaw toward Punjab. As Aditya spends time with Geet and her colorful, affectionate joint family in Bhatinda—led by grand patriarch Dara Singh—Geet\'s joyful philosophy breathes new life into Aditya\'s broken spirit. Aditya repays her kindness by helping Geet elope to the snowy mountains of Manali to marry her lover Anshuman, played with narcissistic coldness by Tarun Arora. However, when Anshuman cruelly rejects Geet, sending her into a downward spiral of depression in Shimla, it is a revitalized Aditya who steps in to restore her joyful light, realizing where true love truly belongs.

Boasting Pritam\'s chart-topping musical soundtrack and the infectious anthem \"Mauja Hi Mauja,\" Jab We Met is an undisputed modern romance classic.',
    `updated_at` = NOW()
WHERE `slug` = 'jab-we-met-2007' OR `id` = 57;

-- -----------------------------------------------------------------------------
-- [58] Jaane Jaan (2023) | Content Length: 1924 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Jaane Jaan is Sujoy Ghosh\'s atmospheric, razor-sharp psychological mystery thriller adapted from Keigo Higashino\'s acclaimed novel The Devotion of Suspect X. Set against the misty, rain-drenched hills and shadowy colonial pine forests of Kalimpong in West Bengal, the film explores how far the human mind will go to protect someone it quietly adores through the power of cold logic, geometry, and sacrifice.

The story centers on Maya D\'Souza, portrayed with understated elegance, suppressed terror, and protective maternal warmth by Kareena Kapoor Khan. Maya is a single mother working as a modest chef at a local café called Tiffin, living a quiet life with her young daughter Tara. Her peaceful existence is shattered when her abusive, estranged ex-husband Ajit Mhatre, a corrupt Mumbai policeman, tracks her down to extort money and sexually assault her. In a desperate act of self-defense, Maya and Tara accidentally kill him during a violent scuffle in their small apartment. Hearing the commotion through the thin apartment walls, their reclusive next-door neighbor, Naren Vyas, played with mesmerizing, socially awkward brilliance and tragic stillness by Jaideep Ahlawat, arrives at her door. Naren is a genius mathematics teacher at the local boys\' school who lives in absolute isolation, holding a silent, reverent affection for Maya. Refusing to let Maya go to prison, Naren uses his formidable mathematical intellect to devise an airtight alibi and body-disposal strategy that anticipates every move of the police. The investigation heats up when sharp Mumbai police detective Karan Anand, played with swaggering charm and razor-sharp intuition by Vijay Varma, arrives in town, initiating a high-stakes battle of wits between two old college acquaintances.

With its brooding cinematography, tense pacing, and shocking emotional twist, Jaane Jaan is a masterclass in psychological suspense and selfless devotion.',
    `updated_at` = NOW()
WHERE `slug` = 'jaane-jaan-2023' OR `id` = 58;

-- -----------------------------------------------------------------------------
-- [59] Jurassic Park (1993) | Content Length: 2072 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Jurassic Park is Steven Spielberg\'s monumental, Oscar-winning science fiction adventure blockbuster that revolutionized cinematic special effects and introduced audiences to the terrifying majesty of living dinosaurs. Adapted from Michael Crichton\'s bestselling novel, the story follows eccentric billionaire visionary John Hammond, played with whimsical warmth and blind corporate arrogance by Richard Attenborough, who utilizes cutting-edge genetic engineering and fossilized amber mosquitoes to clone living dinosaurs on the secluded Central American island of Isla Nublar.

To certify the safety of his revolutionary theme park before investors pull out, Hammond invites a diverse group of skeptical scientific experts and his two young grandchildren to tour the facilities. Dr. Alan Grant, played with rugged authenticity and quiet warmth by Sam Neill, is a world-renowned paleontologist whose initial scientific wonder quickly transforms into fierce protective instincts as he guides Hammond\'s terrified grandchildren, Lex and Tim, across prehistoric jungles. Dr. Ellie Sattler, played with fiery intelligence and physical bravery by Laura Dern, is a passionate paleobotanist who challenges Hammond\'s dangerous delusion that mankind can control nature. Dr. Ian Malcolm, played with eccentric wit, magnetic charisma, and iconic dry humor by Jeff Goldblum, is a mathematician specializing in Chaos Theory who delivers the film\'s prophetic warnings about the catastrophic arrogance of genetic tampering. Disaster strikes during a severe tropical storm when disgruntled chief computer programmer Dennis Nedry, played with despicable comedic greed by Wayne Knight, deactivates the island\'s high-voltage security grids to steal frozen dinosaur embryos, unleashing a towering Tyrannosaurus Rex and a pack of terrifyingly intelligent Velociraptors into the night.

Powered by John Williams\'s majestic, timeless musical score and groundbreaking animatronic and digital visual effects, Jurassic Park remains one of the greatest cinematic achievements in entertainment history.',
    `updated_at` = NOW()
WHERE `slug` = 'jurassic-park-1993' OR `id` = 59;

-- -----------------------------------------------------------------------------
-- [60] Schindler's List (1993) | Content Length: 2001 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Schindler\'s List is Steven Spielberg\'s monumental, deeply reverent historical masterpiece that chronicles one of the darkest chapters in human history with unflinching honesty, moral clarity, and profound emotional power. Shot in devastatingly beautiful, stark black-and-white cinematography by Janusz Kamiński, the film recounts the true story of Oskar Schindler, played by Liam Neeson in a towering performance of complex moral transformation. Initially arriving in Nazi-occupied Kraków during World War II as a charming, opportunistic German businessman eager to amass a war fortune through cheap Jewish labor in his enamelware factory, Schindler gradually undergoes a profound spiritual awakening as he witnesses the horrific liquidation of the Kraków Ghetto.

The moral core of the narrative is anchored by the powerful relationship between Schindler and his Jewish factory manager, Itzhak Stern, portrayed with understated dignity, quiet intellect, and deep soulfulness by Sir Ben Kingsley. It is Stern who serves as Schindler\'s moral compass, tactfully manipulating bureaucratic paperwork to recruit educated, vulnerable Jewish men, women, and children into the safety of the factory as \"essential workers.\" In chilling contrast stands SS Commandant Amon Göth, portrayed with terrifying, cold-blooded psychopathy by Ralph Fiennes. Göth embodies the senseless, depraved cruelty of the Nazi regime, shooting innocent prisoners from the balcony of his villa overlooking the Plaszów concentration camp for sport. Recognising that money is his only weapon against Göth\'s bloodlust, Schindler spends his entire vast fortune bribing Nazi officials, ultimately purchasing the freedom of more than 1,100 Jewish lives, recorded meticulously on a list that Stern famously declares \"is absolute good; this list is life.\"

Awarded seven Academy Awards, including Best Picture and Best Director, Schindler\'s List is an enduring cinematic testament to the courage of human compassion amidst unfathomable evil.',
    `updated_at` = NOW()
WHERE `slug` = 'schindlers-list-1993' OR `id` = 60;

-- -----------------------------------------------------------------------------
-- [61] Pulp Fiction (1994) | Content Length: 2057 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Pulp Fiction is Quentin Tarantino\'s groundbreaking, Oscar-winning neo-noir black comedy crime masterpiece that permanently reshaped modern cinematic storytelling with its non-linear chronology, razor-sharp pop-culture dialogue, and unforgettable eccentric characters. Set across the criminal underbelly of Los Angeles, the film seamlessly intertwines three distinct, overlapping narratives of crime, redemption, and absurd coincidence.

The film\'s vibrant tapestry is woven together by an iconic ensemble of criminal figures. Vincent Vega, played by John Travolta in a career-reviving performance of laid-back charm and cool lethargy, is a heroin-using mob enforcer paired with his partner Jules Winnfield, played with electrifying intensity and philosophical gravitas by Samuel L. Jackson. Jules experiences what he believes is divine intervention when bullets miraculously miss them during an execution, prompting him to contemplate renouncing his violent criminal life to walk the earth in search of spiritual peace. Vincent is tasked by his terrifying crime boss, Marsellus Wallace, played with imposing authority by Ving Rhames, with entertaining Marsellus\'s glamorous, drug-addled wife Mia Wallace, played with magnetic, playful allure by Uma Thurman; their evening at a retro 1950s diner leads to an iconic dance contest and a frantic, heart-stopping medical emergency. Meanwhile, Butch Coolidge, played with rugged grit by Bruce Willis, is an aging prizefighter who takes a large bribe from Marsellus to throw a boxing match, only to double-cross the mob, bet on himself, and flee across town to retrieve his father\'s cherished gold watch. Additional colorful characters—including the elegant underworld problem-solver Winston Wolfe (Harvey Keitel) and nervous armed diner robbers Pumpkin (Tim Roth) and Honey Bunny (Amanda Plummer)—enrich this kinetic, hyper-stylish criminal universe.

With its iconic surf-rock soundtrack and genre-defining storytelling, Pulp Fiction remains one of the most influential and widely quoted films in cinema history.',
    `updated_at` = NOW()
WHERE `slug` = 'pulp-fiction-1994' OR `id` = 61;

-- -----------------------------------------------------------------------------
-- [62] Titanic (1997) | Content Length: 2173 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Titanic is James Cameron\'s breathtaking, record-shattering romantic disaster epic that captured the imagination of the entire world, winning eleven Academy Awards and becoming the first film in history to gross over one billion dollars. Set aboard the ill-fated British luxury liner RMS Titanic during its tragic maiden voyage across the North Atlantic in April 1912, the film weaves an unforgettable, heart-wrenching love story against the catastrophic historical sinking of the \"ship of dreams.\"

The emotional heartbeat of the story belongs to two young passengers from opposite ends of a rigid class divide. Jack Dawson, portrayed with radiant charm, artistic passion, and boundless optimism by Leonardo DiCaprio, is a penniless, free-spirited third-class American artist who wins his ticket in a lucky poker game. Rose DeWitt Bukater, played with luminous grace, fierce intelligence, and rebellious strength by Kate Winslet, is a seventeen-year-old first-class passenger suffocating under the snobbish expectations of high society and an arranged engagement to Caledon \"Cal\" Hockley, played with arrogant, venomous entitlement by Billy Zane. When Jack saves Rose from leaping off the ship\'s stern in despair, a passionate romance blossoms between them, exposing the stark contrast between the joyful, uninhibited dancing of the steerage compartment and the stuffy, hypocritical dining salons of the upper crust. Rose\'s snobbish mother Ruth, played by Frances Fisher, ruthlessly pressures Rose to marry Cal to save the family from financial ruin, while the kindhearted \"Unsinkable\" Molly Brown, played with warm humor by Kathy Bates, offers Jack dignity and encouragement. When the colossal vessel collides with a massive iceberg on a moonless night, the ship\'s designer Thomas Andrews (Victor Garber) and Captain Edward Smith (Bernard Hill) realize with horror that the ship is doomed, setting off an epic struggle for survival where Jack and Rose fight to stay together amidst freezing waters.

With Celine Dion\'s haunting anthem \"My Heart Will Go On\" and groundbreaking historical recreations, Titanic remains an undisputed pinnacle of cinematic romance and tragedy.',
    `updated_at` = NOW()
WHERE `slug` = 'titanic-1997' OR `id` = 62;

-- -----------------------------------------------------------------------------
-- [63] Avatar (2009) | Content Length: 2220 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Avatar is James Cameron\'s revolutionary, visually magnificent science fiction blockbuster that pushed the frontiers of cinematic 3D technology and became the highest-grossing film of all time. Set in the mid-twenty-second century on Pandora, a breathtaking, bioluminescent alien moon orbiting a distant gas giant, the story explores the clash between human industrial greed and the sacred ecological harmony of an indigenous civilization.

The epic narrative centers on Jake Sully, played with raw vulnerability and fierce conviction by Sam Worthington. Jake is a paralyzed former Marine whose deceased twin brother\'s genetic code allows him to operate an \"Avatar\"—a genetically engineered body blending human DNA with that of the Na\'vi, the tall, blue-skinned humanoid species native to Pandora. Initially sent on a reconnaissance mission by ruthless military commander Colonel Miles Quaritch, played with terrifying, gravelly intensity by Stephen Lang, and corporate administrator Parker Selfridge, played by Giovanni Ribisi, Jake is tasked with infiltrating the Omaticaya clan to persuade them to abandon their ancestral Hometree, which sits atop a massive deposit of the precious mineral unobtanium. While exploring Pandora\'s perilous, glowing rainforests, Jake is rescued by Neytiri, portrayed with extraordinary emotional depth and physical power through motion-capture by Zoe Saldana. Neytiri, a fierce Na\'vi warrior and daughter of the clan leaders, teaches Jake the spiritual ways of Eywa, the living goddess connecting all Pandoran life. As Jake learns to hunt, tame a winged banshee, and perceive the sacred balance of nature, he falls deeply in love with Neytiri, ultimately rejecting his human commanders to lead the indigenous clans in a desperate war of liberation. Dr. Grace Augustine, played with chain-smoking scientific passion by Sigourney Weaver, and brave helicopter pilot Trudy Chacon, played by Michelle Rodriguez, join Jake\'s rebellion, risking their lives to protect the moon\'s soul.

With its awe-inspiring visual effects, rich alien ecosystem, and timeless message of environmental stewardship, Avatar created an unforgettable cinematic universe that continues to enchant audiences worldwide.',
    `updated_at` = NOW()
WHERE `slug` = 'avatar-2009' OR `id` = 63;

-- -----------------------------------------------------------------------------
-- [64] RRR (2022) | Content Length: 2117 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'RRR (Rise Roar Revolt) is S. S. Rajamouli\'s earth-shattering, Oscar-winning Telugu action epic that became a massive global phenomenon, celebrated worldwide for its breathtaking imaginative scale, emotional brotherhood, and mind-boggling action sequences. Set in 1920 during the brutal height of the British Raj in India, the film crafts an extraordinary fictional friendship between two legendary real-life Indian revolutionaries who fought against colonial tyranny.

Komaram Bheem, portrayed with raw physical power, innocent heart, and roaring animalistic intensity by N. T. Rama Rao Jr., is the fearless guardian of the Gond tribe. Bheem journeys to Delhi disguised as a Muslim mechanic named Akhtar, determined to rescue Malli, a sweet young tribal girl who was ruthlessly abducted from her mother by the cruel British Governor Scott Buxton, played with cold sadism by Ray Stevenson, and his vicious wife Lady Scott, played by Alison Doody. In Delhi, Bheem crosses paths with Alluri Sitarama Raju, played with ferocious martial precision, steely gaze, and intense emotional complexity by Ram Charan. Rama Raju is an elite, seemingly ruthless Indian officer serving in the British Imperial Police who is secretly harboring a sacred, long-term mission to acquire British weapons for his village rebels. Following an extraordinary sequence where the two strangers leap from a burning bridge to rescue a child from a train wreck, Rama and Bheem become inseparable brothers, unaware of each other\'s secret identities. The emotional stakes explode during an astonishing palace raid where Bheem unleashes a menagerie of wild jungle beasts against British elites, forcing Rama into a tragic confrontation between his duty and his love for Bheem. Supported by Alia Bhatt as Rama\'s devoted fiancée Sita and Olivia Morris as the kindhearted British noblewoman Jenny, their brotherhood eventually unites in an explosive, mythological climax.

Winning the Academy Award for Best Original Song for the viral dance sensation \"Naatu Naatu,\" RRR is a monumental cinematic spectacle celebrating liberation, valor, and brotherhood.',
    `updated_at` = NOW()
WHERE `slug` = 'rrr-2022' OR `id` = 64;

-- -----------------------------------------------------------------------------
-- [65] Baahubali 2: The Conclusion (2017) | Content Length: 2011 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Baahubali 2: The Conclusion is S. S. Rajamouli\'s historic, record-shattering Telugu fantasy epic that concluded Indian cinema\'s greatest cinematic duology, answering the world\'s most viral pop-culture question: \"Why did Kattappa kill Baahubali?\" Set in the ancient, opulent kingdom of Mahishmati, the film spans generations of royal intrigue, supreme martial heroism, tragic misunderstandings, and ultimate vengeance.

The heart of the story belongs to Amarendra Baahubali, portrayed with god-like majesty, playful charm, and unmatched warrior prowess by Prabhas. Beloved by the common people of Mahishmati for his justice and compassion, Amarendra is named crown prince by Queen Mother Sivagami, played with imperious dignity and fierce conviction by Ramya Krishnan. While touring the provinces in disguise, Amarendra falls deeply in love with Devasena, played with fierce warrior pride, sharp intellect, and radiant beauty by Anushka Shetty, the princess of the neighboring Kuntala Kingdom. However, Amarendra\'s ascending glory ignites the venomous jealousy of his tyrannical cousin Bhallaladeva, played with imposing physical menace and calculated treachery by Rana Daggubati, and Bhallala\'s scheming father Bijjaladeva, played by Nassar. Bhallaladeva manipulates Sivagami\'s proud decrees to strip Amarendra of the throne and banish him from the palace, though the people continue to worship Baahubali even in exile. Bhallala\'s ultimate conspiracy forces the loyal royal commander Kattappa, played with heartbreaking loyalty by Sathyaraj, into committing the unthinkable betrayal to protect the kingdom. Decades later, Amarendra\'s long-lost son Mahendra Baahubali (also played by Prabhas) returns to Mahishmati, leading a peasant uprising to liberate his chained mother Devasena and shatter Bhallaladeva\'s reign forever.

With M. M. Keeravani\'s thunderous musical score, breathtaking visual effects, and grand mythical storytelling, Baahubali 2 remains an undisputed pinnacle of Indian cinematic achievement.',
    `updated_at` = NOW()
WHERE `slug` = 'baahubali-2-the-conclusion-2017' OR `id` = 65;

-- -----------------------------------------------------------------------------
-- [226] Avengers: Doomsday (2026) | Content Length: 1885 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Avengers: Doomsday is Marvel Studios\' monumental, highly anticipated superhero crossover epic that marks the beginning of the end for the Multiverse Saga, bringing together Earth\'s Mightiest Heroes and legendary cosmic teams to face the ultimate universal threat. As destructive multiversal incursions begin colliding alternate realities into mutual annihilation, the brilliant and ruthless monarch of Latveria, Doctor Victor von Doom, portrayed with terrifying intellectual supremacy and volcanic charisma by Robert Downey Jr., steps forward to seize cosmic power, determined to forge an unyielding new order from the ashes of fractured dimensions.

The defense of reality is led by a new generation of heroic leaders and battle-hardened veterans. Sam Wilson, played with inspiring leadership and moral courage by Anthony Mackie, steps up as Captain America, rallying Earth\'s surviving heroes alongside the God of Thunder, Thor, played with mythic power and grief-stricken resolve by Chris Hemsworth. Joining the fray are the legendary Fantastic Four, led by Reed Richards / Mr. Fantastic, played with brilliant scientific intellect and paternal protectiveness by Pedro Pascal, and Sue Storm / Invisible Woman, played with formidable strength by Vanessa Kirby. Together with Doctor Stephen Strange, played with mystic mastery by Benedict Cumberbatch, and Shuri, played by Letitia Wright as the technologically advanced Black Panther of Wakanda, the heroes must navigate multiversal battlefields, confront alternate variants of fallen allies, and counter Doom\'s god-like sorcery and nano-tech armor before the timeline collapses entirely.

Packed with mind-bending cosmic action, emotional character reunions, and high-stakes philosophical dilemmas about free will versus totalitarian security, Avengers: Doomsday delivers an unforgettable theatrical spectacle of historic proportions.',
    `updated_at` = NOW()
WHERE `slug` = 'avengers-doomsday-2026' OR `id` = 226;

-- -----------------------------------------------------------------------------
-- [227] War 2 (2025) | Content Length: 1847 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'War 2 is the explosive, eagerly awaited espionage action sequel in the Yash Raj Films Spy Universe, uniting two of Indian cinema\'s biggest superstars in a high-stakes, cross-continental showdown of tactical warfare, personal sacrifice, and geopolitical intrigue. Following the covert events of previous missions, the story catches up with Major Kabir Luthra, portrayed with rugged charisma, deadly combat precision, and enigmatic gravitas by Hrithik Roshan. Kabir has gone deep underground on an unsanctioned global crusade to dismantle a shadowy international syndicate that profits from engineered conflicts across Asia.

To intercept Kabir before his unauthorized actions ignite an international crisis, the Indian intelligence leadership deploys Agent Vikram, portrayed with ferocious physical intensity, intense martial arts prowess, and commanding screen presence by N. T. Rama Rao Jr. in his massive Hindi cinematic debut. Vikram is a top-tier special operations commander whose relentless pursuit of mission objectives makes him an unstoppable force of nature. Guided by RAW chief Colonel Sunil Luthra, played with stern authority by Ashutosh Rana, and aided by an agile undercover operative played by Kiara Advani, Vikram tracks Kabir through high-speed powerboat chases in Venice, rooftop gun battles in Tokyo, and treacherous combat on snowy Himalayan glaciers. As the two elite warriors clash in bone-crushing hand-to-hand duels, they uncover a terrifying conspiracy involving biological weaponry and internal military betrayal, forcing them to question their orders and unite against the true puppet masters threatening millions of innocent lives.

Featuring jaw-dropping practical action choreography, breathtaking international locations, and electrifying musical dance sequences, War 2 is set to redefine blockbuster action cinema.',
    `updated_at` = NOW()
WHERE `slug` = 'war-2-2026' OR `id` = 227;

-- -----------------------------------------------------------------------------
-- [228] The Batman Part II (2026) | Content Length: 1899 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'The Batman Part II is Matt Reeves\' highly anticipated psychological neo-noir crime masterpiece that plunges audiences back into the shadowy, waterlogged streets of Gotham City as the Dark Knight faces an evolving criminal landscape. Picking up in the aftermath of the devastating flooding orchestrated by the Riddler, the story follows Bruce Wayne / Batman, portrayed with brooding intensity, detective genius, and raw vulnerability by Robert Pattinson, as he strives to transition from being a symbol of pure vengeance to becoming a true beacon of hope for Gotham\'s desperate working-class citizens.

Bruce\'s moral crusade faces immense challenges as institutional corruption festers in the power vacuum left behind. Oswald \"Oz\" Cobblepot, famously known as The Penguin and played with grotesque prosthetic brilliance, dark humor, and ruthless street ambition by Colin Farrell, moves aggressively to consolidate control over Gotham\'s fractured underworld, clashing with rival crime families and rogue vigilantes. Meanwhile, Lieutenant James Gordon, played with steadfast moral integrity and quiet exhaustion by Jeffrey Wright, struggles to purge a police department infected by cartel bribery. As mysterious murders targeting high-ranking city reformers shake the city, Batman\'s investigation leads him into the psychiatric depths of Arkham Asylum, where incarcerated criminal minds—including Edward Nashton (Paul Dano) and a mysterious giggling inmate (Barry Keoghan)—play psychological games with his sanity. Bruce must also navigate a dangerous reunion with Selina Kyle / Catwoman, played with magnetic allure and moral ambiguity by Zoë Kravitz, whose independent survival instincts challenge Batman\'s rigid code.

With its rain-soaked visual atmosphere, grounded detective procedurals, and complex character psychology, The Batman Part II promises an unforgettable, deeply cinematic crime saga.',
    `updated_at` = NOW()
WHERE `slug` = 'the-batman-part-ii-2026' OR `id` = 228;

-- -----------------------------------------------------------------------------
-- [229] Avatar: Fire and Ash (2026) | Content Length: 1872 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Avatar: Fire and Ash is James Cameron\'s breathtaking, visually revolutionary third chapter in the epic science fiction saga, expanding the wondrous moon of Pandora into untamed, perilous volcanic territories. Following the tragic battles of The Way of Water, the story continues with Jake Sully, played with battle-hardened resolve and protective paternal love by Sam Worthington, and Neytiri, portrayed with emotional ferocity and spiritual devotion by Zoe Saldana, as they strive to heal their grieving family while maintaining peace between the Na\'vi and the relentless human colonizers of the RDA.

The narrative introduces a dramatic new dimension to Pandoran culture through the Ash People, a nomadic Na\'vi clan dwelling in harsh volcanic regions who have rejected the peaceful ways of Eywa. Led by the formidable, ruthless chieftainess Varang, played with fiery intensity and magnetic physical presence by Oona Chaplin, the Ash People embrace power, destruction, and fire, forming a shocking alliance with human military forces seeking to exploit the moon\'s geothermal core. As Colonel Miles Quaritch, played with relentless tactical malice by Stephen Lang in his recombinant Na\'vi body, exploits this internal indigenous division to launch a coordinated scorched-earth offensive, Jake and Neytiri\'s surviving children—including the mystical, spiritually gifted Kiri (Sigourney Weaver) and courageous Lo\'ak (Britain Dalton)—must master new elemental creatures to defend their homeland. The conflict forces the Sully family to confront the painful truth that darkness exists within Pandora itself, challenging their fundamental faith in unity.

Pushing the technological boundaries of photorealistic underwater, airborne, and volcanic visual effects, Avatar: Fire and Ash delivers an emotionally staggering cinematic experience that redefines blockbuster filmmaking.',
    `updated_at` = NOW()
WHERE `slug` = 'avatar-fire-and-ash-2026' OR `id` = 229;

-- -----------------------------------------------------------------------------
-- [230] Spirit: The Unstoppable Force (2026) | Content Length: 1784 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Spirit: The Unstoppable Force is Sandeep Reddy Vanga\'s explosive, hard-hitting action-crime thriller that unites raw cinematic intensity with uncompromising character drama. The film stars Pan-Indian superstar Prabhas in a ferocious, transformative performance as ACP Vikram Raghavan, a ruthless, fiercely upright police officer whose uncompromising moral code and explosive temper make him an unstoppable juggernaut against societal corruption and organized crime.

Set across the grimy, neon-lit alleys and sprawling ports of a major coastal industrial metropolis, the narrative follows Raghavan as he is assigned to dismantle an international narcotics and firearms syndicate operating under the protection of high-ranking political elites and compromised law-enforcement officials. Unlike conventional police officers bound by bureaucratic protocol, Raghavan operates with unyielding brutality, deploying extreme physical force, psychological interrogation, and street-level tactical warfare to hunt down the cartel\'s inner circle. His aggressive methods ignite a multi-front war with the city\'s shadowy underworld kingpin, played with chilling menace by an acclaimed ensemble cast, while placing immense emotional strain on Raghavan\'s family and his principled superior officers. As corrupt officials conspire to frame Raghavan for extrajudicial killings, he strips away his badge to wage a one-man war of retribution, proving that true justice sometimes requires an uncontrollable, furious spirit willing to burn down the entire corrupt system to protect the innocent.

Featuring bone-crushing action choreography, a thumping background score, and Prabhas\'s towering screen presence, Spirit is an electrifying cinematic spectacle that promises to dominate box offices worldwide.',
    `updated_at` = NOW()
WHERE `slug` = 'spirit-2026' OR `id` = 230;

-- -----------------------------------------------------------------------------
-- [231] Dune: Messiah Part 1 (2026) | Content Length: 2051 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Dune: Messiah Part 1 is Denis Villeneuve\'s grand, tragic continuation of Frank Herbert\'s epic science fiction saga, chronicling the devastating consequences of charismatic leadership, galactic holy war, and supreme political power. Set twelve years after the events of Dune: Part Two, the story finds Paul Atreides, portrayed with haunting gravitas, intellectual burden, and prophetic torment by Timothée Chalamet, ruling as the undisputed Emperor of the Known Universe from his colossal fortress on the desert planet Arrakis.

However, the golden empire Paul envisioned has transformed into a living nightmare: the Fremen legions have unleashed a savage religious jihad across the stars in his name, claiming billions of lives despite his desperate efforts to control the fanaticism. Paul finds solace only in the company of Chani, played with profound emotional strength and tragic devotion by Zendaya, who remains his true love and moral compass while struggling to conceive an imperial heir. Meanwhile, Paul\'s formal political wife, Princess Irulan, played with calculating intellect and suppressed longing by Florence Pugh, joins a clandestine conspiracy with the displaced Bene Gesserit Sisterhood, led by Lady Jessica (Rebecca Ferguson) and Reverend Mother Mohiam, to neutralize Paul\'s bloodline before his prophetic visions reshape reality permanently. Adding to the intrigue is Alia Atreides, played with chilling divine fury by Anya Taylor-Joy, Paul\'s adult sister whose terrifying prescient abilities make her an unpredictable force in court politics. As a resurrected clone (ghola) of Paul\'s fallen mentor Duncan Idaho, played by Jason Momoa, arrives as an ambiguous gift, Paul must navigate an intricate web of poison, atomic plots, and religious fanaticism, knowingly walking toward a blinding destiny to free humanity from the myth of Muad\'Dib.

With its breathtaking visual architecture, Hans Zimmer\'s haunting musical themes, and deeply philosophical storytelling, Dune: Messiah Part 1 promises an unforgettable cinematic achievement.',
    `updated_at` = NOW()
WHERE `slug` = 'dune-messiah-2026' OR `id` = 231;

-- -----------------------------------------------------------------------------
-- [238] Ramayana: Part 1 (2026) | Content Length: 2055 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Ramayana: Part 1 is Nitesh Tiwari\'s monumental, visually magnificent mythological epic that brings the eternal Indian literary masterpiece to life with unprecedented technological scale, emotional reverence, and cinematic grandeur. The story chronicles the divine incarnation, righteous youth, and supreme moral trials of Lord Rama, portrayed with transcendent serenity, noble physical grace, and gentle wisdom by Ranbir Kapoor. As the beloved eldest prince of Ayodhya, Rama embodies the highest ideals of dharma, duty, and filial obedience in the ancient solar dynasty.

The first chapter of this epic trilogy explores the idyllic golden age of Ayodhya under King Dasharatha and the sacred swayamvara in Mithila, where Rama wins the hand of Goddess Sita, portrayed with radiant grace, spiritual strength, and profound dignity by Sai Pallavi. Their tender, pure bond becomes the moral foundation of the entire saga. However, courtly harmony is shattered when Queen Kaikeyi, manipulated by the venomous whispers of maid Manthara, demands Dasharatha fulfill ancient boons by banishing Rama to a fourteen-year forest exile and placing her son Bharata on the throne. Upholding his father\'s honor without hesitation, Rama departs for the wilderness accompanied by Sita and his fiercely loyal brother Lakshmana, trading royal silk for ascetic bark garments. In the dense jungles of Panchavati, their peaceful hermitage is threatened when the demoness Surpanakha attempts to kill Sita, sparking an escalating conflict with the demonic forces of Lanka. The epic reaches its devastating turning point with the arrival of Demon King Ravana, played with imposing physical majesty, ten-headed intellectual arrogance, and terrifying power by Yash, whose treacherous abduction of Sita sets the stage for the greatest war in cosmic history.

With state-of-the-art VFX from DNEG, majestic musical compositions by A. R. Rahman and Hans Zimmer, and timeless spiritual depth, Ramayana: Part 1 is a cultural milestone celebrating righteousness, devotion, and supreme courage.',
    `updated_at` = NOW()
WHERE `slug` = 'ramayana-part-1-2026' OR `id` = 238;

-- -----------------------------------------------------------------------------
-- [239] Wildwood (2026) | Content Length: 1866 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Wildwood is a magical, visually stunning stop-motion animated fantasy adventure directed by Travis Knight and crafted by the world-renowned artisans at LAIKA Studios. Adapted from the bestselling novel by Colin Meloy and Carson Ellis, the enchanting story takes place just beyond the modern city limits of Portland, Oregon, in an unexplored, fog-shrouded wilderness known to locals as the \"Impassable Wilderness\"—a forbidden forest where no human has dared tread for generations.

The adventure begins when Prue McKeel, voiced with feisty courage and determined loyalty by Peyton Elizabeth Lee, witnesses her baby brother Mac being snatched from his stroller by a terrifying murder of crows that carries him deep into the forbidden woods. Refusing to accept his loss, Prue embarks on a daring rescue mission into Wildwood, accompanied by her awkward, good-natured classmate Curtis Mehlberg, voiced by Jacob Tremblay. Once inside the magical perimeter, Prue and Curtis discover that the forest is not an empty woodland, but a secret, warring realm populated by talking animals, royal bird couriers, and eccentric forest bandits. The children are thrust into the center of a brutal political power struggle orchestrated by Alexandra, the Dowager Governess, voiced with icy aristocratic menace by Carey Mulligan. Alexandra is an exiled ruler who commands an army of sinister woodland creatures and schemes to sacrifice Mac in an ancient ritual to conquer the enchanted territory. To save her brother, Prue must navigate political alliances with the noble Crown Prince of the Birds and unite the fractured forest inhabitants before the balance of nature is permanently shattered.

Showcasing LAIKA\'s signature handcrafted stop-motion animation, breathtaking puppet design, and an inspiring message about courage and family loyalty, Wildwood is an instant family classic.',
    `updated_at` = NOW()
WHERE `slug` = 'wildwood-2026' OR `id` = 239;

-- -----------------------------------------------------------------------------
-- [240] The Hunger Games: Sunrise on the Reaping (2026) | Content Length: 1992 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'The Hunger Games: Sunrise on the Reaping is Francis Lawrence\'s gripping, emotionally charged dystopian prequel that takes audiences back to the brutal arenas of Panem, chronicling the legendary, tragic journey of a young Haymitch Abernathy during the historic Fiftieth Annual Hunger Games, known as the Second Quarter Quell. Set twenty-four years before Katniss Everdeen volunteered as tribute, the Capitol marks the Quarter Quell by issuing an unprecedented, horrifying decree: each district must send double the usual number of tributes, forcing forty-eight innocent children into a televised fight to the death.

The narrative centers on sixteen-year-old Haymitch Abernathy, a sharp-witted, fiercely rebellious young resident of the impoverished District 12 who dreams of building a quiet future with his family and sweetheart in the Seam. Reaped alongside three other District 12 youths—including Maysilee Donner, a courageous, sharp-shooting girl who forms a vital tactical alliance with Haymitch—he is thrust into the opulent, grotesque spectacle of the Capitol. Under the calculating, tyrannical gaze of a middle-aged President Coriolanus Snow, Haymitch quickly realizes that raw physical strength is useless in an arena designed to kill through psychological horror, poisonous beauty, and engineered muttations. Relying on his quick wit, acute observational skills, and defiance of Capitol authority, Haymitch uses the arena\'s forcefield mechanics against his adversaries, pulling off a shocking victory that humiliates President Snow. However, his defiance comes at an unimaginable personal cost, as the Capitol extracts brutal revenge on everything he loves, setting him on the tragic, alcohol-numbed path that transforms him into the cynical mentor audiences know in the original trilogy.

Filled with high-stakes survival combat, heartbreaking emotional sacrifice, and incisive political satire, Sunrise on the Reaping is a powerful addition to the beloved Hunger Games franchise.',
    `updated_at` = NOW()
WHERE `slug` = 'the-hunger-games-sunrise-on-the-reaping-2026' OR `id` = 240;

-- -----------------------------------------------------------------------------
-- [241] I Play Rocky (2026) | Content Length: 1893 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'I Play Rocky is a heartfelt, deeply inspiring biographical drama directed by Peter Farrelly that tells the incredible, against-all-odds true story of how an unknown, impoverished actor with a partially paralyzed face and a speech impediment refused to sell out his creative vision, creating one of the most beloved film franchises in cinematic history. Set in the gritty, rundown streets of 1970s Hell\'s Kitchen and Hollywood, the film chronicles the desperate struggles of Sylvester \"Sly\" Stallone as he battles poverty, career rejections, and personal despair.

With fifty dollars left in his bank account, an eviction notice on his apartment door, and his pregnant wife Sasha Czack struggling to keep their family afloat, Stallone watches an inspiring heavyweight boxing match between Muhammad Ali and unheralded underdog Chuck Wepner in March 1975. Struck by lightning creative inspiration, Stallone locks himself in a room for three straight days, producing the handwritten screenplay for Rocky. When top Hollywood producers Irwin Winkler and Robert Chartoff read the script, they recognize it as an instant masterpiece, offering Stallone astronomical sums of money—hundreds of thousands of dollars—to buy the rights for established A-list stars like Robert Redford or Burt Reynolds. In an act of jaw-dropping artistic courage that defied industry logic, the broke, starving Stallone flatly refuses to sell unless he is cast as the lead character, Rocky Balboa. Enduring starvation budgets, intense physical training in meatpacking lockers, and skepticism from studio executives, Stallone perseveres, ultimately filming the classic for under a million dollars and earning ten Academy Award nominations, including Best Picture.

With humor, emotional warmth, and unyielding grit, I Play Rocky is a timeless celebration of artistic integrity, perseverance, and the indomitable human spirit.',
    `updated_at` = NOW()
WHERE `slug` = 'i-play-rocky-2026' OR `id` = 241;

-- -----------------------------------------------------------------------------
-- [242] Violent Night 2 (2026) | Content Length: 1777 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Violent Night 2 is the uproarious, bloody, and holiday-spirited action comedy sequel directed by Tommy Wirkola that brings back the battle-hardened, magical Viking Santa Claus for another chaotic, bone-crushing winter adventure. The story catches up with Santa Claus, portrayed with grizzled charm, heavy-drinking humor, and skull-cracking physical ferocity by David Harbour, as he embarks on his annual Christmas Eve delivery run across the globe, still wielding his enchanted war hammer Skullcrusher to punish the naughty and protect the innocent.

This year, Santa\'s quiet holiday takes an explosive turn when an elite international mercenary syndicate, commanded by a ruthless criminal mastermind seeking ancient mythological artifacts, attacks a secluded, high-security winter mountain resort where young Trudy Lightstone and her wealthy family are spending Christmas. Having bonded with Trudy during the previous year\'s siege, Santa intercepts her emergency radio call over the magical holiday network, diverting his flying reindeer to drop straight into combat. This time, Santa isn\'t fighting alone: the sequel introduces Mrs. Claus, played with fiery battle-readiness, sharp wit, and equal combat prowess by an acclaimed guest star, who joins the holiday brawl with customized candy-cane bayonets and lethal ice weaponry. Together, Mr. and Mrs. Claus navigate luxury chalets, booby-trapped toy workshops, and frozen ski slopes, turning ordinary Christmas decorations, festive lights, and sharp ornaments into hilarious, gory instruments of holiday retribution.

Packed with inventive, over-the-top R-rated action choreography, laugh-out-loud dark comedy, and a surprisingly warm holiday heart, Violent Night 2 delivers the ultimate action-packed Christmas thrill ride.',
    `updated_at` = NOW()
WHERE `slug` = 'violent-night-2-2026' OR `id` = 242;

-- -----------------------------------------------------------------------------
-- [244] Dune: Part Three (2026) | Content Length: 1887 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'Dune: Part Three is Denis Villeneuve\'s grand, earth-shattering cinematic conclusion to Frank Herbert\'s epic Dune trilogy, bringing the tragic destiny of Paul Atreides and the fate of Arrakis to its monumental climax. Set against the backdrop of an empire torn apart by religious fanaticism, ecological transformation, and brewing palace treason, the film explores the agonizing psychological toll of absolute power and the devastating cost of fulfilling divine prophecy.

Paul Atreides, portrayed with haunting intensity, physical frailty, and terrifying prescience by Timothée Chalamet, finds his imperial court on Arrakis surrounded by unseen enemies. Chani, played with fierce warrior independence and heartbreaking grief by Zendaya, struggles to protect her newborn royal twins from Bene Gesserit schemers and Fremen zealots who view the children as holy relics rather than human beings. Princess Irulan, played with calculating intellect and suppressed sympathy by Florence Pugh, must decide whether to support the conspiracy to overthrow Paul or protect his legacy from complete annihilation. When a devastating atomic weapon known as a stone burner is detonated during an assassination attempt, blinding Paul physically, his prescient sight allows him to see the horrific future awaiting humanity unless he breaks the cycle of his own myth. With the aid of a resurrected ghola of his beloved mentor Duncan Idaho, played by Jason Momoa, and his fiercely prescient sister Alia, played by Anya Taylor-Joy, Paul makes the ultimate, tragic sacrifice, walking alone into the deep desert wastes as a blind nomad to leave the empire in the hands of his children and free the universe from his godhood.

Featuring awe-inspiring desert visuals, thunderous sound design, and deeply moving dramatic performances, Dune: Part Three stands as a crowning achievement in cinematic science fiction.',
    `updated_at` = NOW()
WHERE `slug` = 'dune-part-three-2026' OR `id` = 244;

-- -----------------------------------------------------------------------------
-- [245] The Angry Birds Movie 3 (2026) | Content Length: 1913 chars
-- -----------------------------------------------------------------------------
UPDATE `titles`
SET `overview` = 'The Angry Birds Movie 3 is an uproarious, visually vibrant animated comedy adventure that reunites the beloved, flightless flock for their wildest, most hilarious, and high-flying mission yet. Following their historic victories over the Pig Kingdom and the ice threats of Eagle Island, the resident hero Red, voiced with irritable wit, protective leadership, and warm humor by Jason Sudeikis, enjoys his status as the celebrated guardian of Bird Island alongside his hyperactive, lightning-fast best friend Chuck, voiced by Josh Gad, and the explosively warmhearted Bomb, voiced by Danny McBride.

Peace is shattered when mysterious seismic tremors and metallic flying probes invade both Bird Island and Pig Island, stealing critical natural resources and threatening the ecological harmony of their tropical paradise. To investigate the threat, Red and his friends are forced into another reluctant, uproarious alliance with their old frenemy, King Leonard, voiced with arrogant charm by Bill Hader, and his quirky pig inventors. Guided by Chuck\'s brilliant mechanical engineer sister Silver, the combined bird-pig expedition builds a massive, sub-oceanic submersible vessel that leads them to a previously uncharted, technologically advanced volcanic island known as \"Mecha Island.\" There, they uncover a civilization of hyper-advanced robotic birds and cybernetic eagles commanded by a rogue, clean-freak artificial intelligence determined to terraform all neighboring islands into sterile metal cities. Red and his team must embrace their trademark chaos, using slingshots, eccentric teamwork, and ridiculous slapstick stunts to outsmart the high-tech drones and save their colorful homelands.

Packed with hilarious physical comedy, colorful pop-culture parodies, and an uplifting message about teamwork and embracing our quirks, The Angry Birds Movie 3 delivers non-stop entertainment for the entire family.',
    `updated_at` = NOW()
WHERE `slug` = 'the-angry-birds-movie-3-2026' OR `id` = 245;

COMMIT;

-- ==============================================================================
-- END OF SCRIPT. Remember to run 'php artisan cache:clear' on production.
-- ==============================================================================