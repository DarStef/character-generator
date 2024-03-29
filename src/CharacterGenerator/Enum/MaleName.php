<?php declare(strict_types=1);

namespace App\CharacterGenerator\Enum;

enum MaleName: string
{
    case Aaron = 'Aaron';
    case Abraham = 'Abraham';
    case Addison = 'Addison';
    case Amos = 'Amos';
    case Anderson = 'Anderson';
    case Archibald = 'Archibald';
    case August = 'August';
    case Barnabas = 'Barnabas';
    case Barney = 'Barney';
    case Baxter = 'Baxter';
    case Blair = 'Blair';
    case Caleb = 'Caleb';
    case Cecil = 'Cecil';
    case Chester = 'Chester';
    case Clifford = 'Clifford';
    case Clinton = 'Clinton';
    case Cornelius = 'Cornelius';
    case Curtis = 'Curtis';
    case Dayton = 'Dayton';
    case Delbert = 'Delbert';
    case Douglas = 'Douglas';
    case Dudley = 'Dudley';
    case Ernest = 'Ernest';
    case Eldridge = 'Eldridge';
    case Elijah = 'Elijah';
    case Emanuel = 'Emanuel';
    case Emmet = 'Emmet';
    case Enoch = 'Enoch';
    case Ephraim = 'Ephraim';
    case Everett = 'Everett';
    case Ezekiel = 'Ezekiel';
    case Forest = 'Forest';
    case Gilbert = 'Gilbert';
    case Granville = 'Granville';
    case Gustaf = 'Gustaf';
    case Hampton = 'Hampton';
    case Harmon = 'Harmon';
    case Henderson = 'Henderson';
    case Herman = 'Herman';
    case Hilliard = 'Hilliard';
    case Howard = 'Howard';
    case Hudson = 'Hudson';
    case Irvin = 'Irvin';
    case Issac = 'Issac';
    case Jackson = 'Jackson';
    case Jacob = 'Jacob';
    case Jeremiah = 'Jeremiah';
    case Jonah = 'Jonah';
    case Josiah = 'Josiah';
    case Kirk = 'Kirk';
    case Larkin = 'Larkin';
    case Leland = 'Leland';
    case Leopold = 'Leopold';
    case Lloyd = 'Lloyd';
    case Luther = 'Luther';
    case Manford = 'Manford';
    case Marcellus = 'Marcellus';
    case Martin = 'Martin';
    case Mason = 'Mason';
    case Maurice = 'Maurice';
    case Maynard = 'Maynard';
    case Melvin = 'Melvin';
    case Miles = 'Miles';
    case Milton = 'Milton';
    case Morgan = 'Morgan';
    case Mortimer = 'Mortimer';
    case Moses = 'Moses';
    case Napoleon = 'Napoleon';
    case Nelson = 'Nelson';
    case Newton = 'Newton';
    case Noble = 'Noble';
    case Oliver = 'Oliver';
    case Orson = 'Orson';
    case Oswald = 'Oswald';
    case Pablo = 'Pablo';
    case Percival = 'Percival';
    case Porter = 'Porter';
    case Quincy = 'Quincy';
    case Randall = 'Randall';
    case Reginald = 'Reginald';
    case Richmond = 'Richmond';
    case Rodney = 'Rodney';
    case Roscoe = 'Roscoe';
    case Rowland = 'Rowland';
    case Rupert = 'Rupert';
    case Sampson = 'Sampson';
    case Sanford = 'Sanford';
    case Sebastian = 'Sebastian';
    case Shelby = 'Shelby';
    case Sidney = 'Sidney';
    case Solomon = 'Solomon';
    case Squire = 'Squire';
    case Sterling = 'Sterling';
    case Thaddeus = 'Thaddeus';
    case Walter = 'Walter';
    case Wilbur = 'Wilbur';
    case Wilfred = 'Wilfred';
    case Zadok = 'Zadok';
    case Zebedee = 'Zebedee';

    public static function rand(): self
    {
        return self::cases()[random_int(0, count(self::cases()))-1];
    }
}