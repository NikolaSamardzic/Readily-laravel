<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private $books = [
        [
            'name' => 'Murder on the Orient Express',
            'page_count' => '289',
            'price' => '17',
            'release_date' => '2011-01-18',
            'description' => 'THE MOST WIDELY READ MYSTERY OF ALL TIME-NOW A MAJOR MOTION PICTURE DIRECTED BY KENNETH BRANAGH AND PRODUCED BY RIDLEY SCOTT!

"The murderer is with us-on the train now . . ."

Just after midnight, the famous Orient Express is stopped in its tracks by a snowdrift. By morning, the millionaire Samuel Edward Ratchett lies dead in his compartment, stabbed a dozen times, his door locked from the inside. Without a shred of doubt, one of his fellow passengers is the murderer.
',
            'publisher_id' => '3',
            'user_id' => '21'],
        [
            'name' => 'And Then There Were None123',
            'page_count' => '303',
            'price' => '16',
            'release_date' => '2011-03-26',
            'description' => 'If you\'re one of the few who haven\'t experienced the genius of Agatha Christie, this novel is a stellar starting point." - DAVID BALDACCI, #1 New York Times Bestselling Author

An exclusive authorized edition of the most famous and beloved stories from the Queen of Mystery.

Ten people, each with something to hide and something to fear, are invited to an isolated mansion on Indian Island by a host who, surprisingly, fails to appear. On the island they are cut off from everything but each other and the inescapable shadows of their own past lives. One by one, the guests share the darkest secrets of their wicked pasts. And one by one, they die…',
            'publisher_id' => '3',
            'user_id' => '21'],
        [
            'name' => 'The Murder of Roger Ackroyd',
            'page_count' => '306',
            'price' => '15',
            'release_date' => '2018-12-31',
            'description' => 'The Murder of Roger Ackroyd is a work of detective fiction by British writer Agatha Christie, first published in June 1926 in the United Kingdom. It is the third novel to feature Hercule Poirot as the lead detective.

In 2013, the British Crime Writers\' Association voted it the best crime novel ever.',
            'publisher_id' => '3',
            'user_id' => '21'],
        [
            'name' => 'Midwinter Murder',
            'page_count' => '306',
            'price' => '31',
            'release_date' => '2020-07-04',
            'description' => '"Reading a perfectly plotted Agatha Christie is like crunching into a perfect apple: that pure, crisp, absolute satisfaction." -Tana French, New York Times bestselling author of the Dublin Murder Squad novels

An all-new collection of winter-themed stories from the Queen of Mystery, just in time for the holidays-including the original version of "Christmas Adventure," never before released in the United States!
There\'s a chill in the air and the days are growing shorter . . . It\'s the perfect time to curl up in front of a crackling fire with these wintry whodunits from the legendary Agatha Christie. But beware of deadly snowdrifts and dangerous gifts, poisoned meals and mysterious guests. This chilling compendium of short stories-some featuring beloved detectives Hercule Poirot and Miss Marple-is an essential omnibus for Christie fans and the perfect holiday gift for mystery lovers.
',
            'publisher_id' => '3',
            'user_id' => '21'],
        [
            'name' => 'The Mysterious Affair at Styles',
            'page_count' => '185',
            'price' => '9',
            'release_date' => '2020-01-02',
            'description' => 'One morning at Styles Court, an Essex country manor, the elderly owner is found dead of strychnine poisoning. Arthur Hastings, a soldier staying there on sick leave from the Western Front, ventures out to the nearby village of Styles St. Mary to ask help from his friend Hercule Poirot, an eccentric Belgian inspector. Thus, in this classic whodunit, one of the most famous characters in detective fiction makes his debut on the world stage. With a half dozen suspects who all harbor secrets, it takes all of Poirot\'s prodigious sleuthing skills to untangle the mystery-but not before the inquiry undergoes scores of spellbinding twists and surprises. Contains the original illustrations and a detailed biography.',
            'publisher_id' => '3',
            'user_id' => '21'],
        [
            'name' => 'Death on the Nile',
            'page_count' => '320',
            'price' => '14',
            'release_date' => '2005-06-03',
            'description' => '"A top-notch literary brainteaser." -New York Times

Soon to be a major motion picture sequel to Murder on the Orient Express with a screenplay by Michael Green, directed by and starring Kenneth Branagh alongside Gal Gadot-coming February 11, 2022!

The tranquility of a luxury cruise along the Nile was shattered by the discovery that Linnet Ridgeway had been shot through the head. She was young, stylish, and beautiful. A girl who had everything . . . until she lost her life',
            'publisher_id' => '3',
            'user_id' => '21'],
        [
            'name' => 'The Murder at the Vicarage',
            'page_count' => '305',
            'price' => '29',
            'release_date' => '2009-03-15',
            'description' => 'The Murder at the Vicarage is Agatha Christie\'s first mystery to feature the beloved investigator Miss Marple-as a dead body in a clergyman\'s study proves to the indomitable sleuth that no place, holy or otherwise, is a sanctuary from homicide.

Miss Marple encounters a compelling murder mystery in the sleepy little village of St. Mary Mead, where under the seemingly peaceful exterior of an English country village lurks intrigue, guilt, deception and death.


Colonel Protheroe, local magistrate and overbearing land-owner is the most detested man in the village. Everyone--even in the vicar--wishes he were dead. And very soon he is--shot in the head in the vicar\'s own study. Faced with a surfeit of suspects, only the inscrutable Miss Marple can unravel the tangled web of clues that will lead to the unmasking of the killer.',
            'publisher_id' => '3',
            'user_id' => '21'],
        [
            'name' => 'The Hollow',
            'page_count' => '272',
            'price' => '18',
            'release_date' => '2006-07-04',
            'description' => 'Agatha Christie\'s classic, The Hollow, finds Poirot entangled in a nasty web of family secrets when he comes across a fresh murder at an English country manor.

A far-from-warm welcome greets Hercule Poirot as he arrives for lunch at Lucy Angkatell\'s country house. A man lies dying by the swimming pool, his blood dripping into the water. His wife stands over him, holding a revolver.

As Poirot investigates, he begins to realize that beneath the respectable surface lies a tangle of family secrets and everyone becomes a suspect.',
            'publisher_id' => '3',
            'user_id' => '21'],
        [
            'name' => 'A Murder Is Announced',
            'page_count' => '240',
            'price' => '27',
            'release_date' => '2009-06-18',
            'description' => 'The villagers of Chipping Cleghorn, including Jane Marple, are agog with curiosity over an advertisement in the local gazette which read: \'A murder is announced and will take place on Friday October 29th, at Little Paddocks at 6:30 p.m.\' Unable to resist the mysterious invitation, a crowd begins to gather at Little Paddocks at the pointed time when, without warning, the lights go out ...',
            'publisher_id' => '3',
            'user_id' => '21'],
        [
            'name' => 'Sparkling Cyanide',
            'page_count' => '288',
            'price' => '9',
            'release_date' => '2009-03-26',
            'description' => 'In Sparkling Cyanide, Agatha Christie seats six-including a murderer-around a dining table set for seven, one year to the day that a beautiful heiress was poisoned in that very room.

Six people sit down to a sumptuous meal at a table laid for seven. In front of the empty place is a sprig of rosemary-\\"rosemary for remembrance.\\" A strange sentiment considering no one is likely to forget the night, exactly a year ago, that Rosemary Barton died at exactly the same table, her beautiful face unrecognizable, convulsed with pain and horror.

But then Rosemary had always been memorable-she had the ability to arouse strong passions in most people she met. In one case, strong enough to kill. . . .',
            'publisher_id' => '3',
            'user_id' => '21'],
        [
            'name' => 'The Adventures Of Sherlock Holmes',
            'page_count' => '148',
            'price' => '10',
            'release_date' => '2022-03-11',
            'description' => 'The Adventures of Sherlock Holmes is a collection of twelve short stories by Arthur Conan Doyle, first published on 14 October 1892. It contains the earliest short stories featuring the consulting detective Sherlock Holmes, which had been published in twelve monthly issues of The Strand Magazine from July 1891 to June 1892. The stories are collected in the same sequence, which is not supported by any fictional chronology. The only characters common to all twelve are Holmes and Dr. Watson and all are related in first-person narrative from Watson\'s point of view.

In general the stories in The Adventures of Sherlock Holmes identify, and try to correct, social injustices. Holmes is portrayed as offering a new, fairer sense of justice. The stories were well received, and boosted the subscriptions figures of The Strand Magazine, prompting Doyle to be able to demand more money for his next set of stories. The first story, \\"A Scandal in Bohemia\\", includes the character of Irene Adler, who, despite being featured only within this one story by Doyle, is a prominent character in modern Sherlock Holmes adaptations, generally as a love interest for Holmes. Doyle included four of the twelve stories from this collection in his twelve favourite Sherlock Holmes stories, picking "The Adventure of the Speckled Band" as his overall favourite.

',
            'publisher_id' => '4',
            'user_id' => '20'],
        [
            'name' => 'The Hound of the Baskervilles',
            'page_count' => '208',
            'price' => '9',
            'release_date' => '2019-06-23',
            'description' => 'The Hound of the Baskervilles is the third of the four crime novels written by Sir Arthur Conan Doyle featuring the detective Sherlock Holmes. Originally serialised in The Strand Magazine from August 1901 to April 1902, it is set largely on Dartmoor in Devon in England\'s West Country and tells the story of an attempted murder inspired by the legend of a fearsome, diabolical hound of supernatural origin. Sherlock Holmes and his companion Dr. Watson investigate the case. This was the first appearance of Holmes since his apparent death in "The Final Problem", and the success of The Hound of the Baskervilles led to the character\'s eventual revival.',
            'publisher_id' => '4',
            'user_id' => '20'],
        [
            'name' => 'A Study in Scarlet',
            'page_count' => '142',
            'price' => '6',
            'release_date' => '2018-04-03',
            'description' => 'A Study in Scarlet first appeared in 1887 in Beeton\'s Christmas Annual and was marked the first appearance of Sherlock Holmes and Dr. Watson, who would become the most famous detective duo in popular fiction. The book\'s title derives from a speech given by Holmes, a consulting detective, to his friend and chronicler Watson on the nature of his work, in which he describes the story\'s murder investigation as his \\"study in scarlet\\". The story, and its main characters, attracted little public interest when it first appeared. This book is the first of four full-length novels about Holmes. Doyle\'s other works were collections of short stories.',
            'publisher_id' => '4',
            'user_id' => '20'],
        [
            'name' => 'The Memoirs of Sherlock Holmes',
            'page_count' => '276',
            'price' => '16',
            'release_date' => '2019-07-03',
            'description' => 'The Memoirs of Sherlock Holmes is a collection of Sherlock Holmes stories, originally published in 1893, by Arthur Conan Doyle. Doyle had decided that these would be the last collection of Holmes\'s stories, and intended to kill him off in the last adventure \\"The Final Problem\\". Readers wanted him to write more adventures featuring Sherlock Holmes, so Doyle released The Hound of the Baskervilles years later. He followed that up with The Return of Sherlock Holmes, in which Holmes relates how he survived.',
            'publisher_id' => '4',
            'user_id' => '20'],
        [
            'name' => 'The Sign of Four',
            'page_count' => '126',
            'price' => '15',
            'release_date' => '2021-09-07',
            'description' => 'A nice edition with the first edition cover and 13 original illustrations.

The Sign of Four was first released to magazines in 1890. It was later published in book format and is also known by the title The Sign of the Four. It is the second Sherlock Holmes novel, after A Study in Scarlet. The plot involves service in India, the Indian Rebellion of 1857, a stolen treasure, and a secret pact among four convicts (\\"the Four\\" of the title) and two corrupt prison guards... and of course, Sherlock Holmes.',
            'publisher_id' => '4',
            'user_id' => '20'],
        [
            'name' => 'Notes from a Small Island',
            'page_count' => '338',
            'price' => '13',
            'release_date' => '2015-02-03',
            'description' => 'Before New York Times bestselling author Bill Bryson wrote The Road to Little Dribbling, he took this delightfully irreverent jaunt around the unparalleled floating nation of Great Britain, which has produced zebra crossings, Shakespeare, Twiggie Winkie\'s Farm, and places with names like Farleigh Wallop and Titsey.',
            'publisher_id' => '1',
            'user_id' => '19'],
        [
            'name' => 'A Short History of Nearly Everything',
            'page_count' => '345',
            'price' => '49',
            'release_date' => '2003-05-01',
            'description' => 'One of the world\'s most beloved writers and New York Times bestselling author of A Walk in the Woods and The Body takes his ultimate journey-into the most intriguing and intractable questions that science seeks to answer.

In A Walk in the Woods, Bill Bryson trekked the Appalachian Trail-well, most of it. In A Sunburned Country, he confronted some of the most lethal wildlife Australia has to offer. Now, in his biggest book, he confronts his greatest challenge: to understand-and, if possible, answer-the oldest, biggest questions we have posed about the universe and ourselves. Taking as territory everything from the Big Bang to the rise of civilization, Bryson seeks to understand how we got from there being nothing at all to there being us. To that end, he has attached himself to a host of the world\'s most advanced (and often obsessed) archaeologists, anthropologists, and mathematicians, travelling to their offices, laboratories, and field camps. He has read (or tried to read) their books, pestered them with questions, apprenticed himself to their powerful minds. A Short History of Nearly Everything is the record of this quest, and it is a sometimes profound, sometimes funny, and always supremely clear and entertaining adventure in the realms of human knowledge, as only Bill Bryson can render it. Science has never been more involving or entertaining.',
            'publisher_id' => '3',
            'user_id' => '19'],
        [
            'name' => 'A Walk in the Woods: Rediscovering America on the ',
            'page_count' => '305',
            'price' => '38',
            'release_date' => '2010-08-08',
            'description' => '"The best way of escaping into nature."-The New York Times

 Back in America after twenty years in Britain, Bill Bryson decided to reacquaint himself with his native country by walking the 2,100-mile Appalachian Trail, which stretches from Georgia to Maine. The AT offers an astonishing landscape of silent forests and sparkling lakes-and to a writer with the comic genius of Bill Bryson, it also provides endless opportunities to witness the majestic silliness of his fellow human beings.

For a start there\'s the gloriously out-of-shape Stephen Katz, a buddy from Iowa along for the walk. But A Walk in the Woods is more than just a laugh-out-loud hike. Bryson\'s acute eye is a wise witness to this beautiful but fragile trail, and as he tells its fascinating history, he makes a moving plea for the conservation of America\'s last great wilderness. An adventure, a comedy, and a celebration, A Walk in the Woods is a modern classic of travel literature.',
            'publisher_id' => '3',
            'user_id' => '19'],
        [
            'name' => 'In a Sunburned Country',
            'page_count' => '335',
            'price' => '29',
            'release_date' => '2000-01-01',
            'description' => 'Every time Bill Bryson walks out the door, memorable travel literature threatens to break out. This time in Australia.
His previous excursion along the Appalachian Trail resulted in the sublime national bestseller A Walk in the Woods. In A Sunburned Country is his report on what he found in an entirely different place: Australia, the country that doubles as a continent, and a place with the friendliest inhabitants, the hottest, driest weather, and the most peculiar and lethal wildlife to be found on the planet. The result is a deliciously funny, fact-filled, and adventurous performance by a writer who combines humor, wonder, and unflagging curiousity.

Despite the fact that Australia harbors more things that can kill you in extremely nasty ways than anywhere else, including sharks, crocodiles, snakes, even riptides and deserts, Bill Bryson adores the place, and he takes his readers on a rollicking ride far beyond that beaten tourist path. Wherever he goes he finds Australians who are cheerful, extroverted, and unfailingly obliging, and these beaming products of land with clean, safe cities, cold beer, and constant sunshine fill the pages of this wonderful book.
',
            'publisher_id' => '3',
            'user_id' => '19'],
        [
            'name' => 'The Road to Little Dribbling: Adventures of an Ame',
            'page_count' => '382',
            'price' => '27',
            'release_date' => '2016-01-18',
            'description' => 'A loving and hilarious-if occasionally spiky-valentine to Bill Bryson\'s adopted country, Great Britain. Prepare for total joy and multiple episodes of unseemly laughter.

Twenty years ago, Bill Bryson went on a trip around Britain to discover and celebrate that green and pleasant land. The result was Notes from a Small Island, a true classic and one of the bestselling travel books ever written. Now he has traveled about Britain again, by bus and train and rental car and on foot, to see what has changed-and what hasn\'t.

Following (but not too closely) a route he dubs the Bryson Line, from Bognor Regis in the south to Cape Wrath in the north, by way of places few travelers ever get to at all, Bryson rediscovers the wondrously beautiful, magnificently eccentric, endearingly singular country that he both celebrates and, when called for, twits. With his matchless instinct for the funniest and quirkiest and his unerring eye for the idiotic, the bewildering, the appealing, and the ridiculous, he offers acute and perceptive insights into all that is best and worst about Britain today.',
            'publisher_id' => '3',
            'user_id' => '19'],
        [
            'name' => 'One Summer: America, 1927',
            'page_count' => '545',
            'price' => '16',
            'release_date' => '2013-09-04',
            'description' => 'In One Summer Bill Bryson, one of our greatest and most beloved nonfiction writers, transports readers on a journey back to one amazing season in American life.

The summer of 1927 began with one of the signature events of the twentieth century: on May 21, 1927, Charles Lindbergh became the first man to cross the Atlantic by plane nonstop, and when he landed in Le Bourget airfield near Paris, he ignited an explosion of worldwide rapture and instantly became the most famous person on the planet. Meanwhile, the titanically talented Babe Ruth was beginning his assault on the home run record, which would culminate on September 30 with his sixtieth blast, one of the most resonant and durable records in sports history. In between those dates a Queens housewife named Ruth Snyder and her corset-salesman lover garroted her husband, leading to a murder trial that became a huge tabloid sensation

Alvin "Shipwreck" Kelly sat atop a flagpole in Newark, New Jersey, for twelve days-a new record. The American South was clobbered by unprecedented rain and by flooding of the Mississippi basin, a great human disaster, the relief efforts for which were guided by the uncannily able and insufferably pompous Herbert Hoover. Calvin Coolidge interrupted an already leisurely presidency for an even more relaxing three-month vacation in the Black Hills of South Dakota.',
            'publisher_id' => '3',
            'user_id' => '19'],
        [
            'name' => 'I\'m a Stranger Here Myself: Notes on Returning to ',
            'page_count' => '306',
            'price' => '21',
            'release_date' => '2008-06-13',
            'description' => 'A classic from the New York Times bestselling author of A Walk in the Woods and The Body.

After living in Britain for two decades, Bill Bryson recently moved back to the United States with his English wife and four children (he had read somewhere that nearly 3 million Americans believed they had been abducted by aliens-as he later put it, \\"it was clear my people needed me\\"). They were greeted by a new and improved America that boasts microwave pancakes, twenty-four-hour dental-floss hotlines, and the staunch conviction that ice is not a luxury item.

Delivering the brilliant comic musings that are a Bryson hallmark, I\'m a Stranger Here Myself recounts his sometimes disconcerting reunion with the land of his birth. The result is a book filled with hysterical scenes of one man\'s attempt to reacquaint himself with his own country, but it is also an extended if at times bemused love letter to the homeland he has returned to after twenty years away.',
            'publisher_id' => '3',
            'user_id' => '19'],
        [
            'name' => 'Bill Bryson\'s African Diary',
            'page_count' => '66',
            'price' => '22',
            'release_date' => '2007-12-15',
            'description' => 'From the author of A Short History of Nearly Everything and The Body comes a travel diary documenting a visit to Kenya. All royalties and profits go to CARE International.

In the early fall of 2002, famed travel writer Bill Bryson journeyed to Kenya at the invitation of CARE International, the charity dedicated to working with local communities to eradicate poverty around the world. He arrived with a set of mental images of Africa gleaned from television broadcasts of low-budget Jungle Jim movies in his Iowa childhood and a single viewing of the film version of Out of Africa. (Also with some worries about tropical diseases, insects, and large predators.) But the vibrant reality of Kenya and its people took over the second he deplaned in Nairobi, and this diary records Bill Bryson\'s impressions of his trip with his inimitable trademark style of wry observation and curious insight.

From the wrenching poverty of the Kibera slum in Nairobi to the meticulously manicured grounds of the Karen Blixen house and the human fossil riches of the National Museum, Bryson registers the striking contrasts of a postcolonial society in transition. He visits the astoundingly vast Great Rift Valley; undergoes the rigors of a teeth-rattling train journey to Mombasa and a hair-whitening flight through a vicious storm; and visits the refugee camps and the agricultural and economic projects where dedicated CARE professionals wage noble and dogged war against poverty, dislocation, and corruption.',
            'publisher_id' => '3',
            'user_id' => '19'],
        [
            'name' => 'Neither here nor there: Travels in Europe',
            'page_count' => '322',
            'price' => '49',
            'release_date' => '2015-04-14',
            'description' => 'In the early seventies, Bill Bryson backpacked across Europe-in search of enlightenment, beer, and women. He was accompanied by an unforgettable sidekick named Stephen Katz (who will be gloriously familiar to readers of Bryson\'s A Walk in the Woods). Twenty years later, he decided to retrace his journey. The result is the affectionate and riotously funny Neither Here Nor There.

',
            'publisher_id' => '3',
            'user_id' => '19'],
        [
            'name' => 'The Lost Continent: Travels in Small Town America',
            'page_count' => '354',
            'price' => '14',
            'release_date' => '2015-05-01',
            'description' => 'An inspiring and hilarious account of one man\'s rediscovery of America and his search for the perfect small town.

Following an urge to rediscover his youth, Bill Bryson left his native Des Moines, Iowa, in a journey that would take him across 38 states. Lucky for us, he brought a notebook. With a razor wit and a kind heart, Bryson serves up a colorful tale of boredom, kitsch, and beauty when you least expect it. From Times Square to the Mississippi River to Williamsburg, Virginia, Bryson\'s keen and hilarious search for the perfect American small town is a journey straight into the heart and soul of America.',
            'publisher_id' => '3',
            'user_id' => '19'],
        [
            'name' => 'The Great Railway Bazaar',
            'page_count' => '354',
            'price' => '15',
            'release_date' => '2006-05-01',
            'description' => 'The acclaimed author recounts his epic journey across Europe and Asia in this international bestselling classic of travel literature: "Compulsive reading" (Graham Greene).

In 1973, Paul Theroux embarked on a four-month journey by train from the United Kingdom through Europe, the Middle East, and Southeast Asia. In The Great Railway Bazaar, he records in vivid detail and penetrating insight the many fascinating incidents, adventures, and encounters of his grand, intercontinental tour.

Asia\'s fabled trains-the Orient Express, the Khyber Pass Local, the Frontier Mail, the Golden Arrow to Kuala Lumpur, the Mandalay Express, the Trans-Siberian Express-are the stars of a journey that takes Theroux on a loop eastbound from London\'s Victoria Station to Tokyo Central, then back from Japan on the Trans-Siberian. Brimming with Theroux\'s signature humor and wry observations, this engrossing chronicle is essential reading for both the ardent adventurer and the armchair traveler.',
            'publisher_id' => '5',
            'user_id' => '18'],
        [
            'name' => 'Deep South: Four Seasons on Back Roads',
            'page_count' => '485',
            'price' => '27',
            'release_date' => '2015-05-04',
            'description' => 'The acclaimed author of The Great Railway Bazaar takes a revealing journey through the Southern US in a "vivid contemporary portrait of rural life" (Atlanta Journal-Constitution).

Paul Theroux has spent decades roaming the globe and writing of his experiences with remote people and far-flung places. Now, for the first time, he turns his attention to a corner of America-the Deep South. On a winding road trip through Mississippi, South Carolina, and elsewhere below the Mason-Dixon, Theroux discovers architectural and artistic wonders, incomparable music, mouth-watering cuisine-and also some of the worst schools, medical care, housing, and unemployment rates in the nation.

Most fascinating of all are Theroux\'s many encounters with the people who make the South what it is-from preachers and mayors to quarry workers and gun show enthusiasts. With his astute ear and penetrating mind, Theroux once again demonstrates his "remarkable gift for getting strangers to reveal themselves" in this eye-opening excursion into his own country (The New York Times Book Review).',
            'publisher_id' => '5',
            'user_id' => '18'],
        [
            'name' => 'The Happy Isles of Oceania: Paddling the Pacific',
            'page_count' => '530',
            'price' => '43',
            'release_date' => '2006-12-01',
            'description' => 'The author of The Great Railway Bazaar explores the South Pacific by kayak: "This exhilarating epic ranks with [his] best travel books" (Publishers Weekly).

In one of his most exotic and adventuresome journeys, travel writer Paul Theroux embarks on an eighteen-month tour of the South Pacific, exploring fifty-one islands by collapsible kayak. Beginning in New Zealand\'s rain forests and ultimately coming to shore thousands of miles away in Hawaii, Theroux paddles alone over isolated atolls, through dirty harbors and shark-filled waters, and along treacherous coastlines.

Along the way, Theroux meets the king of Tonga, encounters street gangs in Auckland, and investigates a cargo cult in Vanuatu. From Australia to Tahiti, Fiji, Easter Island, and beyond, this exhilarating tropical epic is full of disarming observations and high adventure.',
            'publisher_id' => '5',
            'user_id' => '18'],
        [
            'name' => 'On The Plain Of Snakes: A Mexican Journey',
            'page_count' => '542',
            'price' => '21',
            'release_date' => '2019-06-04',
            'description' => 'The legendary travel writer drives the entire length of the US-Mexico border, then takes the back roads of Chiapas and Oaxaca, to uncover the rich, layered world behind the everyday headlines.

Paul Theroux has spent his life crisscrossing the globe in search of the histories and peoples that give life to the places they call home. Now, as immigration debates boil around the world, Theroux has set out to explore a country key to understanding our current discourse: Mexico. Just south of the Arizona border, in the desert region of Sonora, he finds a place brimming with vitality, yet visibly marked by both the US Border Patrol to the north and mounting discord from within. With the same humanizing sensibility that he employed in Deep South, Theroux stops to talk with residents, visits Zapotec mill workers in the highlands, and attends a Zapatista party meeting, communing with people of all stripes who remain south of the border even as family members brave the journey north.',
            'publisher_id' => '5',
            'user_id' => '18'],
        [
            'name' => 'The Old Patagonian Express: By Train Through the A',
            'page_count' => '506',
            'price' => '47',
            'release_date' => '2014-06-04',
            'description' => 'The acclaimed travel writer journeys by train across the Americas from Boston to Patagonia in this international bestselling travel memoir.

Starting with a rush-hour subway ride to South Station in Boston to catch the Lake Shore Limited to Chicago, Paul Theroux takes a grand railway adventure first across the United States and then south through Mexico, Central America, and across the Andes until he winds up on the meandering Old Patagonian Express steam engine. His epic commute finally comes to a halt in a desolate land of cracked hills and thorn bushes that reaches toward Antarctica.

Along the way, Theroux demonstrates how train travel can reveal "the social miseries and scenic splendors" of a continent. And through his perceptive prose we learn that what matters most are the people he meets along the way, including the monologuing Mr. Thornberry in Costa Rica, the bogus priest of Cali, and the blind Jorge Luis Borges, who delights in having Theroux read Robert Louis Stevenson to him.',
            'publisher_id' => '3',
            'user_id' => '18'],
        [
            'name' => 'How to Win Friends and Influence People',
            'page_count' => '317',
            'price' => '25',
            'release_date' => '2022-05-17',
            'description' => 'Updated for the first time in more than forty years, Dale Carnegie\'s timeless bestseller How to Win Friends and Influence People-a classic that has improved and transformed the personal and professional lives of millions.

This new edition of the most influential self-help book of the last century has been updated under the care of Dale\'s daughter, Donna, introducing changes that keep the book fresh for today\'s readers, with priceless material restored from the original 1936 text.

One of the best-known motivational guides in history, Dale Carnegie\'s groundbreaking publication has sold tens of millions of copies, been translated into almost every known written language, and has helped countless people succeed.',
            'publisher_id' => '6',
            'user_id' => '17'],
        [
            'name' => 'How to Stop Worrying & Start Living',
            'page_count' => '399',
            'price' => '15',
            'release_date' => '2022-05-12',
            'description' => '"Let\'s not allow ourselves to be upset by small things we should despise and forget. Remember "Life is too short to belittle" "One of the most tragic things I know about human nature is that all of us tend to put off living. We are all dreaming of some magical rose garden over the horizon-instead of enjoying the roses that are blooming outside our windows today. Why are we such fools-such tragic fools?" "The most important thing in life is not to capitalize on your gains. Any fool can do that. The really important thing is to profit from your losses." -Dale Carnegie This enlightening self-book offers a detailed guide on how to manage your worries to lead a delightful life. More often than not our personal and professional relationships are the major cause of stress and anxiety. A best-seller of all times, this book will help you achieve your maximum potential in the complex and competitive modern age, without worrying about your associations and affiliations with others.',
            'publisher_id' => '6',
            'user_id' => '17'],
        [
            'name' => 'The Art of Public Speaking: The Original Tool for ',
            'page_count' => '532',
            'price' => '43',
            'release_date' => '2018-06-23',
            'description' => 'Do you have trouble getting up in front of an audience? Are you struggling to get your point across? Public speaking can be nerve-wracking, especially if you\'re a naturally nervous person or if you\'re underprepared. Originally published in 1915, The Art of Public Speaking has been the go-to guide for those who want to better their speaking abilities for more than a century.',
            'publisher_id' => '6',
            'user_id' => '17'],
        [
            'name' => 'Take Command',
            'page_count' => '267',
            'price' => '14',
            'release_date' => '2023-01-04',
            'description' => 'Take command of your future with this groundbreaking book from the experts who brought you How to Win Friends and Influence People.

Take Command offers powerful tools and time-tested methods to help you live an intentional life by transforming how you approach your thoughts, emotions, relationships, and future. Filled with stories of everyday people and based on expert research and interviews with more than a hundred high-performing leaders, Take Command gives you the strategies you need to unlock your full potential and create the life you want.',
            'publisher_id' => '6',
            'user_id' => '17'],
        [
            'name' => 'The Quick and Easy Way to Effective Speaking',
            'page_count' => '185',
            'price' => '45',
            'release_date' => '2019-05-19',
            'description' => 'Good public speakers are made-not born. Public speaking is an important skill which anyone can acquire and develop. This book that has literally put millions on the highway to greater accomplishment and success can show you how to have maximum impact as a speaker. It will help you to acquire basic public speaking skills, building confidence, earning the right to talk, sharing the talk with the audience.',
            'publisher_id' => '6',
            'user_id' => '17'],
        [
            'name' => 'Listen!: The Art of Effective Communication',
            'page_count' => '224',
            'price' => '18',
            'release_date' => '2018-07-03',
            'description' => 'Why do we so often fail to connect when speaking with business colleagues, family members, or friends? Wouldn\'t you like to make yourself heard and understood in all of your relationships?

Using vivid examples, easy-to-learn techniques, and practical exercises for becoming a better listener-and making yourself heard and understood, Dale Carnegie will show you how it\'s done, even in difficult situations.

Founded in 1912, Dale Carnegie Training has evolved from one man\'s belief in the power of self-improvement to a performance-based training company with offices worldwide. Dale Carnegie\'s original body of knowledge has been constantly updated, expanded and refined through nearly a century\'s worth of real-life business experiences. He is recognized internationally as the leader in bringing out the best in people and over 8 million people have completed a Dale Carnegie course.',
            'publisher_id' => '6',
            'user_id' => '17'],
        [
            'name' => 'Make Yourself Unforgettable',
            'page_count' => '175',
            'price' => '52',
            'release_date' => '2011-02-07',
            'description' => 'From one of the most trusted and bestselling brands in business training, Make Yourself Unforgettable reveals how to develop and embody unforgettable qualities so you can become the effective and desirable colleague and friend possible.

Learn how to develop and embody the ten essential elements of being unforgettable!

What does it really mean to have class? How do you distinguish yourself from the crowd and become a successful leader? When should intuition guide your business decisions? The answers to these and other important questions can be found in this dynamic and inspiring guidebook for anyone looking to lead a life of greater meaning and influence.',
            'publisher_id' => '6',
            'user_id' => '17'],
        [
            'name' => 'How To Develop Self-Confidence & Influence People',
            'page_count' => '260',
            'price' => '63',
            'release_date' => '2021-03-01',
            'description' => 'Dale Carnegie\'s How to Develop-Self Confidence & Influence People is an evergreen work. The main takeaway from this book is that improving public speaking and improving self-confidence are a function of preparation, education, determination and practice. There is no short cut to a better you - rather a long path of self-improvement.',
            'publisher_id' => '6',
            'user_id' => '17'],
        [
            'name' => 'How to Stop Worrying and Start Living',
            'page_count' => '734',
            'price' => '16',
            'release_date' => '2021-08-12',
            'description' => 'How To Stop Worrying and Start Living is a self-help book by Dale Carnegie. Carnegie is considered to be one of the greatest self-help experts, he mentions in the preface that he wrote it because he "was one of the unhappiest lads in New York". He says that he made himself sick with worry because he hated his position in life, which he attributes to wanting to figure out how to stop worrying.

The book\'s goal is to lead the reader to a more enjoyable and fulfilling lifestyle, helping them to become more aware of, not only themselves, but others also around them. Carnegie tries to address the everyday nuances of living, in order to get the reader to focus on the more important aspects of life.',
            'publisher_id' => '6',
            'user_id' => '17'],
        [
            'name' => '3 Steps to Being a Great Manager',
            'page_count' => '614',
            'price' => '33',
            'release_date' => '2021-08-05',
            'description' => 'Why do we so often fail to connect when speaking with others? Wouldn\'t you like to make yourself heard and understood? Using vivid examples, easy-to-learn techniques, and practical exercises for becoming a better listener-and making yourself heard and understood, Dale Carnegie will show you how it\'s done, even in difficult situations.

Today, where media is social and funding is raised by crowds, the sales cycle has permanently changed. It\'s not enough to know your product, nor always appropriate to challenge your customer\'s thinking based on your research. Dale Carnegie & Associates reveal the REAL modern sales cycle that depends on your ability to influence more than just one buyer, understand what today\'s customers want, and use time-tested principles to strengthen relationships anywhere in the global economy.',
            'publisher_id' => '6',
            'user_id' => '17'],
        [
            'name' => 'Life Force',
            'page_count' => '700',
            'price' => '25',
            'release_date' => '2022-02-08',
            'description' => 'Transform your life or the life of someone you love with Life Force-the newest breakthroughs in health technology to help maximize your energy and strength, prevent disease, and extend your health span-from Tony Robbins, author of the #1 New York Times bestseller Money: Master the Game.

What if there were scientific solutions that could wipe out your deepest fears of falling ill, receiving a life-threatening diagnosis, or feeling the effects of aging? What if you had access to the same cutting-edge tools and technology used by peak performers and the world\'s greatest athletes?

In a world full of fear and uncertainty about our health, it can be difficult to know where to turn for actionable advice you can trust. Today, leading scientists and doctors in the field of regenerative medicine are developing diagnostic tools and safe and effective therapies that can free you from fear.',
            'publisher_id' => '6',
            'user_id' => '16'],
        [
            'name' => 'MONEY Master the Game: 7 Simple Steps to Financial',
            'page_count' => '689',
            'price' => '66',
            'release_date' => '2014-09-18',
            'description' => 'Tony Robbins turns to the topic that vexes us all: How to secure financial freedom for ourselves and for our families. "If there were a Pulitzer Prize for investment books, this one would win, hands down" (Forbes).

Tony Robbins is one of the most revered writers and thinkers of our time. People from all over the world-from the disadvantaged to the well-heeled, from twenty-somethings to retirees-credit him for giving them the inspiration and the tools for transforming their lives. From diet and fitness, to business and leadership, to relationships and self-respect, Tony Robbins\'s books have changed people in profound and lasting ways. Now, for the first time, he has assembled an invaluable "distillation of just about every good personal finance idea of the last forty years" (The New York Times).

Based on extensive research and interviews with some of the most legendary investors at work today (John Bogle, Warren Buffett, Paul Tudor Jones, Ray Dalio, Carl Icahn, and many others), Tony Robbins has created a 7-step blueprint for securing financial freedom. With advice about taking control of your financial decisions, to setting up a savings and investing plan, to destroying myths about what it takes to save and invest, to setting up a "lifetime income plan," the book brims with advice and practices for making the financial game not only winnable-but providing financial freedom for the rest of your life. "Put MONEY on your short list of new books to read…It\'s that good" (Marketwatch.com).',
            'publisher_id' => '6',
            'user_id' => '16'],
        [
            'name' => 'Unshakeable: Your Financial Freedom Playbook',
            'page_count' => '257',
            'price' => '43',
            'release_date' => '2017-02-05',
            'description' => 'Transform your financial life and accelerate your path to financial freedom with this step-by-step playbook to achieving your financial goals from the #1 New York Times bestseller of Money: Master the Game, Tony Robbins.

Robbins, who has coached more than fifty million people from 100 countries, is the world\'s #1 life and business strategist. In this book, he teams up with Peter Mallouk, the only man in history to be ranked the #1 financial advisor in the US for three consecutive years by Barron\'s. Together they reveal how to become unshakeable-someone who can not only maintain true peace of mind in a world of immense uncertainty, economic volatility, and unprecedented change, but who can profit from the fear that immobilizes so many.',
            'publisher_id' => '6',
            'user_id' => '16'],
        [
            'name' => 'The Path: Accelerating Your Journey to Financial F',
            'page_count' => '316',
            'price' => '24',
            'release_date' => '2020-04-13',
            'description' => 'Accelerate your journey to financial freedom with the tools, strategies, and mindset of money mastery.

Regardless of your stage of life and your current financial picture, the quest for financial freedom can indeed be conquered. The journey will demand the right tools and strategies along with the mindset of money mastery. With decades of collective wisdom and hands-on experience, your guides for this expedition are Peter Mallouk, the only man in history to be ranked the #1 Financial Advisor in the U.S. for three consecutive years by Barron\'s (2013, 2014, 2015), and Tony Robbins, the world-renowned life and business strategist. Mallouk and Robbins take the seemingly daunting goal of financial freedom and simplify it into a step-by-step process that anyone can achieve.',
            'publisher_id' => '6',
            'user_id' => '16'],
        [
            'name' => 'The Emotion Code',
            'page_count' => '349',
            'price' => '64',
            'release_date' => '2022-02-15',
            'description' => '"I believe that the discoveries in this book can change our understanding of how we store emotional experiences and in so doing, change our lives. The Emotion Code has already changed many lives around the world, and it is my hope that millions more will be led to use this simple tool to heal themselves and their loved ones."-Tony Robbins

In this newly revised and expanded edition of The Emotion Code, renowned holistic physician and lecturer Dr. Bradley Nelson skillfully lays bare the inner workings of the subconscious mind. He reveals how emotionally-charged events from your past can still be haunting you in the form of \\"trapped emotions\\"-emotional energies that literally inhabit your body. These trapped emotions can fester in your life and body, creating pain, malfunction, and eventual disease. They can also extract a heavy mental and emotional toll on you, impacting how you think, the choices that you make, and the level of success and abundance you are able to achieve. Perhaps most damaging of all, trapped emotional energies can gather around your heart, cutting off your ability to give and receive love.

The Emotion Code is a powerful and simple way to rid yourself of this unseen baggage. Dr. Nelson\'s method gives you the tools to identify and release the trapped emotions in your life, eliminating your "emotional baggage," and opening your heart and body to the positive energies of the world. Filled with real-world examples from many years of clinical practice, The Emotion Code is a distinct and authoritative work that has become a classic on self-healing.',
            'publisher_id' => '6',
            'user_id' => '16'],
        [
            'name' => 'Mastering the Art of French Cooking',
            'page_count' => '754',
            'price' => '55',
            'release_date' => '2011-09-05',
            'description' => '"What a cookbook should be: packed with sumptuous recipes, detailed instructions, and precise line drawings. Some of the instructions look daunting, but as Child herself says in the introduction, \'If you can read, you can cook.\'" -Entertainment Weekly

"I only wish that I had written it myself." -James Beard

Featuring 524 delicious recipes and over 100 instructive illustrations to guide readers every step of the way, Mastering the Art of French Cooking offers something for everyone, from seasoned experts to beginners who love good food and long to reproduce the savory delights of French cuisine.',
            'publisher_id' => '7',
            'user_id' => '15'],
        [
            'name' => 'Mastering the Art of French Cooking, Volume 2',
            'page_count' => '1244',
            'price' => '45',
            'release_date' => '2012-12-31',
            'description' => 'The beloved sequel to the bestselling classic, Mastering the Art of French Cooking, Volume II presents more fantastic step-by-step French recipes for home cooks.

Working from the principle that "mastering any art is a continuing process," Julia Child and Simone Beck gathered together a brilliant selection of new dishes to bring you to a yet higher level of culinary mastery.

They have searched out more of the classic dishes and regional specialties of France, and adapted them so that Americans, working with American ingredients, in American kitchens, can achieve the incomparable flavors and aromas that bring up a rush of memories-of lunch at a country inn in Provence, of an evening at a great Paris restaurant, of the essential cooking of France.ext',
            'publisher_id' => '7',
            'user_id' => '15'],
        [
            'name' => 'The French Chef Cookbook',
            'page_count' => '1343',
            'price' => '19',
            'release_date' => '2022-02-04',
            'description' => 'The beloved icon and author of best-selling classic Mastering the Art of French Cooking presents an array of delectable French recipes that first made her a household name.

Originally debuted on her first public television show, here are 119 traditional French recipes, tested and perfected for home cooks to enjoy-from Mayonnaise to Bouillabaisse, crepes to steaks, and delicious vegetables to delectable desserts. America\'s first lady of food continues to profoundly shaped the way we cook, the way we eat, and the way we see food.',
            'publisher_id' => '7',
            'user_id' => '15'],
        [
            'name' => 'Julia\'s Kitchen Wisdom',
            'page_count' => '6544',
            'price' => '45',
            'release_date' => '2010-02-03',
            'description' => 'In this indispensable volume of kitchen wisdom, Julia Child gives home cooks the answers to their most pressing cooking questions-with essential information about soups, vegetables, eggs, baking breads and tarts, and more.

How many minutes should you cook green beans? What are the right proportions for a vinaigrette? How do you skim off fat? What is the perfect way to roast a chicken?

Here Julia provides solutions for these and many other everyday cooking queries. How are you going to cook that small rib steak you brought home? You\'ll be guided to the quick sauté as the best and fastest way. And once you\'ve mastered that recipe, you can apply the technique to chops, chicken, or fish, following Julia\'s careful guidelines.',
            'publisher_id' => '7',
            'user_id' => '15'],
        [
            'name' => 'People Who Love to Eat Are Always the Best People',
            'page_count' => '91',
            'price' => '62',
            'release_date' => '2020-04-06',
            'description' => 'Perfect for home cooks, Julia fans, and anyone who simply loves to eat and drink-a delightful collection of the beloved chef and bestselling author\'s words of wisdom on love, life, and, of course, food.

"If you\'re afraid of butter, use cream.\\" So decrees Julia Child, the legendary culinary authority and cookbook author who taught America how to cook-and how to eat. This delightful volume of quotations compiles some of Julia\'s most memorable lines on eating-"The only time to eat diet food is while you\'re waiting for the steak to cook"-on drinking, on life-"I think every woman should have a blowtorch"-on love, travel, France, and much more.',
            'publisher_id' => '7',
            'user_id' => '15'],
        [
            'name' => 'The Way to Cook',
            'page_count' => '528',
            'price' => '77',
            'release_date' => '1989-01-31',
            'description' => 'In her most creative and instructive cookbook, Julia Child distills a lifetime of cooking into 800 recipes emphasizing lightness, freshness, and simplicity. Chapters are structured around master recipes, followed by innumerable variations that are easily made once the basics are understood. For example, make Julia\'s simple but impeccably prepared sauté of chicken, and before long you\'re easily whipping up Chicken with Mushrooms and Cream, Chicken Provençale, Chicken Pipérade, or Chicken Marengo. Or master her perfect broiled butterflied chicken, and you\'ll soon be including Deviled Rabbit or Split Cornish Game Hens Broiled with Cheese on your menu.

Here home cooks will find a treasure trove of poultry and fish recipes, as well as a vast array of fresh vegetables prepared in new ways, along with bread doughs and delicious indulgences, such as Caramel Apple Mountain or a Queen of Sheba Chocolate Almond Cake with Chocolate Leaves. And if you want to know how a finished dish should look or how to angle your knife or to fashion a pretty rosette on a cake, there are more than 600 color photographs to entice and instruct you along the way. A brilliant, inspiring, one-of-a-kind, book from the incomparable Julia Child, The Way to Cook is a testament to the satisfactions of good home cooking.',
            'publisher_id' => '7',
            'user_id' => '15'],
        [
            'name' => 'Julia and Jacques Cooking at Home',
            'page_count' => '448',
            'price' => '43',
            'release_date' => '1999-03-06',
            'description' => 'Two legendary cooks invite us into their kitchen and show us the basics of good home cooking.

Julia Child and Jacques Pépin are synonymous with good food, and in these pages they demonstrate techniques (on which they don\'t always agree), discuss ingredients, improvise, balance flavors to round out a meal, and conjure up new dishes from leftovers. Center stage are carefully spelled-out recipes flanked by Julia\'s and Jacques\'s comments-the accumulated wisdom of two lifetimes of honing their cooking skills. Nothing is written in stone, they imply. And that is one of the most important lessons for every good cook.',
            'publisher_id' => '7',
            'user_id' => '15'],
        [
            'name' => 'My Life in France',
            'page_count' => '336',
            'price' => '32',
            'release_date' => '2006-09-03',
            'description' => 'Julia\'s story of her transformative years in France in her own words is "captivating ... her marvelously distinctive voice is present on every page." (San Francisco Chronicle).

Although she would later singlehandedly create a new approach to American cuisine with her cookbook Mastering the Art of French Cooking and her television show The French Chef, Julia Child was not always a master chef. Indeed, when she first arrived in France in 1948 with her husband, Paul, who was to work for the USIS, she spoke no French and knew nothing about the country itself.',
            'publisher_id' => '7',
            'user_id' => '15'],
        [
            'name' => 'Baking with Julia',
            'page_count' => '512',
            'price' => '15',
            'release_date' => '1996-04-27',
            'description' => 'Nothing promises pleasure more readily than the words "freshly baked." And nothing says magnum opus as definitively as Baking with Julia, which offers the dedicated home cook, whether a novice or seasoned veteran, a unique distillation of the baker\'s art.

Baking with Julia is not only a book full of glorious recipes but also one that continues Julia\'s teaching tradition. Here, basic techniques come alive and are made easily comprehensible in recipes that demonstrate the myriad ways of raising dough, glazing cakes, and decorating crusts. This is the resource you\'ll turn to again and again for all your baking needs. With Baking with Julia in your cookbook library, you can become a master baker.',
            'publisher_id' => '7',
            'user_id' => '15'],
        [
            'name' => 'Julia\'s Breakfasts, Lunches, and Suppers: Seven me',
            'page_count' => '113',
            'price' => '45',
            'release_date' => '1999-04-25',
            'description' => 'Here are seven menus to make any meal a treat--morning, noon, or evening. From a breezy Holiday Lunch featuring a melon-sized pate of chicken and a salad of skewered vegetables to a homey Sunday Night Supper of corned beef and pork with a fresh tomato fondue, Julia shows you how to plan ahead and cook without trepidation. Her incomparable step-by-step recipes, shopping lists, variations, and suggestions for leftovers are complemented by more than 100 photographs and ensure success with every meal.',
            'publisher_id' => '7',
            'user_id' => '15'],
        [
            'name' => 'One: Simple One-Pan Wonders',
            'page_count' => '312',
            'price' => '21',
            'release_date' => '2023-01-01',
            'description' => 'One is the ultimate cookbook that will make getting good food on the table easier than ever before . . . Jamie Oliver is back to basics with over 120 simple, delicious, ONE pan recipes.

In ONE, Jamie Oliver will guide you through over 120 recipes for tasty, fuss-free and satisfying dishes cooked in just one pan. What\'s better: each recipe has just eight ingredients or fewer, meaning minimal prep (and cleaning up) and offering maximum convenience.

Packed with budget-friendly dishes you can rustle up any time, ONE has everything from delicious work from home lunches to quick dinners the whole family will love; from meat-free options to meals that will get novice cooks started.',
            'publisher_id' => '8',
            'user_id' => '14'],
        [
            'name' => '5 Ingredients: Quick & Easy Food',
            'page_count' => '490',
            'price' => '54',
            'release_date' => '2019-01-08',
            'description' => 'Jamie Oliver--one of the bestselling cookbook authors of all time--is back with a bang. Focusing on incredible combinations of just five ingredients, he\'s created 130 brand-new recipes that you can cook up at home, any day of the week. From salads, pasta, chicken, and fish to exciting ways with vegetables, rice and noodles, beef, pork, and lamb, plus a bonus chapter of sweet treats, Jamie\'s got all the bases covered. This is about maximum flavor with minimum fuss, lots of nutritious options, and loads of epic inspiration.',
            'publisher_id' => '8',
            'user_id' => '14'],
        [
            'name' => 'Jamie\'s 30-Minute Meals',
            'page_count' => '408',
            'price' => '55',
            'release_date' => '2017-05-04',
            'description' => 'Jamie Oliver will teach you how to make good food super-fast in his game-changing guide to coordinating an entire meal without any fuss.

With 50 exciting, seasonal meal ideas, Jamie\'s 30 Minute Meals provides the essential collection of dishes for putting on the ultimate three-course meal without taking up your time.

Not only that, Jamie also includes refreshing, light lunch recipes that you can put together in no time at all.',
            'publisher_id' => '8',
            'user_id' => '14'],
        [
            'name' => 'Together: Memorable Meals Made Easy',
            'page_count' => '350',
            'price' => '64',
            'release_date' => '2021-01-09',
            'description' => 'Welcome friends and family back around your table with Jamie Oliver\'s brand-new cookbook, Together - a joyous celebration of incredible food to share.

Being with our loved ones has never felt so important, and great food is the perfect excuse to get together. Each chapter features a meal, from seasonal feasts to curry nights, with a simple, achievable menu that can be mostly prepped ahead.

Jamie\'s aim - whether you\'re following the full meal or choosing just one of the 130 individual recipes - is to minimize your time in the kitchen so you can maximize the time you spend with your guests.',
            'publisher_id' => '8',
            'user_id' => '14'],
        [
            'name' => 'Ultimate Veg',
            'page_count' => '468',
            'price' => '21',
            'release_date' => '2020-05-05',
            'description' => 'Jamie Oliver, one of the bestselling cookbook authors of all time, is back with brilliantly easy, delicious, and flavor-packed vegetable recipes.

This edition has been adapted for the US market. It was originally published in the UK under the title Veg.

From simple suppers and family favorites, to weekend dishes for sharing with friends, this book is packed full of phenomenal food - pure and simple.',
            'publisher_id' => '8',
            'user_id' => '14'],
        [
            'name' => 'Hackers',
            'page_count' => '654',
            'price' => '35',
            'release_date' => '2010-04-05',
            'description' => 'This 25th anniversary edition of Steven Levy\'s classic book traces the exploits of the computer revolution\'s original hackers -- those brilliant and eccentric nerds from the late 1950s through the early \'80s who took risks, bent the rules, and pushed the world in a radical new direction. With updated material from noteworthy hackers such as Bill Gates, Mark Zuckerberg, Richard Stallman, and Steve Wozniak, Hackers is a fascinating story that begins in early computer research labs and leads to the first home computers.

Levy profiles the imaginative brainiacs who found clever and unorthodox solutions to computer engineering problems. They had a shared sense of values, known as "the hacker ethic," that still thrives today. Hackers captures a seminal period in recent history when underground activities blazed a trail for today\'s digital world, from MIT students finagling access to clunky computer-card machines to the DIY culture that spawned the Altair and the Apple II.',
            'publisher_id' => '9',
            'user_id' => '13'],
        [
            'name' => 'In the Plex',
            'page_count' => '461',
            'price' => '53',
            'release_date' => '2011-12-08',
            'description' => '"The most interesting book ever written about Google" (The Washington Post) delivers the inside story behind the most successful and admired technology company of our time, now updated with a new Afterword.

Google is arguably the most important company in the world today, with such pervasive influence that its name is a verb. The company founded by two Stanford graduate students-Larry Page and Sergey Brin-has become a tech giant known the world over. Since starting with its search engine, Google has moved into mobile phones, computer operating systems, power utilities, self-driving cars, all while remaining the most powerful company in the advertising business.

Granted unprecedented access to the company, Levy disclosed that the key to Google\'s success in all these businesses lay in its engineering mindset and adoption of certain internet values such as speed, openness, experimentation, and risk-taking. Levy discloses details behind Google\'s relationship with China, including how Brin disagreed with his colleagues on the China strategy-and why its social networking initiative failed; the first time Google tried chasing a successful competitor. He examines Google\'s rocky relationship with government regulators, particularly in the EU, and how it has responded when employees left the company for smaller, nimbler start-ups.',
            'publisher_id' => '9',
            'user_id' => '13'],
        [
            'name' => 'Crypto',
            'page_count' => '370',
            'price' => '32',
            'release_date' => '2001-07-03',
            'description' => 'If you\'ve ever made a secure purchase with your credit card over the Internet, then you have seen cryptography, or "crypto", in action. From Stephen Levy-the author who made "hackers" a household word-comes this account of a revolution that is already affecting every citizen in the twenty-first century. Crypto tells the inside story of how a group of "crypto rebels"-nerds and visionaries turned freedom fighters-teamed up with corporate interests to beat Big Brother and ensure our privacy on the Internet. Levy\'s history of one of the most controversial and important topics of the digital age reads like the best futuristic fiction.',
            'publisher_id' => '9',
            'user_id' => '13'],
        [
            'name' => 'Facebook: The Inside Story',
            'page_count' => '592',
            'price' => '43',
            'release_date' => '2020-09-06',
            'description' => 'One of the Best Technology Books of 2020-Financial Times

"Levy\'s all-access Facebook reflects the reputational swan dive of its subject. . . . The result is evenhanded and devastating."-San Francisco Chronicle

The definitive history, packed with untold stories, of one of America\'s most controversial and powerful companies: Facebook',
            'publisher_id' => '9',
            'user_id' => '13'],
        [
            'name' => 'Insanely Great',
            'page_count' => '338',
            'price' => '65',
            'release_date' => '2012-03-04',
            'description' => 'The creation of the Mac in 1984 catapulted America into the digital millennium, captured a fanatic cult audience, and transformed the computer industry into an unprecedented mix of technology, economics, and show business. Now veteran technology writer and Newsweek senior editor Steven Levy zooms in on the great machine and the fortunes of the unique company responsible for its evolution. Loaded with anecdote and insight, and peppered with sharp commentary, Insanely Great is the definitive book on the most important computer ever made. It is a must-have for anyone curious about how we got to the interactive age.

This new edition includes a never-before-seen transcript of an interview with Steve Jobs.',
            'publisher_id' => '9',
            'user_id' => '13'],
        [
            'name' => 'The Code Breaker',
            'page_count' => '552',
            'price' => '64',
            'release_date' => '2020-02-01',
            'description' => 'The bestselling author of Leonardo da Vinci and Steve Jobs returns with a "compelling" (The Washington Post) account of how Nobel Prize winner Jennifer Doudna and her colleagues launched a revolution that will allow us to cure diseases, fend off viruses, and have healthier babies.

When Jennifer Doudna was in sixth grade, she came home one day to find that her dad had left a paperback titled The Double Helix on her bed. She put it aside, thinking it was one of those detective tales she loved. When she read it on a rainy Saturday, she discovered she was right, in a way. As she sped through the pages, she became enthralled by the intense drama behind the competition to discover the code of life. Even though her high school counselor told her girls didn\'t become scientists, she decided she would.

Driven by a passion to understand how nature works and to turn discoveries into inventions, she would help to make what the book\'s author, James Watson, told her was the most important biological advance since his codiscovery of the structure of DNA. She and her collaborators turned a curiosity of nature into an invention that will transform the human race: an easy-to-use tool that can edit DNA. Known as CRISPR, it opened a brave new world of medical miracles and moral questions.',
            'publisher_id' => '9',
            'user_id' => '12'],
        [
            'name' => 'The Wise Men: Six Friends and the World They Made',
            'page_count' => '873',
            'price' => '45',
            'release_date' => '2012-03-12',
            'description' => 'With a new introduction by the authors, this is the classic account of the American statesmen who rebuilt the world after the catastrophe of World War II.

A captivating blend of personal biography and public drama, The Wise Men introduces six close friends who shaped the role their country would play in the dangerous years following World War II.

They were the original best and brightest, whose towering intellects, outsize personalities, and dramatic actions would bring order to the postwar chaos and leave a legacy that dominates American policy to this day.',
            'publisher_id' => '9',
            'user_id' => '12'],
        [
            'name' => 'The Innovators',
            'page_count' => '560',
            'price' => '34',
            'release_date' => '2014-02-09',
            'description' => 'Following his blockbuster biography of Steve Jobs, Walter Isaacson\'s New York Times bestselling and critically acclaimed The Innovators is a "riveting, propulsive, and at times deeply moving" (The Atlantic) story of the people who created the computer and the internet.

What were the talents that allowed certain inventors and entrepreneurs to turn their visionary ideas into disruptive realities? What led to their creative leaps? Why did some succeed and others fail?

The Innovators is a masterly saga of collaborative genius destined to be the standard history of the digital revolution-and an indispensable guide to how innovation really happens. Isaacson begins the adventure with Ada Lovelace, Lord Byron\'s daughter, who pioneered computer programming in the 1840s. He explores the fascinating personalities that created our current digital revolution, such as Vannevar Bush, Alan Turing, John von Neumann, J.C.R. Licklider, Doug Engelbart, Robert Noyce, Bill Gates, Steve Wozniak, Steve Jobs, Tim Berners-Lee, and Larry Page.',
            'publisher_id' => '9',
            'user_id' => '12'],
        [
            'name' => 'Leonardo da Vinci',
            'page_count' => '625',
            'price' => '53',
            'release_date' => '2017-04-12',
            'description' => 'The #1 New York Times bestseller from Walter Isaacson brings Leonardo da Vinci to life in this exciting new biography that is "a study in creativity: how to define it, how to achieve it…Most important, it is a powerful story of an exhilarating mind and life" (The New Yorker).

Based on thousands of pages from Leonardo da Vinci\'s astonishing notebooks and new discoveries about his life and work, Walter Isaacson "deftly reveals an intimate Leonardo" (San Francisco Chronicle) in a narrative that connects his art to his science. He shows how Leonardo\'s genius was based on skills we can improve in ourselves, such as passionate curiosity, careful observation, and an imagination so playful that it flirted with fantasy.

He produced the two most famous paintings in history, The Last Supper and the Mona Lisa. With a passion that sometimes became obsessive, he pursued innovative studies of anatomy, fossils, birds, the heart, flying machines, botany, geology, and weaponry. He explored the math of optics, showed how light rays strike the cornea, and produced illusions of changing perspectives in The Last Supper. His ability to stand at the crossroads of the humanities and the sciences, made iconic by his drawing of Vitruvian Man, made him history\'s most creative genius.',
            'publisher_id' => '9',
            'user_id' => '12'],
        [
            'name' => 'Einstein: His Life and Universe',
            'page_count' => '710',
            'price' => '34',
            'release_date' => '2022-06-16',
            'description' => 'By the author of the acclaimed bestsellers Benjamin Franklin and Steve Jobs, this is the definitive biography of Albert Einstein.

How did his mind work? What made him a genius? Isaacson\'s biography shows how his scientific imagination sprang from the rebellious nature of his personality. His fascinating story is a testament to the connection between creativity and freedom.

Based on newly released personal letters of Einstein, this book explores how an imaginative, impertinent patent clerk-a struggling father in a difficult marriage who couldn\'t get a teaching job or a doctorate-became the mind reader of the creator of the cosmos, the locksmith of the mysteries of the atom, and the universe. His success came from questioning conventional wisdom and marveling at mysteries that struck others as mundane. This led him to embrace a morality and politics based on respect for free minds, free spirits, and free individuals.',
            'publisher_id' => '9',
            'user_id' => '12'],
        [
            'name' => 'Green Eggs and Ham',
            'page_count' => '65',
            'price' => '66',
            'release_date' => '2013-08-02',
            'description' => 'Join in the fun with Sam-I-Am in this iconic classic by Dr. Seuss that will have readers of all ages craving Green Eggs and Ham! This is a beloved classic from the bestselling author of Horton Hears a Who!, The Lorax, and Oh, the Places You\'ll Go!

With unmistakable characters and signature rhymes, Dr. Seuss\'s beloved favorite has cemented its place as a children\'s classic. Kids will love the terrific tongue-twisters as the list of places to enjoy green eggs and ham gets longer and longer...and they might even learn a thing or two about trying new things!

And don\'t miss the Netflix series adaptation!',
            'publisher_id' => '10',
            'user_id' => '5'],
        [
            'name' => 'Oh, the Places You\'ll Go!',
            'page_count' => '56',
            'price' => '45',
            'release_date' => '2013-01-03',
            'description' => 'Dr. Seuss\'s wonderfully wise Oh, the Places You\'ll Go! is the perfect gift to celebrate all of our special milestones-from graduations to birthdays and beyond!

From soaring to high heights and seeing great sights to being left in a Lurch on a prickle-ly perch, Dr. Seuss addresses life\'s ups and downs with his trademark humorous verse and whimsical illustrations.

The inspiring and timeless message encourages readers to find the success that lies within, no matter what challenges they face. A perennial favorite and a perfect gift for anyone starting a new phase in their life!',
            'publisher_id' => '10',
            'user_id' => '5'],
        [
            'name' => 'One Fish Two Fish Red Fish Blue Fish',
            'page_count' => '67',
            'price' => '23',
            'release_date' => '2013-09-08',
            'description' => 'Count and explore the zany world and words of Seuss in this classic picture book.

From counting to opposites to Dr. Seuss\'s signature silly rhymes, this book has everything a beginning reader needs! Meet the bumpy Wump and the singing Ying, and even the winking Yink who drinks pink ink. The silly rhymes and colorful cast of characters will have every child giggling from morning to night.

Originally created by Dr. Seuss himself, Beginner Books are fun, funny, and easy to read. These unjacketed hardcover early readers encourage children to read all on their own, using simple words and illustrations. Smaller than the classic large format Seuss picture books like The Lorax and Oh, the Places You\'ll Go!, these portable packages are perfect for practicing readers ages 3-7, and lucky parents too!',
            'publisher_id' => '10',
            'user_id' => '5'],
        [
            'name' => 'The Cat in the Hat',
            'page_count' => '345',
            'price' => '14',
            'release_date' => '2013-09-02',
            'description' => 'Have a ball with Dr. Seuss and the Cat in the Hat in this classic picture book...but don\'t forget to clean up your mess!

A dreary day turns into a wild romp when this beloved story introduces readers to the Cat in the Hat and his troublemaking friends, Thing 1 and Thing 2. A favorite among kids, parents and teachers, this story uses simple words and basic ryhme to encourage and delight beginning readers.

Originally created by Dr. Seuss himself, Beginner Books are fun, funny, and easy to read. These unjacketed hardcover early readers encourage children to read all on their own, using simple words and illustrations. Smaller than the classic large format Seuss picture books like The Lorax and Oh, The Places You\'ll Go!, these portable packages are perfect for practicing readers ages 3-7, and lucky parents too!',
            'publisher_id' => '10',
            'user_id' => '5'],
        [
            'name' => 'How the Grinch Stole Christmas',
            'page_count' => '64',
            'price' => '12',
            'release_date' => '2013-02-12',
            'description' => 'Grow your heart three sizes and get in on all of the Grinch-mas cheer with this Christmas classic--the ultimate Dr. Seuss holiday book that no collection is complete without!

Every Who down in Who-ville liked Christmas a lot . . . but the Grinch, who lived just north of Who-ville, did NOT!

Not since "\'Twas the night before Christmas" has the beginning of a Christmas tale been so instantly recognizable. This heartwarming story about the effects of the Christmas spirit will grow even the coldest and smallest of hearts. Like mistletoe, candy canes, and caroling, the Grinch is a mainstay of the holidays, and his story is the perfect gift for readers young and old.',
            'publisher_id' => '10',
            'user_id' => '5'],
        [
            'name' => 'Fox in Socks',
            'page_count' => '62',
            'price' => '13',
            'release_date' => '2013-07-17',
            'description' => 'Find out how wacky words can be with Dr. Seuss and the Fox in Socks in this classic hardcover picture book of tongue tanglers!

This rhyming romp includes chicks with bricks, chewy blue glue, a noodle eating poodle, and so much more! Just try to keep your tongue out of trouble! Seuss piles his the energetic rhymes into a mountain of hilarity that the whole family will enjoy. Rhyming has never been this fun!

Originally created by Dr. Seuss himself, Beginner Books are fun, funny, and easy to read. These unjacketed hardcover early readers encourage children to read all on their own, using simple words and illustrations. Smaller than the classic large format Seuss picture books like The Lorax and Oh, The Places You\'ll Go!, these portable packages are perfect for practicing readers ages 3-7, and lucky parents too!',
            'publisher_id' => '10',
            'user_id' => '5'],
        [
            'name' => 'The Sneetches and Other Stories',
            'page_count' => '72',
            'price' => '11',
            'release_date' => '2013-06-25',
            'description' => 'An iconic collection of original stories from Dr. Seuss that includes the official versions of "The Sneetches," "The Zax," "Too Many Daves," and "What Was I Scared Of?" This is a beloved classic that deserves a place in every child\'s library-from the bestselling author of Horton Hears a Who!, The Lorax, and Oh, the Places You\'ll Go!

In these four timeless stories, Dr. Seuss challenges the assumption that we need to look the same or behave the same to find common ground. Filled with Dr. Seuss\'s signature rhymes and lively humor, this classic story collection is a must-have for readers of all ages, and is ideal for sparking discussions about tolerance, diversity, and acceptance.',
            'publisher_id' => '10',
            'user_id' => '5'],
        [
            'name' => 'The Lorax',
            'page_count' => '72',
            'price' => '14',
            'release_date' => '2013-02-16',
            'description' => 'Celebrate Earth Day with Dr. Seuss and the Lorax in this classic picture book about protecting the environment!

Dr. Seuss\'s beloved story teaches kids to speak up and stand up for those who can\'t. With a recycling-friendly "Go Green" message, The Lorax allows young readers to experience the beauty of the Truffula Trees and the danger of taking our earth for granted, all in a story that is timely, playful and hopeful. The book\'s final pages teach us that just one small seed, or one small child, can make a difference.

Printed on recycled paper, this book is the perfect gift for Earth Day and for any child-or child at heart-who is interested in recycling, advocacy and the environment, or just loves nature and playing outside.',
            'publisher_id' => '10',
            'user_id' => '5'],
        [
            'name' => 'Dr. Seuss\'s ABC',
            'page_count' => '63',
            'price' => '14',
            'release_date' => '2013-03-02',
            'description' => 'Arguably the most entertaining alphabet book ever written, this classic Beginner Book by Dr. Seuss is perfect for children learning their ABCs. Featuring a fantastic cast of zany characters-from Aunt Annie\'s alligator to the Zizzer-Zazzer-Zuzz, with a lazy lion licking a lollipop and an ostrich oiling an orange owl-Dr. Seuss\'s ABC is a must-have for every young child\'s library.

Originally created by Dr. Seuss, Beginner Books encourage children to read all by themselves, with simple words and illustrations that give clues to their meaning.',
            'publisher_id' => '10',
            'user_id' => '5'],
        [
            'name' => 'Hop on Pop',
            'page_count' => '75',
            'price' => '9',
            'release_date' => '2013-05-12',
            'description' => 'Join Dr. Seuss in this classic rhyming picture book-"the simplest Seuss for youngest use."

Full of short, simple words and silly rhymes, this book is perfect for reading alone or reading aloud with Dad!  The rollicking rythym will keep kids entertained on every page, and it\'s an especially good way to  show Pop some love on Father\'s Day!

Originally created by Dr. Seuss himself, Beginner Books are fun, funny, and easy to read. These unjacketed hardcover early readers encourage children to read all on their own, using simple words and illustrations. Smaller than the classic large format Seuss picture books like The Lorax and Oh, The Places You\'ll Go!, these portable packages are perfect for practicing readers ages 3-7, and lucky parents too!',
            'publisher_id' => '10',
            'user_id' => '5'],
        [
            'name' => 'Matilda',
            'page_count' => '240',
            'price' => '21',
            'release_date' => '2007-12-03',
            'description' => 'Now a musical on broadway and streaming on Netflix!

Matilda is a sweet, exceptional young girl, but her parents think she\'s just a nuisance. She expects school to be different but there she has to face Miss Trunchbull, a menacing, kid-hating headmistress. When Matilda is attacked by the Trunchbull she suddenly discovers she has a remarkable power with which to fight back. It\'ll take a superhuman genius to give Miss Trunchbull what she deserves and Matilda may be just the one to do it!

Here is Roald Dahl\'s original novel of a little girl with extraordinary powers. This much-loved story has recently been made into a wonderful new musical, adapted by Dennis Kelly with music and lyrics by Tim Minchin.',
            'publisher_id' => '11',
            'user_id' => '6'],
        [
            'name' => 'Charlie and the Chocolate Factory',
            'page_count' => '162',
            'price' => '14',
            'release_date' => '2007-04-26',
            'description' => 'Willy Wonka\'s famous chocolate factory is opening at last!

But only five lucky children will be allowed inside. And the winners are: Augustus Gloop, an enormously fat boy whose hobby is eating; Veruca Salt, a spoiled-rotten brat whose parents are wrapped around her little finger; Violet Beauregarde, a dim-witted gum-chewer with the fastest jaws around; Mike Teavee, a toy pistol-toting gangster-in-training who is obsessed with television; and Charlie Bucket, Our Hero, a boy who is honest and kind, brave and true, and good and ready for the wildest time of his life!

',
            'publisher_id' => '11',
            'user_id' => '6'],
        [
            'name' => 'James and the Giant Peach',
            'page_count' => '153',
            'price' => '14',
            'release_date' => '2007-08-24',
            'description' => 'From the World\'s No. 1 Storyteller, James and the Giant Peach is a children\'s classic that has captured young reader\'s imaginations for generations.

One of TIME MAGAZINE\'s 100 Best Fantasy Books of All Time

After James Henry Trotter\'s parents are tragically eaten by a rhinoceros, he goes to live with his two horrible aunts, Spiker and Sponge. Life there is no fun, until James accidentally drops some magic crystals by the old peach tree and strange things start to happen. The peach at the top of the tree begins to grow, and before long it\'s as big as a house. Inside, James meets a bunch of oversized friends-Grasshopper, Centipede, Ladybug, and more. With a snip of the stem, the peach starts rolling away, and the great adventure begins!',
            'publisher_id' => '11',
            'user_id' => '6'],
        [
            'name' => 'The BFG',
            'page_count' => '208',
            'price' => '16',
            'release_date' => '2007-01-21',
            'description' => 'Roald Dahl\'s beloved novel hits the big screen in July 2016 in a major motion picture adaptation directed by Steven Spielberg from Amblin Entertainment and Walt Disney Pictures.

When Sophie is snatched from her orphanage bed by the BFG (Big Friendly Giant), she fears she will be eaten. But instead the two join forces to vanquish the nine other far less gentle giants who threaten to consume earth\'s children. This beautiful hardcover gift edition of Dahl\'s classic features the original illustrations by Quentin Blake, as well as a silk ribbon marker, acid-free paper, gilt stamping on a full-cloth cover, decorative endpapers, and a sewn binding.',
            'publisher_id' => '11',
            'user_id' => '6'],
        [
            'name' => 'Charlie and the Great Glass Elevator',
            'page_count' => '165',
            'price' => '13',
            'release_date' => '2007-06-21',
            'description' => 'From the bestselling author of Charlie and the Chocolate Factory and The BFG!

Last seen flying through the sky in a giant elevator in Charlie and the Chocolate Factory, Charlie Bucket\'s back for another adventure. When the giant elevator picks up speed, Charlie, Willy Wonka, and the gang are sent hurtling through space and time. Visiting the world\'\' first space hotel, battling the dreaded Vermicious Knids, and saving the world are only a few stops along this remarkable, intergalactic joyride.',
            'publisher_id' => '11',
            'user_id' => '6'],
        [
            'name' => 'Dreamland',
            'page_count' => '359',
            'price' => '16',
            'release_date' => '2022-11-04',
            'description' => '#1 NEW YORK TIMES BESTSELLER • A twist you won\'t see coming. A love story you\'ll never forget. From the acclaimed author of The Notebook comes a powerful novel about risking everything for a dream-and whether it\'s possible to leave the past behind.

We don\'t always get to choose our paths in life; sometimes they choose us.

After fleeing an abusive husband with her six-year-old son, Tommie, Beverly is attempting to create a new life for them in a small town off the beaten track. Despite their newfound freedom, Beverly is constantly on guard: she creates a fake backstory, wears a disguise around town, and buries herself in DIY projects to stave off anxiety. But her stress only rises when Tommie insists he\'d been hearing someone walking on the roof and calling his name late at night. With money running out and danger seemingly around every corner, she makes a desperate decision that will rewrite everything she knows to be true. . . .',
            'publisher_id' => '12',
            'user_id' => '7'],
        [
            'name' => 'The Wish',
            'page_count' => '401',
            'price' => '21',
            'release_date' => '2021-03-17',
            'description' => 'With exclusive travel photos and a special letter from the Author, only available for e-readers.

From the author of The Longest Ride and The Return comes a novel about the enduring legacy of first love, and the decisions that haunt us forever.

1996 was the year that changed everything for Maggie Dawes. Sent away at sixteen to live with an aunt she barely knew in Ocracoke, a remote village on North Carolina\'s Outer Banks, she could think only of the friends and family she left behind . . . until she met Bryce Trickett, one of the few teenagers on the island. Handsome, genuine, and newly admitted to West Point, Bryce showed her how much there was to love about the wind-swept beach town-and introduced her to photography, a passion that would define the rest of her life.',
            'publisher_id' => '12',
            'user_id' => '7'],
        [
            'name' => 'Every Breath',
            'page_count' => '321',
            'price' => '32',
            'release_date' => '2018-04-24',
            'description' => 'Treat yourself to an epic #1 New York Times bestselling love story that spans decades and continents as two people at a crossroads -- one from North Carolina and one from Zimbabwe -- experience the transcendence and heartbreak of true love.

Hope Anderson has some important choices to make. At thirty-six, she\'s been dating her boyfriend, an orthopedic surgeon, for six years. With no wedding plans in sight, and her father recently diagnosed with ALS, she decides to use a week at her family\'s cottage in Sunset Beach, North Carolina, to ready the house for sale and mull over some difficult decisions about her future.

Tru Walls has never visited North Carolina but is summoned to Sunset Beach by a letter from a man claiming to be his father. A safari guide, born and raised in Zimbabwe, Tru hopes to unravel some of the mysteries surrounding his mother\'s early life and recapture memories lost with her death. When the two strangers cross paths, their connection is as electric as it is unfathomable . . . but in the immersive days that follow, their feelings for each other will give way to choices that pit family duty against personal happiness in devastating ways.',
            'publisher_id' => '12',
            'user_id' => '7'],
        [
            'name' => 'The Return',
            'page_count' => '369',
            'price' => '64',
            'release_date' => '2020-06-21',
            'description' => 'In the romantic tradition of Dear John, an injured Navy doctor meets two extremely important women whose secrets will change the course of his life in this #1 New York Times bestseller.

Trevor Benson never intended to move back to New Bern, North Carolina. But when a mortar blast outside the hospital where he worked sent him home from Afghanistan with devastating injuries, the dilapidated cabin he\'d inherited from his grandfather seemed as good a place to regroup as any.

Tending to his grandfather\'s beloved beehives, Trevor isn\'t prepared to fall in love with a local . . . yet, from their very first encounter, Trevor feels a connection with deputy sheriff Natalie Masterson that he can\'t ignore. But even as she seems to reciprocate his feelings, she remains frustratingly distant, making Trevor wonder what she\'s hiding.',
            'publisher_id' => '12',
            'user_id' => '7'],
        [
            'name' => 'The Rescue',
            'page_count' => '433',
            'price' => '43',
            'release_date' => '2000-05-12',
            'description' => 'In this heartfelt Southern love story from the #1 New York Times bestselling author of The Notebook, a daring fireman rescues a single mom-and learns that falling in love is the greatest risk of all.

When confronted by raging fires or deadly accidents, volunteer fireman Taylor McAden feels compelled to take terrifying risks to save lives. But there is one leap of faith Taylor can\'t bring himself to make: he can\'t fall in love. For all his adult years, Taylor has sought out women who need to be rescued, women he leaves as soon as their crisis is over and the relationship starts to become truly intimate.

When a raging storm hits his small Southern town, single mother Denise Holton\'s car skids off the road. The young mom is with her four-year-old son Kyle, a boy with severe learning disabilities and for whom she has sacrificed everything. Taylor McAden finds her unconscious and bleeding, but does not find Kyle. When Denise wakes, the chilling truth becomes clear to both of them. Kyle is gone. During the search for Kyle, a connection between Taylor and Denise takes root. But Taylor doesn\'t know that this rescue will be different from all the others.',
            'publisher_id' => '12',
            'user_id' => '7'],
        [
            'name' => 'A Bend in the Road',
            'page_count' => '388',
            'price' => '56',
            'release_date' => '2001-03-21',
            'description' => 'Fall in love with this small-town love story about a widower sheriff and a divorced schoolteacher who are searching for second chances -- only to be threatened by long-held secrets of the past.

Miles Ryan\'s life seemed to end the day his wife was killed in a hit-and-run accident two years ago. As deputy sheriff of New Bern, North Carolina, he not only grieves for her and worries about their young son Jonah but longs to bring the unknown driver to justice. Then Miles meets Sarah Andrews, Jonah\'s second-grade teacher. A young woman recovering from a difficult divorce, Sarah moved to New Bern hoping to start over. Tentatively, Miles and Sarah reach out to each other...soon they are falling in love. But what neither realizes is that they are also bound together by a shocking secret, one that will force them to reexamine everything they believe in-including their love.',
            'publisher_id' => '12',
            'user_id' => '7'],
        [
            'name' => 'True Believer',
            'page_count' => '480',
            'price' => '23',
            'release_date' => '2005-06-24',
            'description' => 'Part love story and part ghost story, this is an unforgettable New York Times bestseller about a science journalist and a North Carolina librarian who dare to believe in the impossible.

As a science journalist with a regular column in Scientific American, Jeremy Marsh specializes in debunking the supernatural-until he falls in love with the granddaughter of the town psychic.

When Jeremy receives a letter from Boone Creek, North Carolina, about ghostly lights appearing in a cemetery, he can\'t resist driving down to investigate. Here, in this tightly knit community, Lexie Darnell runs the town\'s library. Disappointed by past relationships, she is sure of one thing: her future is in Boone Creek, close to all the people she loves. From the moment Jeremy sets eyes on Lexie, he is intrigued. And Lexie, while hesitating to trust this outsider, finds herself thinking of him more than she cares to admit. Now, if they are to be together, Jeremy must do something he\'s never done before-take a giant leap of faith.',
            'publisher_id' => '12',
            'user_id' => '7'],
        [
            'name' => 'The Guardian',
            'page_count' => '494',
            'price' => '12',
            'release_date' => '2003-02-02',
            'description' => 'After her husband\'s death, a young widow with a faithful Great Dane must decide between two men -- but as new love blossoms, jealousy turns deadly in this suspenseful New York Times bestseller.

Julie Barenson\'s young husband left her two unexpected gifts before he died - a Great Dane puppy named Singer and the promise that he would always be watching over her. Now four years have passed. Still living in the small town of Swansboro, North Carolina, twenty-nine-year-old Julie is emotionally ready to make a commitment to someone again. But who?

Should it be Richard Franklin, the handsome, sophisticated engineer who treats her like a queen? Or Mike Harris, the down-to-earth nice guy who was her husband\'s best friend? Choosing one of them should bring her more happiness than she\'s had in years. Instead, Julie is soon fighting for her life in a nightmare spawned by a chilling deception and jealousy so poisonous that it has become a murderous desire...',
            'publisher_id' => '12',
            'user_id' => '7'],
        [
            'name' => 'See Me',
            'page_count' => '489',
            'price' => '34',
            'release_date' => '2015-08-24',
            'description' => 'In this suspenseful New York Times bestseller, a chance encounter between a successful lawyer and a rebellious bad boy will change life as they know it forever, as their pasts catch up with them . . .

Colin Hancock is giving his second chance his best shot. With a history of violence and bad decisions behind him and the threat of prison dogging his every step, he\'s determined to walk a straight line. To Colin, that means applying himself single-mindedly toward his teaching degree and avoiding everything that proved destructive in his earlier life. Reminding himself daily of his hard-earned lessons, the last thing he is looking for is a serious relationship.

Maria Sanchez, the hardworking daughter of Mexican immigrants, is the picture of conventional success. With a degree from Duke Law School and a job at a prestigious firm in Wilmington, she is a dark-haired beauty with a seemingly flawless professional track record. And yet Maria has a traumatic history of her own, one that compelled her to return to her hometown and left her questioning so much of what she once believed.',
            'publisher_id' => '12',
            'user_id' => '7'],
        [
            'name' => 'Two by Two',
            'page_count' => '497',
            'price' => '45',
            'release_date' => '2016-07-22',
            'description' => 'In this New York Times bestseller, a single father discovers the true nature of unconditional love when a new chance at happiness turns his world upside down.

At 32, Russell Green has it all: a stunning wife, a lovable six year-old daughter, a successful career as an advertising executive, and an expansive home in Charlotte. He is living the dream, and his marriage to the bewitching Vivian is at the center of it. But underneath the shiny surface of this perfect existence, fault lines are beginning to appear . . . and no one is more surprised than Russ when every aspect of the life he has taken for granted is turned upside down.
In a matter of months, Russ finds himself without a job or a wife, caring for his young daughter while struggling to adapt to a new and baffling reality. Throwing himself into the wilderness of single parenting, Russ embarks on a journey at once terrifying and rewarding -- one that will test his abilities and his emotional resources beyond anything he\'s ever imagined.
',
            'publisher_id' => '12',
            'user_id' => '7'],
        [
            'name' => 'The Choice: The Dragon Heart Legacy',
            'page_count' => '438',
            'price' => '23',
            'release_date' => '2022-07-22',
            'description' => 'The conclusion of the epic trilogy from the #1 New York Times bestselling author of The Awakening and The Becoming.

Talamh is a land of green hills, high mountains, deep forests, and seas, where magicks thrive. But portals allow for passage in and out-and ultimately, each must choose their place, and choose between good and evil, war and peace, life and death…

Breen Siobhan Kelly grew up in the world of Man and was once unaware of her true nature. Now she is in Talamh, trying to heal after a terrible battle and heartbreaking losses. Her grandfather, the dark god Odran, has been defeated in his attempt to rule over Talamh, and over Breen-for now.',
            'publisher_id' => '13',
            'user_id' => '8'],
        [
            'name' => 'The Becoming: The Dragon Heart Legacy',
            'page_count' => '444',
            'price' => '34',
            'release_date' => '2021-01-26',
            'description' => 'A new epic of love and war among gods and humans, from Nora Roberts-the #1 New York Times bestselling author of The Awakening.

The world of magick and the world of man have long been estranged from one another. But some can walk between the two-including Breen Siobhan Kelly. She has just returned to Talamh, with her friend, Marco, who\'s dazzled and disoriented by this realm-a place filled with dragons and faeries and mermaids (but no WiFi, to his chagrin). In Talamh, Breen is not the ordinary young schoolteacher he knew her as. Here she is learning to embrace the powers of her true identity. Marco is welcomed kindly by her people-and by Keegan, leader of the Fey. Keegan has trained Breen as a warrior, and his yearning for her has grown along with his admiration of her strength and skills.

But one member of Breen\'s bloodline is not there to embrace her. Her grandfather, the outcast god Odran, plots to destroy Talamh-and now all must unite to defeat his dark forces. There will be losses and sorrows, betrayal and bloodshed. But through it, Breen Siobhan Kelly will take the next step on the journey to becoming all that she was born to be.',
            'publisher_id' => '13',
            'user_id' => '8'],
        [
            'name' => 'The Awakening: The Dragon Heart Legacy',
            'page_count' => '345',
            'price' => '23',
            'release_date' => '2020-03-21',
            'description' => '#1 New York Times bestselling author Nora Roberts begins a new trilogy of adventure, romance, and magick in The Awakening.

In the realm of Talamh, a teenage warrior named Keegan emerges from a lake holding a sword-representing both power and the terrifying responsibility to protect the Fey. In another realm known as Philadelphia, a young woman has just discovered she possesses a treasure of her own…

When Breen Kelly was a girl, her father would tell her stories of magical places. Now she\'s an anxious twentysomething mired in student debt and working a job she hates. But one day she stumbles upon a shocking discovery: her mother has been hiding an investment account in her name. It has been funded by her long-lost father-and it\'s worth nearly four million dollars.',
            'publisher_id' => '13',
            'user_id' => '8'],
        [
            'name' => 'Nightwork',
            'page_count' => '440',
            'price' => '54',
            'release_date' => '2022-04-24',
            'description' => '#1 New York Times bestselling author Nora Roberts introduces an unforgettable thief in an unputdownable new novel…

Greed. Desire. Obsession. Revenge . . . It\'s all in a night\'s work.

Harry Booth started stealing at nine to keep a roof over his ailing mother\'s head, slipping into luxurious, empty homes at night to find items he could trade for precious cash. When his mother finally succumbed to cancer, he left Chicago-but kept up his nightwork, developing into a master thief with a code of honor and an expertise in not attracting attention?or getting attached.',
            'publisher_id' => '13',
            'user_id' => '8'],
        [
            'name' => 'Courting Catherine: The Calhoun Women',
            'page_count' => '141',
            'price' => '34',
            'release_date' => '2020-03-22',
            'description' => 'First in The Calhoun Women series, #1 New York Times bestselling author Nora Roberts\'s Courting Catherine begins a story of sisters bound by their family\'s ancestral home and determined to forge their own futures.

The once grand mansion known as the Towers has stood on the Maine coast for decades. It was supposed to symbolize the Calhoun family legacy, but instead has fallen into a desperate state of disrepair. Catherine \\"C. C.\\" Calhoun and her sisters have inherited both the mansion and the responsibility of restoring the Towers back to its former glory-only to struggle with escalating costs.

Hotelier Trenton St. James believes the estate\'s time has passed and that the town would be served better if the property were converted into a luxury resort. But his business negotiation skills fail to persuade C. C.-whose fighting spirit and driving passions capture his heart and compel him to build something more loving and lasting between them.',
            'publisher_id' => '13',
            'user_id' => '8'],
        [
            'name' => 'Truman',
            'page_count' => '1120',
            'price' => '54',
            'release_date' => '2003-08-03',
            'description' => 'The Pulitzer Prize-winning biography of Harry S. Truman, whose presidency included momentous events from the atomic bombing of Japan to the outbreak of the Cold War and the Korean War, told by America\'s beloved and distinguished historian.

The life of Harry S. Truman is one of the greatest of American stories, filled with vivid characters-Roosevelt, Churchill, Stalin, Eleanor Roosevelt, Bess Wallace Truman, George Marshall, Joe McCarthy, and Dean Acheson-and dramatic events. In this riveting biography, acclaimed historian David McCullough not only captures the man-a more complex, informed, and determined man than ever before imagined-but also the turbulent times in which he rose, boldly, to meet unprecedented challenges. The last president to serve as a living link between the nineteenth and the twentieth centuries, Truman\'s story spans the raw world of the Missouri frontier, World War I, the powerful Pendergast machine of Kansas City, the legendary Whistle-Stop Campaign of 1948, and the decisions to drop the atomic bomb, confront Stalin at Potsdam, send troops to Korea, and fire General MacArthur. Drawing on newly discovered archival material and extensive interviews with Truman\'s own family, friends, and Washington colleagues, McCullough tells the deeply moving story of the seemingly ordinary "man from Missouri" who was perhaps the most courageous president in our history.',
            'publisher_id' => '6',
            'user_id' => '10'],
        [
            'name' => 'The Path Between the Seas',
            'page_count' => '420',
            'price' => '12',
            'release_date' => '2001-09-03',
            'description' => 'The National Book Award-winning epic chronicle of the creation of the Panama Canal, a first-rate drama of the bold and brilliant engineering feat that was filled with both tragedy and triumph, told by master historian David McCullough.

From the Pulitzer Prize-winning author of Truman, here is the national bestselling epic chronicle of the creation of the Panama Canal. In The Path Between the Seas, acclaimed historian David McCullough delivers a first-rate drama of the sweeping human undertaking that led to the creation of this grand enterprise.

The Path Between the Seas tells the story of the men and women who fought against all odds to fulfill the 400-year-old dream of constructing an aquatic passageway between the Atlantic and Pacific oceans. It is a story of astonishing engineering feats, tremendous medical accomplishments, political power plays, heroic successes, and tragic failures. Applying his remarkable gift for writing lucid, lively exposition, McCullough weaves the many strands of the momentous event into a comprehensive and captivating tale.',
            'publisher_id' => '6',
            'user_id' => '10'],
        [
            'name' => 'The Pioneers',
            'page_count' => '353',
            'price' => '43',
            'release_date' => '2019-01-04',
            'description' => 'The #1 New York Times bestseller by Pulitzer Prize-winning historian David McCullough rediscovers an important chapter in the American story that\'s \\"as resonant today as ever\\" (The Wall Street Journal)-the settling of the Northwest Territory by courageous pioneers who overcame incredible hardships to build a community based on ideals that would define our country.

As part of the Treaty of Paris, in which Great Britain recognized the new United States of America, Britain ceded the land that comprised the immense Northwest Territory, a wilderness empire northwest of the Ohio River containing the future states of Ohio, Indiana, Illinois, Michigan, and Wisconsin. A Massachusetts minister named Manasseh Cutler was instrumental in opening this vast territory to veterans of the Revolutionary War and their families for settlement. Included in the Northwest Ordinance were three remarkable conditions: freedom of religion, free universal education, and most importantly, the prohibition of slavery. In 1788 the first band of pioneers set out from New England for the Northwest Territory under the leadership of Revolutionary War veteran General Rufus Putnam. They settled in what is now Marietta on the banks of the Ohio River

McCullough tells the story through five major characters: Cutler and Putnam; Cutler\'s son Ephraim; and two other men, one a carpenter turned architect, and the other a physician who became a prominent pioneer in American science. "With clarity and incisiveness, [McCullough] details the experience of a brave and broad-minded band of people who crossed raging rivers, chopped down forests, plowed miles of land, suffered incalculable hardships, and braved a lonely frontier to forge a new American ideal" (The Providence Journal).',
            'publisher_id' => '6',
            'user_id' => '10'],
        [
            'name' => '1776',
            'page_count' => '365',
            'price' => '54',
            'release_date' => '2005-05-03',
            'description' => 'America\'s beloved and distinguished historian presents, in a book of breathtaking excitement, drama, and narrative force, the stirring story of the year of our nation\'s birth, 1776, interweaving, on both sides of the Atlantic, the actions and decisions that led Great Britain to undertake a war against her rebellious colonial subjects and that placed America\'s survival in the hands of George Washington.

In this masterful book, David McCullough tells the intensely human story of those who marched with General George Washington in the year of the Declaration of Independence-when the whole American cause was riding on their success, without which all hope for independence would have been dashed and the noble ideals of the Declaration would have amounted to little more than words on paper.',
            'publisher_id' => '6',
            'user_id' => '10'],
        [
            'name' => 'The Great Bridge',
            'page_count' => '609',
            'price' => '34',
            'release_date' => '2007-03-21',
            'description' => 'The dramatic and enthralling story of the building of the Brooklyn Bridge, the world\'s longest suspension bridge at the time, a tale of greed, corruption, and obstruction but also of optimism, heroism, and determination, told by master historian David McCullough.

This monumental book is the enthralling story of one of the greatest events in our nation\'s history, during the Age of Optimism-a period when Americans were convinced in their hearts that all things were possible.

In the years around 1870, when the project was first undertaken, the concept of building an unprecedented bridge to span the East River between the great cities of Manhattan and Brooklyn required a vision and determination comparable to that which went into the building of the great cathedrals. Throughout the fourteen years of its construction, the odds against the successful completion of the bridge seemed staggering. Bodies were crushed and broken, lives lost, political empires fell, and surges of public emotion constantly threatened the project. But this is not merely the saga of an engineering miracle; it is a sweeping narrative of the social climate of the time and of the heroes and rascals who had a hand in either constructing or exploiting the surpassing enterprise.',
            'publisher_id' => '6',
            'user_id' => '10'],
        [
            'name' => 'The Wright Brothers',
            'page_count' => '56',
            'price' => '23',
            'release_date' => '2022-05-01',
            'description' => 'The aim of this book has been to satisfy the curiosity of the average, non-technical reader regarding the work of the Wright Brothers, and to do so as simply as possible. This book has been vetted for accuracy by Orville Wright himself, who has read the manuscript and given generously of his time in verifying the accuracy of various statements and in correcting inaccuracies that otherwise would have appeared.',
            'publisher_id' => '6',
            'user_id' => '10'],
        [
            'name' => 'John Adams',
            'page_count' => '752',
            'price' => '34',
            'release_date' => '2001-12-01',
            'description' => 'The Pulitzer Prize-winning, bestselling biography of America\'s founding father and second president that was the basis for the acclaimed HBO series, brilliantly told by master historian David McCullough.

In this powerful, epic biography, David McCullough unfolds the adventurous life journey of John Adams, the brilliant, fiercely independent, often irascible, always honest Yankee patriot who spared nothing in his zeal for the American Revolution; who rose to become the second president of the United States and saved the country from blundering into an unnecessary war; who was learned beyond all but a few and regarded by some as "out of his senses"; and whose marriage to the wise and valiant Abigail Adams is one of the moving love stories in American history.

This is history on a grand scale-a book about politics and war and social issues, but also about human nature, love, religious faith, virtue, ambition, friendship, and betrayal, and the far-reaching consequences of noble ideas. Above all, John Adams is an enthralling, often surprising story of one of the most important and fascinating Americans who ever lived.',
            'publisher_id' => '6',
            'user_id' => '10'],
        [
            'name' => 'Brave Companions',
            'page_count' => '258',
            'price' => '23',
            'release_date' => '2007-07-01',
            'description' => 'From Alexander von Humboldt to Charles and Anne Lindbergh, these are stories of people of great vision and daring whose achievements continue to inspire us today, brilliantly told by master historian David McCullough.

The bestselling author of Truman and John Adams, David McCullough has written profiles of exceptional men and women past and present who have not only shaped the course of history or changed how we see the world but whose stories express much that is timeless about the human condition.

Here are Alexander von Humboldt, whose epic explorations of South America surpassed the Lewis and Clark expedition; Harriet Beecher Stowe, "the little woman who made the big war"; Frederic Remington; the extraordinary Louis Agassiz of Harvard; Charles and Anne Lindbergh, and their fellow long-distance pilots Antoine de Saint-Exupéry and Beryl Markham; Harry Caudill, the Kentucky lawyer who awakened the nation to the tragedy of Appalachia; and David Plowden, a present-day photographer of vanishing America.',
            'publisher_id' => '6',
            'user_id' => '10'],
        [
            'name' => 'Mornings on Horseback',
            'page_count' => '450',
            'price' => '23',
            'release_date' => '2007-07-02',
            'description' => 'The National Book Award-winning biography that tells the story of how young Teddy Roosevelt transformed himself from a sickly boy into the vigorous man who would become a war hero and ultimately president of the United States, told by master historian David McCullough.

Mornings on Horseback is the brilliant biography of the young Theodore Roosevelt. Hailed as \\"a masterpiece\\" (John A. Gable, Newsday), it is the winner of the Los Angeles Times 1981 Book Prize for Biography and the National Book Award for Biography. Written by David McCullough, the author of Truman, this is the story of a remarkable little boy, seriously handicapped by recurrent and almost fatal asthma attacks, and his struggle to manhood: an amazing metamorphosis seen in the context of the very uncommon household in which he was raised.

The father is the first Theodore Roosevelt, a figure of unbounded energy, enormously attractive and selfless, a god in the eyes of his small, frail namesake. The mother, Mittie Bulloch Roosevelt, is a Southerner and a celebrated beauty, but also considerably more, which the book makes clear as never before. There are sisters Anna and Corinne, brother Elliott (who becomes the father of Eleanor Roosevelt), and the lovely, tragic Alice Lee, TR\'s first love. All are brought to life to make "a beautifully told story, filled with fresh detail" (The New York Times Book Review).',
            'publisher_id' => '6',
            'user_id' => '10'],
        [
            'name' => 'Johnstown Flood',
            'page_count' => '443',
            'price' => '34',
            'release_date' => '2007-01-31',
            'description' => 'The stunning story of one of America\'s great disasters, a preventable tragedy of Gilded Age America, brilliantly told by master historian David McCullough.

At the end of the nineteenth century, Johnstown, Pennsylvania, was a booming coal-and-steel town filled with hardworking families striving for a piece of the nation\'s burgeoning industrial prosperity. In the mountains above Johnstown, an old earth dam had been hastily rebuilt to create a lake for an exclusive summer resort patronized by the tycoons of that same industrial prosperity, among them Andrew Carnegie, Henry Clay Frick, and Andrew Mellon. Despite repeated warnings of possible danger, nothing was done about the dam. Then came May 31, 1889, when the dam burst, sending a wall of water thundering down the mountain, smashing through Johnstown, and killing more than 2,000 people. It was a tragedy that became a national scandal.

Graced by David McCullough\'s remarkable gift for writing richly textured, sympathetic social history, The Johnstown Flood is an absorbing, classic portrait of life in nineteenth-century America, of overweening confidence, of energy, and of tragedy. It also offers a powerful historical lesson for our century and all times: the danger of assuming that because people are in positions of responsibility they are necessarily behaving responsibly.',
            'publisher_id' => '6',
            'user_id' => '10'],
        [
            'name' => 'Team of Rivals',
            'page_count' => '954',
            'price' => '34',
            'release_date' => '2006-12-06',
            'description' => 'Winner of the Lincoln Prize

Acclaimed historian Doris Kearns Goodwin illuminates Abraham Lincoln\'s political genius in this highly original work, as the one-term congressman and prairie lawyer rises from obscurity to prevail over three gifted rivals of national reputation to become president.

On May 18, 1860, William H. Seward, Salmon P. Chase, Edward Bates, and Abraham Lincoln waited in their hometowns for the results from the Republican National Convention in Chicago. When Lincoln emerged as the victor, his rivals were dismayed and angry.',
            'publisher_id' => '6',
            'user_id' => '9'],
        [
            'name' => 'No Ordinary Time',
            'page_count' => '771',
            'price' => '12',
            'release_date' => '2008-05-01',
            'description' => 'Doris Kearns Goodwin\'s Pulitzer Prize-winning classic about the relationship between Franklin D. Roosevelt and Eleanor Roosevelt, and how it shaped the nation while steering it through the Great Depression and the outset of World War II.

With an extraordinary collection of details, Goodwin masterfully weaves together a striking number of story lines-Eleanor and Franklin\'s marriage and remarkable partnership, Eleanor\'s life as First Lady, and FDR\'s White House and its impact on America as well as on a world at war. Goodwin effectively melds these details and stories into an unforgettable and intimate portrait of Eleanor and Franklin Roosevelt and of the time during which a new, modern America was born.',
            'publisher_id' => '6',
            'user_id' => '9'],
        [
            'name' => 'Leadership',
            'page_count' => '497',
            'price' => '34',
            'release_date' => '2018-08-03',
            'description' => 'From Pulitzer Prize-winning author and esteemed presidential historian Doris Kearns Goodwin, an invaluable guide to the development and exercise of leadership from Abraham Lincoln, Theodore Roosevelt, Lyndon B. Johnson, and Franklin D. Roosevelt.

The inspiration for the multipart HISTORY Channel series Abraham Lincoln and Theodore Roosevelt.

"After five decades of magisterial output, Doris Kearns Goodwin leads the league of presidential historians" (USA TODAY). In her "inspiring" (The Christian Science Monitor) Leadership, Doris Kearns Goodwin draws upon the four presidents she has studied most closely-Abraham Lincoln, Theodore Roosevelt, Franklin D. Roosevelt, and Lyndon B. Johnson (in civil rights)-to show how they recognized leadership qualities within themselves and were recognized as leaders by others. By looking back to their first entries into public life, we encounter them at a time when their paths were filled with confusion, fear, and hope.',
            'publisher_id' => '6',
            'user_id' => '9'],
        [
            'name' => 'The Bully Pulpit',
            'page_count' => '929',
            'price' => '34',
            'release_date' => '2013-04-02',
            'description' => 'Pulitzer Prize-winning author and presidential historian Doris Kearns Goodwin\'s dynamic history of Theodore Roosevelt, William H. Taft and the first decade of the Progressive era, that tumultuous time when the nation was coming unseamed and reform was in the air.

Winner of the Carnegie Medal.

Doris Kearns Goodwin\'s The Bully Pulpit is a dynamic history of the first decade of the Progressive era, that tumultuous time when the nation was coming unseamed and reform was in the air.',
            'publisher_id' => '6',
            'user_id' => '9'],
        [
            'name' => 'Lincoln',
            'page_count' => '194',
            'price' => '23',
            'release_date' => '2013-03-06',
            'description' => '"All forward thrust and hot-damn urgency…A brilliant, brawling epic. Screenwriter Tony Kushner blows the dust off history by investing it with flesh, blood, and churning purpose. . . . A great American movie." -Peter Travers, Rolling Stone

"Lincoln is a rough and noble democratic masterpiece. And the genius of Lincoln, finally, lies in its vision of politics as a noble, sometimes clumsy dialectic of the exalted and the mundane…And Mr. Kushner, whose love of passionate, exhaustive disputation is unmatched in the modern theater, fills nearly every scene with wonderful, maddening talk. Go see this movie." -A.O. Scott, New York Times

"A lyrical, ingeniously structured screenplay. Lincoln is one of the most authentic biographical dramas I\'ve ever seen…grand and immersive. It plugs us into the final months of Lincoln\'s presidency with a purity that makes us feel transported as if by time machine." -Owen Gleiberman, Entertainment Weekly',
            'publisher_id' => '6',
            'user_id' => '9'],
        [
            'name' => 'David and Goliath',
            'page_count' => '322',
            'price' => '45',
            'release_date' => '2013-04-02',
            'description' => 'Explore the power of the underdog in Malcolm Gladwell\'s dazzling examination of success, motivation, and the role of adversity in shaping our lives, from the bestselling author of The Bomber Mafia.

Three thousand years ago on a battlefield in ancient Palestine, a shepherd boy felled a mighty warrior with nothing more than a stone and a sling, and ever since then the names of David and Goliath have stood for battles between underdogs and giants. David\'s victory was improbable and miraculous. He shouldn\'t have won.

In David and Goliath, Malcolm Gladwellchallenges how we think about obstacles and disadvantages, offering a new interpretation of what it means to be discriminated against, or cope with a disability, or lose a parent, or attend a mediocre school, or suffer from any number of other apparent setbacks.',
            'publisher_id' => '14',
            'user_id' => '23'],
        [
            'name' => 'Talking to Strangers',
            'page_count' => '401',
            'price' => '23',
            'release_date' => '2019-02-03',
            'description' => 'Malcolm Gladwell, host of the podcast Revisionist History and author of the #1 New York Times bestseller Outliers, offers a powerful examination of our interactions with strangers and why they often go wrong-now with a new afterword by the author.

A Best Book of the Year: The Financial Times, Bloomberg, Chicago Tribune, and Detroit Free Press

How did Fidel Castro fool the CIA for a generation? Why did Neville Chamberlain think he could trust Adolf Hitler? Why are campus sexual assaults on the rise? Do television sitcoms teach us something about the way we relate to one another that isn\'t true?',
            'publisher_id' => '14',
            'user_id' => '23'],
        [
            'name' => 'Outliers',
            'page_count' => '321',
            'price' => '34',
            'release_date' => '2008-06-04',
            'description' => 'Malcolm Gladwell, bestselling author of Blink and The Bomber Mafia and host of the podcast Revisionist History, explores what sets high achievers apart-from Bill Gates to the Beatles-in this seminal work from "a singular talent" (New York Times Book Review).

In this stunning book, Malcolm Gladwell takes us on an intellectual journey through the world of "outliers"-the best and the brightest, the most famous and the most successful. He asks the question: what makes high-achievers different?

His answer is that we pay too much attention to what successful people are like, and too little attention to where they are from: that is, their culture, their family, their generation, and the idiosyncratic experiences of their upbringing. Along the way he explains the secrets of software billionaires, what it takes to be a great soccer player, why Asians are good at math, and what made the Beatles the greatest rock band.',
            'publisher_id' => '14',
            'user_id' => '23'],
        [
            'name' => 'Blink',
            'page_count' => '296',
            'price' => '12',
            'release_date' => '2007-04-16',
            'description' => 'From the #1 bestselling author of The Bomber Mafia, the landmark book that has revolutionized the way we understand leadership and decision making.

In his breakthrough bestseller The Tipping Point, Malcolm Gladwell redefined how we understand the world around us. Now, in Blink, he revolutionizes the way we understand the world within. Blink is a book about how we think without thinking, about choices that seem to be made in an instant--in the blink of an eye--that actually aren\'t as simple as they seem. Why are some people brilliant decision makers, while others are consistently inept? Why do some people follow their instincts and win, while others end up stumbling into error? How do our brains really work--in the office, in the classroom, in the kitchen, and in the bedroom? And why are the best decisions often those that are impossible to explain to others? In Blink we meet the psychologist who has learned to predict whether a marriage will last, based on a few minutes of observing a couple; the tennis coach who knows when a player will double-fault before the racket even makes contact with the ball; the antiquities experts who recognize a fake at a glance.',
            'publisher_id' => '14',
            'user_id' => '23'],
        [
            'name' => 'The Tipping Point',
            'page_count' => '298',
            'price' => '23',
            'release_date' => '2006-01-22',
            'description' => 'From the bestselling author of The Bomber Mafia: discover Malcolm Gladwell\'s breakthrough debut and explore the science behind viral trends in business, marketing, and human behavior.

The tipping point is that magic moment when an idea, trend, or social behavior crosses a threshold, tips, and spreads like wildfire. Just as a single sick person can start an epidemic of the flu, so too can a small but precisely targeted push cause a fashion trend, the popularity of a new product, or a drop in the crime rate. This widely acclaimed bestseller, in which Malcolm Gladwell explores and brilliantly illuminates the tipping point phenomenon, is already changing the way people throughout the world think about selling products and disseminating ideas.

"A wonderful page-turner about a fascinating idea that should affect the way every thinking person looks at the world." -Michael Lewis',
            'publisher_id' => '14',
            'user_id' => '23'],
        [
            'name' => 'The Big Shor',
            'page_count' => '287',
            'price' => '15',
            'release_date' => '2010-05-12',
            'description' => 'The #1 New York Times bestseller: "It is the work of our greatest financial journalist, at the top of his game. And it\'s essential reading." - Graydon Carter, Vanity Fair

The real story of the crash began in bizarre feeder markets where the sun doesn\'t shine and the SEC doesn\'t dare, or bother, to tread: the bond and real estate derivative markets where geeks invent impenetrable securities to profit from the misery of lower- and middle-class Americans who can\'t pay their debts. The smart people who understood what was or might be happening were paralyzed by hope and fear; in any case, they weren\'t talking.

Michael Lewis creates a fresh, character-driven narrative brimming with indignation and dark humor, a fitting sequel to his #1 bestseller Liar\'s Poker. Out of a handful of unlikely-really unlikely-heroes, Lewis fashions a story as compelling and unusual as any of his earlier bestsellers, proving yet again that he is the finest and funniest chronicler of our time.',
            'publisher_id' => '15',
            'user_id' => '22'],
        [
            'name' => 'Liar\'s Poker',
            'page_count' => '352',
            'price' => '17',
            'release_date' => '2012-03-04',
            'description' => 'The time was the 1980s. The place was Wall Street. The game was called Liar\'s Poker.

Michael Lewis was fresh out of Princeton and the London School of Economics when he landed a job at Salomon Brothers, one of Wall Street\'s premier investment firms. During the next three years, Lewis rose from callow trainee to bond salesman, raking in millions for the firm and cashing in on a modern-day gold rush. Liar\'s Poker is the culmination of those heady, frenzied years-a behind-the-scenes look at a unique and turbulent time in American business. From the frat-boy camaraderie of the forty-first-floor trading room to the killer instinct that made ambitious young men gamble everything on a high-stakes game of bluffing and deception, here is Michael Lewis\'s knowing and hilarious insider\'s account of an unprecedented era of greed, gluttony, and outrageous fortune.',
            'publisher_id' => '15',
            'user_id' => '22'],
        [
            'name' => 'Moneyball',
            'page_count' => '316',
            'price' => '11',
            'release_date' => '2004-03-17',
            'description' => 'Michael Lewis\'s instant classic may be "the most influential book on sports ever written" (People), but "you need know absolutely nothing about baseball to appreciate the wit, snap, economy and incisiveness of [Lewis\'s] thoughts about it" (Janet Maslin, New York Times).

One of GQ\'s 50 Best Books of Literary Journalism of the 21st Century

Just before the 2002 season opens, the Oakland Athletics must relinquish its three most prominent (and expensive) players and is written off by just about everyone-but then comes roaring back to challenge the American League record for consecutive wins. How did one of the poorest teams in baseball win so many games?
',
            'publisher_id' => '15',
            'user_id' => '22'],
        [
            'name' => 'The Fifth Risk',
            'page_count' => '255',
            'price' => '17',
            'release_date' => '2018-03-02',
            'description' => 'The New York Times Bestseller, with a new afterword

"[Michael Lewis\'s] most ambitious and important book." -Joe Klein, New York Times

Michael Lewis\'s brilliant narrative of the Trump administration\'s botched presidential transition takes us into the engine rooms of a government under attack by its leaders through willful ignorance and greed. The government manages a vast array of critical services that keep us safe and underpin our lives from ensuring the safety of our food and drugs and predicting extreme weather events to tracking and locating black market uranium before the terrorists do. The Fifth Risk masterfully and vividly unspools the consequences if the people given control over our government have no idea how it works.',
            'publisher_id' => '15',
            'user_id' => '22'],
        [
            'name' => 'The Undoing Project',
            'page_count' => '369',
            'price' => '45',
            'release_date' => '2012-12-06',
            'description' => '"Brilliant. . . . Lewis has given us a spectacular account of two great men who faced up to uncertainty and the limits of human reason." —William Easterly, Wall Street Journal

Forty years ago, Israeli psychologists Daniel Kahneman and Amos Tversky wrote a series of breathtakingly original papers that invented the field of behavioral economics. One of the greatest partnerships in the history of science, Kahneman and Tversky\'s extraordinary friendship incited a revolution in Big Data studies, advanced evidence-based medicine, led to a new approach to government regulation, and made much of Michael Lewis\'s own work possible. In The Undoing Project, Lewis shows how their Nobel Prize-winning theory of the mind altered our perception of reality.',
            'publisher_id' => '15',
            'user_id' => '22'],
        [
            'name' => 'Harry Potter and the Prisoner of Azkaban',
            'page_count' => '180',
            'price' => '15',
            'release_date' => '2015-03-21',
            'description' => '\'Welcome to the Knight Bus, emergency transport for the stranded witch or wizard. Just stick out your wand hand, step on board and we can take you anywhere you want to go.\'

When the Knight Bus crashes through the darkness and screeches to a halt in front of him, it\'s the start of another far from ordinary year at Hogwarts for Harry Potter. Sirius Black, escaped mass-murderer and follower of Lord Voldemort, is on the run - and they say he is coming after Harry. In his first ever Divination class, Professor Trelawney sees an omen of death in Harry\'s tea leaves... But perhaps most terrifying of all are the Dementors patrolling the school grounds, with their soul-sucking kiss...

Having become classics of our time, the Harry Potter eBooks never fail to bring comfort and escapism. With their message of hope, belonging and the enduring power of truth and love, the story of the Boy Who Lived continues to delight generations of new readers.',
            'publisher_id' => '1',
            'user_id' => '11'],
        [
            'name' => 'Harry Potter and the Goblet of Fire',
            'page_count' => '301',
            'price' => '16',
            'release_date' => '2015-12-08',
            'description' => '\'There will be three tasks, spaced throughout the school year, and they will test the champions in many different ways ... their magical prowess - their daring - their powers of deduction - and, of course, their ability to cope with danger.\'

The Triwizard Tournament is to be held at Hogwarts. Only wizards who are over seventeen are allowed to enter - but that doesn\'t stop Harry dreaming that he will win the competition. Then at Hallowe\'en, when the Goblet of Fire makes its selection, Harry is amazed to find his name is one of those that the magical cup picks out. He will face death-defying tasks, dragons and Dark wizards, but with the help of his best friends, Ron and Hermione, he might just make it through - alive!

Having become classics of our time, the Harry Potter eBooks never fail to bring comfort and escapism. With their message of hope, belonging and the enduring power of truth and love, the story of the Boy Who Lived continues to delight generations of new readers.',
            'publisher_id' => '1',
            'user_id' => '11'],
        [
            'name' => 'Harry Potter and the Half-Blood Prince',
            'page_count' => '652',
            'price' => '15',
            'release_date' => '2015-03-01',
            'description' => 'There it was, hanging in the sky above the school: the blazing green skull with a serpent tongue, the mark Death Eaters left behind whenever they had entered a building... wherever they had murdered...

When Dumbledore arrives at Privet Drive one summer night to collect Harry Potter, his wand hand is blackened and shrivelled, but he does not reveal why. Secrets and suspicion are spreading through the wizarding world, and Hogwarts itself is not safe. Harry is convinced that Malfoy bears the Dark Mark: there is a Death Eater amongst them. Harry will need powerful magic and true friends as he explores Voldemort\'s darkest secrets, and Dumbledore prepares him to face his destiny...

Having become classics of our time, the Harry Potter eBooks never fail to bring comfort and escapism. With their message of hope, belonging and the enduring power of truth and love, the story of the Boy Who Lived continues to delight generations of new readers.',
            'publisher_id' => '1',
            'user_id' => '11'],
        [
            'name' => 'Harry Potter and the Order of the Phoenix',
            'page_count' => '412',
            'price' => '16',
            'release_date' => '2015-03-02',
            'description' => '\'You are sharing the Dark Lord\'s thoughts and emotions. The Headmaster thinks it inadvisable for this to continue. He wishes me to teach you how to close your mind to the Dark Lord.\'

Dark times have come to Hogwarts. After the Dementors\' attack on his cousin Dudley, Harry Potter knows that Voldemort will stop at nothing to find him. There are many who deny the Dark Lord\'s return, but Harry is not alone: a secret order gathers at Grimmauld Place to fight against the Dark forces. Harry must allow Professor Snape to teach him how to protect himself from Voldemort\'s savage assaults on his mind. But they are growing stronger by the day and Harry is running out of time ...',
            'publisher_id' => '1',
            'user_id' => '11'],
        [
            'name' => 'Harry Potter and the Sorcerer\'s Stone',
            'page_count' => '341',
            'price' => '13',
            'release_date' => '2015-12-08',
            'description' => 'Turning the envelope over, his hand trembling, Harry saw a purple wax seal bearing a coat of arms; a lion, an eagle, a badger and a snake surrounding a large letter \'H\'.

Harry Potter has never even heard of Hogwarts when the letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle. Then, on Harry\'s eleventh birthday, a great beetle-eyed giant of a man called Rubeus Hagrid bursts in with some astonishing news: Harry Potter is a wizard, and he has a place at Hogwarts School of Witchcraft and Wizardry. An incredible adventure is about to begin!

Having become classics of our time, the Harry Potter eBooks never fail to bring comfort and escapism. With their message of hope, belonging and the enduring power of truth and love, the story of the Boy Who Lived continues to delight generations of new readers.',
            'publisher_id' => '1',
            'user_id' => '11'],
        [
            'name' => 'Fairy Tale',
            'page_count' => '607',
            'price' => '18',
            'release_date' => '2022-01-05',
            'description' => 'Legendary storyteller Stephen King goes into the deepest well of his imagination in this spellbinding novel about a seventeen-year-old boy who inherits the keys to a parallel world where good and evil are at war, and the stakes could not be higher-for that world or ours.

Charlie Reade looks like a regular high school kid, great at baseball and football, a decent student. But he carries a heavy load. His mom was killed in a hit-and-run accident when he was seven, and grief drove his dad to drink. Charlie learned how to take care of himself-and his dad. When Charlie is seventeen, he meets a dog named Radar and her aging master, Howard Bowditch, a recluse in a big house at the top of a big hill, with a locked shed in the backyard. Sometimes strange sounds emerge from it.

Charlie starts doing jobs for Mr. Bowditch and loses his heart to Radar. Then, when Bowditch dies, he leaves Charlie a cassette tape telling a story no one would believe. What Bowditch knows, and has kept secret all his long life, is that inside the shed is a portal to another world.',
            'publisher_id' => '2',
            'user_id' => '4'],
        [
            'name' => 'Billy Summers',
            'page_count' => '527',
            'price' => '17',
            'release_date' => '2021-11-23',
            'description' => 'Master storyteller Stephen King, whose "restless imagination is a power that cannot be contained" (The New York Times Book Review), presents an unforgettable and relentless #1 New York Times bestseller about a good guy in a bad job.

Chances are, if you\'re a target of Billy Summers, two immutable truths apply: You\'ll never even know what hit you, and you\'re really getting what you deserve. He\'s a killer for hire and the best in the business-but he\'ll do the job only if the assignment is a truly bad person. But now, time is catching up with him, and Billy wants out. Before he can do that though, there\'s one last hit, which promises a generous payday at the end of the line even as things don\'t seem quite on the level here. Given that Billy is among the most talented snipers in the world, a decorated Iraq war vet, and a virtual Houdini when it comes to vanishing after the job is done, what could possibly go wrong? How about everything.

Part war story and part love letter to small-town America and the people who live there, this spectacular thriller of luck, fate, and love will grip readers with its electrifying narrative, as a complex antihero with one last shot at redemption must avenge the crimes of an extraordinarily evil man. You won\'t ever forget this stunning novel from master storyteller Stephen King…and you will never forget Billy.',
            'publisher_id' => '2',
            'user_id' => '4'],
        [
            'name' => 'The Dark Tower I: The Gunslinger',
            'page_count' => '284',
            'price' => '12',
            'release_date' => '2016-01-04',
            'description' => '"An impressive work of mythic magnitude that may turn out to be Stephen King\'s greatest literary achievement" (The Atlanta Journal-Constitution), The Gunslinger is the first volume in the epic Dark Tower Series.

A #1 national bestseller, The Gunslinger introduces readers to one of Stephen King\'s most powerful creations, Roland of Gilead: The Last Gunslinger. He is a haunting figure, a loner on a spellbinding journey into good and evil. In his desolate world, which mirrors our own in frightening ways, Roland tracks The Man in Black, encounters an enticing woman named Alice, and begins a friendship with the boy from New York named Jake.

Inspired in part by the Robert Browning narrative poem, "Childe Roland to the Dark Tower Came," The Gunslinger is "a compelling whirlpool of a story that draws one irretrievable to its center" (Milwaukee Sentinel). It is "brilliant and fresh…and will leave you panting for more" (Booklist).',
            'publisher_id' => '2',
            'user_id' => '4'],
        [
            'name' => 'The Institute',
            'page_count' => '560',
            'price' => '18',
            'release_date' => '2019-08-06',
            'description' => 'In the middle of the night, in a house on a quiet street in suburban Minneapolis, intruders silently murder Luke Ellis\'s parents and load him into a black SUV. The operation takes less than two minutes. Luke will wake up at The Institute, in a room that looks just like his own, except there\'s no window. And outside his door are other doors, behind which are other kids with special talents-telekinesis and telepathy-who got to this place the same way Luke did: Kalisha, Nick, George, Iris, and ten-year-old Avery Dixon. They are all in Front Half. Others, Luke learns, graduated to Back Half, "like the roach motel," Kalisha says. "You check in, but you don\'t check out."

In this most sinister of institutions, the director, Mrs. Sigsby, and her staff are ruthlessly dedicated to extracting from these children the force of their extranormal gifts. There are no scruples here. If you go along, you get tokens for the vending machines. If you don\'t, punishment is brutal. As each new victim disappears to Back Half, Luke becomes more and more desperate to get out and get help. But no one has ever escaped from the Institute.

As psychically terrifying as Firestarter, and with the spectacular kid power of It, The Institute is "first-rate entertainment that has something important to say. We all need to listen" (The Washington Post).',
            'publisher_id' => '2',
            'user_id' => '4'],
        [
            'name' => 'The Shining',
            'page_count' => '674',
            'price' => '25',
            'release_date' => '2008-01-24',
            'description' => 'Jack Torrance\'s new job at the Overlook Hotel is the perfect chance for a fresh start. As the off-season caretaker at the atmospheric old hotel, he\'ll have plenty of time to spend reconnecting with his family and working on his writing. But as the harsh winter weather sets in, the idyllic location feels ever more remote . . . and more sinister. And the only one to notice the strange and terrible forces gathering around the Overlook is Danny Torrance, a uniquely gifted five-year-old.',
            'publisher_id' => '2',
            'user_id' => '4'],
        [
            'name' => 'Gwendy\'s Final Task',
            'page_count' => '287',
            'price' => '13',
            'release_date' => '2022-05-31',
            'description' => 'The final book in the New York Times bestselling Gwendy\'s Button Box trilogy from Stephen King and Richard Chizmar.

When Gwendy Peterson was twelve, a mysterious stranger named Richard Farris gave her a mysterious box for safekeeping. It offered treats and vintage coins, but it was dangerous. Pushing any of its eight colored buttons promised death and destruction. Years later, the button box reentered Gwendy\'s life. A successful novelist and a rising political star, she was once again forced to deal with the temptation the box represented. Now, malignant forces seek to possess the button box, and it is up to Senator Gwendy Peterson to keep it from them at all costs. But where can one hide something from such powerful entities?

In Gwendy\'s Final Task, master storytellers Stephen King and Richard Chizmar take us on a journey from Castle Rock to another famous cursed Maine city to the MF-1 space station, where Gwendy must execute a secret mission to save the world. And, maybe, all worlds.',
            'publisher_id' => '2',
            'user_id' => '4'],
        [
            'name' => 'The Outsider',
            'page_count' => '655',
            'price' => '15',
            'release_date' => '2018-02-25',
            'description' => 'Evil has many faces…maybe even yours in this #1 New York Times bestseller from master storyteller Stephen King.

An eleven-year-old boy\'s violated corpse is discovered in a town park. Eyewitnesses and fingerprints point unmistakably to one of Flint City\'s most popular citizens-Terry Maitland, Little League coach, English teacher, husband, and father of two girls. Detective Ralph Anderson, whose son Maitland once coached, orders a quick and very public arrest. Maitland has an alibi, but Anderson and the district attorney soon have DNA evidence to go with the fingerprints and witnesses. Their case seems ironclad.

As the investigation expands and horrifying details begin to emerge, King\'s story kicks into high gear, generating strong tension and almost unbearable suspense. Terry Maitland seems like a nice guy, but is he wearing another face? When the answer comes, it will shock you as only Stephen King can.',
            'publisher_id' => '2',
            'user_id' => '4'],
        [
            'name' => 'Mr. Mercedes',
            'page_count' => '559',
            'price' => '26',
            'release_date' => '2014-03-01',
            'description' => '#1 New York Times bestseller! In a high-suspense race against time, three of the most unlikely heroes Stephen King has ever created try to stop a lone killer from blowing up thousands. "Mr. Mercedes is a rich, resonant, exceptionally readable accomplishment by a man who can write in whatever genre he chooses" (The Washington Post).

The stolen Mercedes emerges from the pre-dawn fog and plows through a crowd of men and women on line for a job fair in a distressed American city. Then the lone driver backs up, charges again, and speeds off, leaving eight dead and more wounded. The case goes unsolved and ex-cop Bill Hodges is out of hope when he gets a letter from a man who loved the feel of death under the Mercedes\'s wheels…

Brady Hartsfield wants that rush again, but this time he\'s going big, with an attack that would take down thousands-unless Hodges and two new unusual allies he picks up along the way can throw a wrench in Hartsfield\'s diabolical plans. Stephen King takes off on a "nerve-shredding, pulse-pounding race against time" (Fort Worth Star-Telegram) with this acclaimed #1 bestselling thriller.',
            'publisher_id' => '2',
            'user_id' => '4'],
        [
            'name' => '\'Salem\'s Lot',
            'page_count' => '668',
            'price' => '27',
            'release_date' => '2008-06-03',
            'description' => 'Ben Mears has returned to Jerusalem\'s Lot in hopes that exploring the history of the Marsten House, an old mansion long the subject of rumor and speculation, will help him cast out his personal devils and provide inspiration for his new book.

But when two young boys venture into the woods, and only one returns alive, Mears begins to realize that something sinister is at work.

In fact, his hometown is under siege from forces of darkness far beyond his imagination. And only he, with a small group of allies, can hope to contain the evil that is growing within the borders of this small New England town.

With this, his second novel, Stephen King established himself as an indisputable master of American horror, able to transform the old conceits of the genre into something fresh and all the more frightening for taking place in a familiar, idyllic locale.',
            'publisher_id' => '2',
            'user_id' => '4'],
        [
            'name' => 'It',
            'page_count' => '1181',
            'price' => '24',
            'release_date' => '2016-07-03',
            'description' => 'Stephen King\'s terrifying, classic #1 New York Times bestseller, "a landmark in American literature" (Chicago Sun-Times)-about seven adults who return to their hometown to confront a nightmare they had first stumbled on as teenagers…an evil without a name: It.

Welcome to Derry, Maine. It\'s a small city, a place as hauntingly familiar as your own hometown. Only in Derry the haunting is real.

They were seven teenagers when they first stumbled upon the horror. Now they are grown-up men and women who have gone out into the big world to gain success and happiness. But the promise they made twenty-eight years ago calls them reunite in the same place where, as teenagers, they battled an evil creature that preyed on the city\'s children. Now, children are being murdered again and their repressed memories of that terrifying summer return as they prepare to once again battle the monster lurking in Derry\'s sewers.',
            'publisher_id' => '2',
            'user_id' => '4'],
    ];


    public function run(): void
    {
        $now = now();
        foreach ($this->books as $key => $book) {
            DB::table('books')->insert([
                'name' => $book['name'],
                'page_count' => $book['page_count'],
                'price' => $book['price'],
                'release_date' => $book['release_date'],
                'description' => $book['description'],
                'publisher_id' => $book['publisher_id'],
                'user_id' => $book['user_id'],
                'image_id' => $key + 1,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
