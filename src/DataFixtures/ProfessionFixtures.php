<?php

namespace App\DataFixtures;

use App\Entity\Profession;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProfessionFixtures extends Fixture implements DependentFixtureInterface
{
    private const PROFESSIONS = [
        'Accountant' => [
            'Accounting', 'Law', 'LibraryUse', 'Listen', 'Persuade', 'SpotHidden'
        ],
        'Acrobat' => [
            'Climb', 'Jump', 'Throw', 'SpotHidden', 'Swim'
        ],
        'Actor' => [
            'ArtAndCraft', 'Disguise', 'Fighting', 'History', 'FastTalk', 'Charm', 'Psychology'
        ],
        'AgencyDetective' => [
            'Persuade', 'Fighting', 'Firearms', 'Law', 'LibraryUse', 'Psychology', 'Stealth', 'Track'
        ],
        'Alienist' => [
            'Law', 'Listen', 'Medicine', 'OtherLanguage', 'Psychoanalysis', 'Psychology', 'Science'
        ],
        'AnimalTrainer' => [
            'Jump', 'Listen', 'NaturalWorld', 'Psychology', 'Science', 'Stealth', 'Track'
        ],
        'Antiquarian' => [
            'Appraise', 'ArtAndCraft', 'History', 'LibraryUse', 'OtherLanguage', 'FastTalk', 'SpotHidden'
        ],
        'AntiqueDealer' => [
            'Accounting', 'Appraise', 'DriveAuto', 'FastTalk', 'Persuade', 'History', 'LibraryUse', 'Navigate'
        ],
        'Archaeologist' => [
            'Appraise', 'Archaeology', 'History', 'OtherLanguage', 'LibraryUse', 'SpotHidden', 'MechanicalRepair', 'Navigate'
        ],
        'Architect' => [
            'Accounting', 'ArtAndCraft', 'Law', 'LibraryUse', 'Persuade', 'Psychology', 'Science'
        ],
        'Artist' => [
            'ArtAndCraft', 'History', 'Charm', 'OtherLanguage', 'Psychology', 'SpotHidden'
        ],
        'AsylumAttendant' => [
            'Fighting', 'FirstAid', 'Intimidate', 'Charm', 'Listen', 'Psychology', 'Stealth'
        ],
        'Assassin' => [
            'Disguise', 'ElectricalRepair', 'Fighting', 'Firearms', 'Locksmith', 'MechanicalRepair', 'Stealth', 'Psychology'
        ],
        'Athlete' => [
            'Climb', 'Jump', 'Fighting', 'Ride', 'Charm', 'Swim', 'Throw'
        ],
        'Author' => [
            'ArtAndCraft', 'History', 'LibraryUse', 'NaturalWorld', 'OtherLanguage', 'Psychology'
        ],
        'Aviator' => [
            'ElectricalRepair', 'MechanicalRepair', 'Navigate', 'OperateHeavyMachinery', 'Pilot', 'Science'
        ],
        'BankRobber' => [
            'DriveAuto', 'MechanicalRepair', 'Fighting', 'Firearms', 'Intimidate', 'Locksmith', 'OperateHeavyMachinery'
        ],
        'Bartender' => [
            'Accounting', 'Charm', 'FastTalk', 'Fighting', 'Listen', 'Psychology', 'SpotHidden'
        ],
        'BigGameHunter' => [
            'Firearms', 'Listen', 'NaturalWorld', 'Navigate', 'Survival', 'Science', 'Stealth', 'Track'
        ],
        'BookDealer' => [
            'Accounting', 'Appraise', 'DriveAuto', 'History', 'LibraryUse', 'Persuade'
        ],
        'Bootlegger' => [
            'DriveAuto', 'Fighting', 'Firearms', 'Intimidate', 'FastTalk', 'Psychology', 'Stealth', 'SpotHidden'
        ],
        'BountyHunter' => [
            'DriveAuto', 'MechanicalRepair', 'Firearms', 'FastTalk', 'Law', 'Psychology', 'Track', 'Stealth'
        ],
        'Burglar' => [
            'Fighting', 'Intimidate', 'Jump', 'Psychology', 'SpotHidden'
        ],
        'Butler' => [
            'Accounting', 'ArtAndCraft', 'FirstAid', 'Listen', 'OtherLanguage', 'Psychology', 'SpotHidden'
        ],
        'Chauffeur' => [
            'DriveAuto', 'FastTalk', 'Persuade', 'Listen', 'MechanicalRepair', 'Navigate', 'SpotHidden'
        ],
        'Clergy' => [
            'Accounting', 'History', 'LibraryUse', 'Listen', 'OtherLanguage', 'Charm', 'Psychology'
        ],
        'Conman' => [
            'Appraise', 'ArtAndCraft', 'Law', 'Listen', 'Charm', 'FastTalk', 'Psychology', 'SleightOfHand'
        ],
        'Cowboy' => [
            'Fighting', 'Firearms', 'NaturalWorld', 'Jump', 'Ride', 'Survival', 'Throw', 'Track'
        ],
        'CraftsPerson' => [
            'Accounting', 'ArtAndCraft', 'MechanicalRepair', 'NaturalWorld', 'SpotHidden'
        ],
        'CultLeader' => [
            'Accounting', 'Charm', 'Intimidate', 'Occult', 'Psychology', 'SpotHidden'
        ],
        'Designer' => [
            'Accounting', 'ArtAndCraft', 'ArtAndCraft', 'LibraryUse', 'MechanicalRepair', 'Psychology', 'SpotHidden'
        ],
        'Dilettante' => [
            'ArtAndCraft', 'Firearms', 'OtherLanguage', 'Ride', 'Persuade'
        ],
        'Diver' => [
            'Diving', 'FirstAid', 'MechanicalRepair', 'Pilot', 'Science', 'SpotHidden', 'Swim'
        ],
        'DoctorOfMedicine' => [
            'FirstAid', 'Medicine', 'OtherLanguage', 'Psychology', 'Science'
        ],
        'Driver' => [
            'Accounting', 'DriveAuto', 'Listen', 'Charm', 'MechanicalRepair', 'Navigate', 'Psychology'
        ],
        'Editor' => [
            'Accounting', 'History', 'Persuade', 'Charm', 'Psychology', 'SpotHidden'
        ],
        'ElectedOfficial' => [
            'Charm', 'History', 'Intimidate', 'FastTalk', 'Listen', 'Persuade', 'Psychology'
        ],
        'Engineer' => [
            'ArtAndCraft', 'ElectricalRepair', 'LibraryUse', 'MechanicalRepair', 'OperateHeavyMachinery', 'Science'
        ],
        'Entertainer' => [
            'ArtAndCraft', 'Disguise', 'Charm', 'FastTalk', 'Listen', 'Psychology'
        ],
        'Explorer' => [
            'Climb', 'Firearms', 'History', 'Jump', 'NaturalWorld', 'Navigate', 'OtherLanguage', 'Survival'
        ],
        'Farmer' => [
            'ArtAndCraft', 'DriveAuto', 'Charm', 'MechanicalRepair', 'NaturalWorld', 'OperateHeavyMachinery', 'Track'
        ],
        'FederalAgent' => [
            'DriveAuto', 'Fighting', 'Firearms', 'Law', 'Persuade', 'Stealth', 'SpotHidden'
        ],
        'Fence' => [
            'Accounting', 'Appraise', 'ArtAndCraft', 'History', 'FastTalk', 'LibraryUse', 'SpotHidden'
        ],
        'Firefighter' => [
            'Climb', 'DriveAuto', 'FirstAid', 'Jump', 'MechanicalRepair', 'OperateHeavyMachinery', 'Throw'
        ],
        'ForeignCorrespondent' => [
            'OtherLanguage', 'Listen', 'Persuade', 'FastTalk', 'Psychology',
        ],
        'ForensicSurgeon' => [
            'OtherLanguage', 'LibraryUse', 'Medicine', 'Persuade', 'Science', 'SpotHidden'
        ],
        'Forger' => [
            'Accounting', 'Appraise', 'ArtAndCraft', 'History', 'LibraryUse', 'SpotHidden', 'SleightOfHand'
        ],
        'Gambler' => [
            'Accounting', 'ArtAndCraft', 'Charm', 'FastTalk', 'Listen', 'Psychology', 'SleightOfHand', 'SpotHidden'
        ],
        'Gentleman' => [
            'ArtAndCraft', 'Charm', 'Persuade', 'Firearms', 'History', 'OtherLanguage', 'Navigate', 'Ride'
        ],
        'Hobo' => [
            'ArtAndCraft', 'Climb', 'Jump', 'Listen', 'Locksmith', 'Navigate', 'Stealth'
        ],
        'HospitalOrderly' => [
            'ElectricalRepair', 'FastTalk', 'Persuade', 'Fighting', 'FirstAid', 'Listen', 'MechanicalRepair', 'Psychology', 'Stealth'
        ],
        'Journalist' => [
            'ArtAndCraft', 'FastTalk', 'Charm', 'History', 'LibraryUse', 'Psychology'
        ],
        'Judge' => [
            'History', 'Intimidate', 'Law', 'LibraryUse', 'Listen', 'Persuade', 'Psychology'
        ],
        'LaboratoryAssistant' => [
            'LibraryUse', 'ElectricalRepair', 'OtherLanguage', 'Science', 'SpotHidden'
        ],
        'Laborer' => [
            'DriveAuto', 'ElectricalRepair', 'Fighting', 'FirstAid', 'MechanicalRepair', 'Fighting', 'FirstAid', 'MechanicalRepair', 'OperateHeavyMachinery', 'Throw'
        ],
        'Lawyer' => [
            'Accounting', 'Law', 'LibraryUse', 'FastTalk', 'Persuade', 'Psychology'
        ],
        'Librarian' => [
            'Accounting', 'LibraryUse', 'OtherLanguage'
        ],
        'Lumberjack' => [
            'Climb', 'Fighting', 'FirstAid', 'MechanicalRepair', 'NaturalWorld', 'Throw'
        ],
        'Mechanic' => [
            'ArtAndCraft', 'Climb', 'DriveAuto', 'ElectricalRepair', 'MechanicalRepair', 'OperateHeavyMachinery'
        ],
        'MilitaryOfficer' => [
            'Accounting', 'Firearms', 'Navigate', 'FirstAid', 'Intimidate', 'Persuade', 'Psychology'
        ],
        'Miner' => [
            'Climb', 'Geology', 'Jump', 'MechanicalRepair', 'OperateHeavyMachinery', 'Stealth', 'SpotHidden'
        ],
        'Missionary' => [
            'ArtAndCraft', 'FirstAid', 'MechanicalRepair', 'Medicine', 'NaturalWorld', 'Charm'
        ],
        'MountainClimber' => [
            'Climb', 'FirstAid', 'Jump', 'Listen', 'Navigate', 'OtherLanguage', 'Survival'
        ],
        'MuseumCurator' => [
            'Accounting', 'Appraise', 'Archaeology', 'History', 'LibraryUse', 'Occult', 'OtherLanguage', 'SpotHidden'
        ],
        'Musician' => [
            'ArtAndCraft', 'Charm', 'Listen', 'Psychology'
        ],
        'Nurse' => [
            'FirstAid', 'Listen', 'Medicine', 'Persuade', 'Psychology', 'Science', 'SpotHidden'
        ],
        'Occultist' => [
            'Anthropology', 'History', 'LibraryUse', 'Charm', 'OtherLanguage', 'Science'
        ],
        'OutdoorsMan' => [
            'Firearms', 'FirstAid', 'Listen', 'NaturalWorld', 'Navigate', 'SpotHidden', 'Survival', 'Track'
        ],
        'Parapsychologist' => [
            'Anthropology', 'ArtAndCraft', 'History', 'LibraryUse', 'Occult', 'OtherLanguage', 'Psychology'
        ],
        'Pharmacist' => [
            'Accounting', 'FirstAid', 'OtherLanguage', 'LibraryUse', 'FastTalk', 'Psychology', 'Science'
        ],
        'Photographer' => [
            'ArtAndCraft', 'Charm', 'Psychology', 'Science', 'Stealth', 'SpotHidden'
        ],
        'PoliceOfficer' => [
            'ArtAndCraft', 'Disguise', 'Firearms', 'Law', 'Listen', 'Persuade', 'Psychology', 'SpotHidden'
        ],
        'PrivateInvestigator' => [
            'ArtAndCraft', 'Disguise', 'Law', 'LibraryUse', 'Persuade', 'Psychology', 'SpotHidden'
        ],
        'Professor' => [
            'LibraryUse', 'OtherLanguage', 'Psychology'
        ],
        'Prospector' => [
            'Climb', 'FirstAid', 'History', 'MechanicalRepair', 'Navigate', 'Science', 'SpotHidden'
        ],
        'Psychiatrist' => [
            'OtherLanguage', 'Listen', 'Medicine', 'Persuade', 'Psychoanalysis', 'Psychology', 'Science'
        ],
        'Psychologist' => [
            'Accounting', 'LibraryUse', 'Listen', 'Persuade', 'Psychoanalysis', 'Psychology'
        ],
        'Researcher' => [
            'History', 'LibraryUse', 'Persuade', 'OtherLanguage', 'SpotHidden'
        ],
        'Sailor' => [
            'FirstAid', 'MechanicalRepair', 'NaturalWorld', 'Navigate', 'Intimidate', 'Pilot', 'SpotHidden', 'Swim'
        ],
        'Salesperson' => [
            'Accounting', 'FastTalk', 'Charm', 'DriveAuto', 'Listen', 'Psychology', 'Stealth'
        ],
        'Scientist' => [
            'Science', 'OtherLanguage', 'Persuade'
        ],
        'Shopkeeper' => [
            'Accounting', 'ArtAndCraft', 'Persuade', 'FastTalk', 'LibraryUse', 'Psychology'
        ],
        'Soldier' => [
            'Climb', 'Fighting', 'Firearms', 'Stealth', 'Survival', 'FirstAid', 'MechanicalRepair'
        ],
        'Spy' => [
            'Disguise', 'Firearms', 'Listen', 'OtherLanguage', 'FastTalk', 'Psychology', 'SleightOfHand', 'Stealth'
        ],
        'StreetPunk' => [
            'Climb', 'Intimidate', 'Fighting', 'Firearms', 'Jump', 'SleightOfHand', 'Stealth', 'Throw'
        ],
        'Student' => [
            'OtherLanguage', 'LibraryUse', 'Listen'
        ],
        'Stuntman' => [
            'Climb', 'ElectricalRepair', 'Fighting', 'FirstAid', 'Jump', 'Swim'
        ],
        'TaxiDriver' => [
            'Accounting', 'DriveAuto', 'ElectricalRepair', 'FastTalk', 'MechanicalRepair', 'Navigate', 'SpotHidden'
        ],
        'TribeMember' => [
            'Climb', 'Fighting', 'Listen', 'NaturalWorld', 'Occult', 'SpotHidden', 'Swim', 'Survival'
        ],
        'Undertaker' => [
            'Accounting', 'DriveAuto', 'FastTalk', 'History', 'Occult', 'Psychology', 'Science'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        foreach (self::PROFESSIONS as $name => $skills) {
            $profession = new Profession();
            $profession->setName($name);
            foreach ($skills as $skillName) {
                $skill = $this->getReference($skillName);
                $profession->addSkill($skill);
            }
            $manager->persist($profession);
            $this->addReference($name, $profession);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SkillFixtures::class,
        ];
    }
}
