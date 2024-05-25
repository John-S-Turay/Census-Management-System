CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobilenumber` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `livestock` (
  `Cat` int(11),
  `Dog` int(11),
  `Sheep` int(11),
  `Goat` int(11),
  `Cow` int(11),
  `Pigs` int(11),
  `Chicken` int(11),
  `Duck` int(11),
  `Monkey` int(11),
  `Other` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `assets` (
  `Radio` int(11),
  `TV` int(11),
  `Phone` int(11),
  `Landline` int(11),
  `Computer` int(11),
  `Bicycle` int(11),
  `House` int(11),
  `Car` int(11),
  `Fan` int(11),
  `Lorry` int(11),
  `Refrigerator` int(11),
  `DSTV` int(11),
  `microwave` int(11),
  `Other` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `info` (
  `name` varchar(50),
  `Relationship` int(11),
  `sex` varchar(11),
  `age` int(11),
  `Name_of_mother` varchar(50),
  `Religion` int(11),
  `household_number` int(11),
  `nationality` varchar(50),
  `Marital_Status` int(5),
  `Address` varchar(50),
  `Duration_of_residence` varchar(50),
  `is_father_alive` varchar(50),
  `is_mother_alive` varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `disability` (
  `What is the type of disability` int(11),
  `difficulties` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `orphanhhod` (
  `birth` int(11),
  `occured` int(11),
  `Name_of_person` varchar(11),
  `Was_this_death_notified` varchar(11),
  `How_old_was_the_person` varchar(50),
  `male_or_female` varchar(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;