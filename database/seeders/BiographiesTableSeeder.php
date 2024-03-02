<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiographiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private $biographies = [
        [
            'biography_text' => 'Stephen King is the author of more than fifty books, all of them worldwide bestsellers. His first crime thriller featuring Bill Hodges, MR MERCEDES, won the Edgar Award for best novel and was shortlisted for the CWA Gold Dagger Award. Both MR MERCEDES and END OF WATCH received the Goodreads Choice Award for the Best Mystery and Thriller of 2014 and 2016 respectively.',
            'user_id' => 4
        ],
        [
            'biography_text' => 'Theodor Seuss Geisel—aka Dr. Seuss—is one of the most beloved children\'s book authors of all time. From The Cat in the Hat to Oh, the Places You\'ll Go!, his iconic characters, stories, and art style have been a lasting influence on generations of children and adults. The books he wrote and illustrated under the name Dr. Seuss (and others that he wrote but did not illustrate, including some under the pseudonyms Theo. LeSieg and Rosetta Stone) have been translated into 45 languages. Hundreds of millions of copies have found their way into homes and hearts around the world. Dr. Seuss\'s long list of awards includes Caldecott Honors, the Pulitzer Prize, and eight honorary doctorates. Works based on his original stories have won three Oscars, three Emmys, three Grammys, and a Peabody.',
            'user_id' => 5
        ],
        [
            'biography_text' => 'The son of Norwegian parents, Roald Dahl was born in Wales in 1916 and educated at Repton. He was a fighter pilot for the RAF during World War Two, and it was while writing about his experiences during this time that he started his career as an author.',
            'user_id' => 6
        ],
        [
            'biography_text' => 'Nicholas Sparks is one of the world\'s most beloved storytellers. All of his books have been New York Times bestsellers, with over 105 million copies sold worldwide, in more than 50 languages, including over 75 million copies in the United States alone.',
            'user_id' => 7
        ],
        [
            'biography_text' => 'Nora Roberts is the #1 New York Times bestselling author of more than 200 novels, including Shelter in Place, Year One, Come Sundown, and many more. She is also the author of the bestselling In Death series written under the pen name J.D. Robb. There are more than five hundred million copies of her books in print.',
            'user_id' => 8
        ],
        [
            'biography_text' => 'Doris Kearns Goodwin\'s interest in leadership began more than half a century ago as a professor at Harvard. Her experiences working for LBJ in the White House and later assisting him on his memoirs led to her bestselling Lyndon Johnson and the American Dream. She followed up with the Pulitzer Prize-winning No Ordinary Time: Franklin & Eleanor Roosevelt: The Home Front in World War II. Goodwin earned the Lincoln Prize for the runaway bestseller Team of Rivals, the basis for Steven Spielberg\'s Academy Award-winning film Lincoln, and the Carnegie Medal for The Bully Pulpit, the New York Times bestselling chronicle of the friendship between Theodore Roosevelt and William Howard Taft. She lives in Concord, Massachusetts, with her husband, the writer Richard N. Goodwin. More at www.doriskearnsgoodwin.com @DorisKGoodwin',
            'user_id' => 9
        ],
        [
            'biography_text' => 'David McCullough has twice received the Pulitzer Prize, for Truman and John Adams, and twice received the National Book Award, for The Path Between the Seas and Mornings on Horseback; His other widely praised books are 1776, Brave Companions, The Great Bridge, and The Johnstown Flood. He has been honored with the National Book Foundation Distinguished Contribution to American Letters Award, the National Humanities Medal, and the Presidential Medal of Freedom.',
            'user_id' => 10
        ],
        [
            'biography_text' => 'J.K. Rowling is best-known as the author of the seven Harry Potter books, which were published between 1997 and 2007. The enduringly popular adventures of Harry, Ron and Hermione have gone on to sell over 600 million copies worldwide, be translated into 85 languages and made into eight blockbuster films.',
            'user_id' => 11
        ],
        [
            'biography_text' => 'Walter Isaacson, University Professor of History at Tulane, has been CEO of the Aspen Institute, chairman of CNN, and editor of Time magazine. He is the author of Leonardo da Vinci; Steve Jobs; Einstein: His Life and Universe; Benjamin Franklin: An American Life; and Kissinger: A Biography. He is also the coauthor of The Wise Men: Six Friends and the World They Made.',
            'user_id' => 12
        ],
        [
            'biography_text' => 'Levy is editor at large at Wired. Previous positions include editor in chief at Backchannel; and chief technology writer and a senior editor for Newsweek. In early 2020, his book "Facebook: The Inside Story" will appear, the product of over three years studying the company, which granted unprecedented access to its employees and executives. Levy has written previous seven books and has had articles published in Harper\'s, Macworld, The New York Times Magazine, The New Yorker, Premiere, and Rolling Stone. Steven has won several awards during his 30+ years of writing about technology, including Hackers, which PC Magazine named the best Sci-Tech book written in the last twenty years and, Crypto, which won the grand eBook prize at the 2001 Frankfurt Book festival. "In the Plex," the definitive book on Google, was named the Best Business Book of 2011 on both Amazon and Audible.',
            'user_id' => 13
        ],
        [
            'biography_text' => 'Jamie Oliver is a global phenomenon in food and campaigning. During a 20-year television and publishing career he has inspired millions of people to enjoy cooking from scratch and eating fresh, delicious food. Through his organization, Jamie is leading the charge on a global food revolution, aiming to reduce childhood obesity and improve everyone\'s health and happiness through food.',
            'user_id' => 14
        ],
        [
            'biography_text' => 'Julia Child was born in Pasadena, California. She was graduated from Smith College and worked for the OSS during World War II in Ceylon and China, where she met Paul Child. After they married they lived in Paris, where she studied at the Cordon Bleu and taught cooking with Simone Beck and Louisette Bertholle, with whom she wrote the first volume of Mastering the Art of French Cooking (1961). In 1963, Boston\'s WGBH launched The French Chef television series, which made her a national celebrity, earning her the Peabody Award in 1965 and an Emmy in 1966. Several public television shows and numerous cookbooks followed. She died in 2004.',
            'user_id' => 15
        ],
        [
            'biography_text' => 'Tony Robbins is a bestselling author, entrepreneur, and philanthropist. For more than thirty-nine years, millions of people have enjoyed the warmth, humor, and the transformational power of Mr. Robbins\'s business and personal development events. He is the nation\'s #1 life and business strategist. He\'s called upon to consult and coach some of the world\'s finest athletes, entertainers, Fortune 500 CEOs, and even presidents of nations. Robbins is the chairman of a holding company comprised of more than a dozen businesses with combined sales exceeding five billion dollars a year. His philanthropic efforts helped provide more than 100 million meals in the last year alone. He lives in Palm Beach, Florida.',
            'user_id' => 16
        ],
        [
            'biography_text' => 'Dale Carnegie (1888-1955) described himself as a "simple country boy" from Missouri but was also a pioneer of the self-improvement genre. Since the 1936 publication of his first book, How to Win Friends and Influence People, he has touched millions of readers and his classic works continue to impact lives to this day.',
            'user_id' => 17
        ],
        [
            'biography_text' => 'Paul Theroux was born and educated in the United States. After graduating from university in 1963, he travelled first to Italy and then to Africa, where he worked as a Peace Corps teacher at a bush school in Malawi, and as a lecturer at Makerere University in Uganda. In 1968 he joined the University of Singapore and taught in the Department of English for three years. Throughout this time he was publishing short stories and journalism, and wrote a number of novels. Among these were Fong and the Indians, Girls at Play and Jungle Lovers, all of which appear in one volume, On the Edge of the Great Rift (Penguin, 1996).',
            'user_id' => 18
        ],
        [
            'biography_text' => 'Bill Bryson was born in Des Moines, Iowa. For twenty years he lived in England, where he worked for the Times and the Independent, and wrote for most major British and American publications. His books include travel memoirs (Neither Here Nor There; The Lost Continent; Notes from a Small Island) and books on language (The Mother Tongue; Made in America). His account of his attempts to walk the Appalachian Trail, A Walk in the Woods, was a huge New York Times bestseller. He lives in Hanover, New Hampshire, with his wife and his four children.',
            'user_id' => 19
        ],
        [
            'biography_text' => 'Sir Arthur Conan Doyle was born in Edinburgh in 1859 and died in 1930. Within those years was crowded a variety of activity and creative work that made him an international figure and inspired the French to give him the epithet \'the good giant\'. He was the nephew of \'Dickie Doyle\' the artist, and was educated at Stonyhurst, and later studied medicine at Edinburgh University, where the methods of diagnosis of one of the professors provided the idea for the methods of deduction used by Sherlock Holmes.',
            'user_id' => 20
        ],
        [
            'biography_text' => 'Born in Torquay in 1890, Agatha Christie began writing during the First World War and wrote over 100 novels, plays and short story collections. She was still writing to great acclaim until her death, and her books have now sold over a billion copies in English and another billion in over 100 foreign languages. Yet Agatha Christie was always a very private person, and though Hercule Poirot and Miss Marple became household names, the Queen of Crime was a complete enigma to all but her closest friends.',
            'user_id' => 21
        ],
        [
            'biography_text' => 'Michael Lewis, the best-selling author of The Undoing Project, Liar\'s Poker, Flash Boys, Moneyball, The Blind Side, Home Game and The Big Short, among other works, lives in Berkeley, California, with his wife, Tabitha Soren, and their three children.',
            'user_id' => 22
        ],
        [
            'biography_text' => 'Malcolm Gladwell has been a staff writer at The New Yorker since 1996. He is the author of The Tipping Point, Blink, Outliers, and What the Dog Saw. Prior to joining The New Yorker, he was a reporter at the Washington Post. Gladwell was born in England and grew up in rural Ontario. He now lives in New York.',
            'user_id' => 23
        ],
    ];

    public function run(): void
    {
        $now = now();
        foreach ($this->biographies as $biography) {
            DB::table('biographies')->insert([
                'biography_text' => $biography['biography_text'],
                'user_id' => $biography['user_id'],
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
