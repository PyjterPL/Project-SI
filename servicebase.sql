-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2018 at 05:42 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servicebase`
--

-- --------------------------------------------------------

--
-- Table structure for table `articlecategories`
--

CREATE TABLE `articlecategories` (
  `CategoryID` int(11) NOT NULL,
  `Name` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `articlecategories`
--

INSERT INTO `articlecategories` (`CategoryID`, `Name`) VALUES
(1, 'C++'),
(7, 'Java'),
(8, 'C#'),
(9, 'Sieci komputerowe');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `ArticleID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Content` text COLLATE utf8_polish_ci NOT NULL,
  `Title` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Introduction` text COLLATE utf8_polish_ci NOT NULL,
  `InsertDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Tags` text COLLATE utf8_polish_ci,
  `Image` blob COMMENT 'JPEG'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ArticleID`, `CategoryID`, `UserID`, `Content`, `Title`, `Introduction`, `InsertDate`, `Tags`, `Image`) VALUES
(37, 1, 21, 'WyszÅ‚a nowa super gra! Napisana tylko w C++!WyszÅ‚a nowa super gra! Napisana tylko w C++!WyszÅ‚a nowa super gra! Napisana tylko w C++!WyszÅ‚a nowa super gra! Napisana tylko w C++!WyszÅ‚a nowa super gra! Napisana tylko w C++!WyszÅ‚a nowa super gra! Napisana tylko w C++!WyszÅ‚a nowa super gra! Napisana tylko w C++!WyszÅ‚a nowa super gra! Napisana tylko w C++!WyszÅ‚a nowa super gra! Napisana tylko w C++!\r\n\r\nWyszÅ‚a nowa super gra! Napisana tylko w C++!WyszÅ‚a nowa super gra! Napisana tylko w C++!\r\nWyszÅ‚a nowa super gra! Napisana tylko w C++!', 'WyszÅ‚a nowa gra!', 'WyszÅ‚a nowa super gra! Napisana tylko w C++!', '2018-01-17 16:37:21', 'nowa gra', 0x89504e470d0a1a0a0000000d4948445200000150000000f00803000000615dccb100000300504c54453231329097faffe0e177c644ffc2c47c4fc8b1e6ffd0ffffffd9fffafafa74abd9cd7eda89c22f9e5d228440030201eb000000000049f4ac002000120040800000000008008c000a7c913900021a00000000000000000012f4c80477008a7e39000000000000d54100247e367e36878c008aec0000647ffd0012f4000002874800cd001a0100003a0043005c006f00440063006d007500650074006e007300610020006e002000640053007400650074006e00690067005c0073004b00630061007a0061006d0072006b00650020006400410061005c006d0050006c0075007000740069005c006f0063006d0061006d006e006f0064005c00740061006100690072003000300030002e006e0070006700000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000e400000012f500000000b800407c91001a8712f6b0004100787c9100151391005d00007c2d00007c90ff0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000002280000000000000000000000000000000000000000000000002ed3007a7c917c90cf809ab2ffff7cc8ffff0012f6000000f6cc00000012000010809ac940007cac000100159cec8000000001a400000012f712f690006000507c910012f7839af09ad07cff7c80ffffff809ac99a797cff7c80ffffffec80004000010000010000100000048000001401ec4248dae000000001624b4744ffa507f2c5000000097048597300002e2300002e230178a53f760000138c49444154789ced9b8b76e4380a86b39bb924d3bdfdfe8fbbeb51d3f0c30f42be54d566cc39a9b27585cf082427797bbbe5965b6eb9e5965b6eb9e5965b6eb9e5965b6eb9e5965b6eb9e5965b6eb9e5965b6eb9e5965b2e977fbdb8bcbaa62f08b4d2e5ededdf3fc5d71ed7fefd6f393282eaf14240dfde7efb294c1badddea6df9a8d9a3fffbbba01c3f3dacd2366af8b24023525b67e109ce3d4837246f6fefbf44aeeb71de83585d4aa0672c8399d8993d50f44306d4e25c473ad06d6320523e8afaf0d02d222d81f267d055b4d763ccaa203c9c0cb6f8aff6cf82c16c7e81a858b74fd6cfa2544fd66bb527019a3d859ef4faf8a8c881c61a5bf7db6fbec68e5e0732f5c6ed537dd4f751ffb5d8a3cb4d96bc6d6e9fc30ca578686d4c041a97af95acc603556f97ba5a0b1b3c620c4506a3857ab4c5da00ea2799fbaa46995960f73819d0dc0f2b9ce2ebb6b613596d1c6540d53795957c0b95295019b4b7f47109e822ca7a5c07d4d7768022346f53f4c6d87f01280e383ae740475b7d6e36079e0b94e19c01552da2157e7545dfac575e13a8d6db2794abe3b7bda28cdf0acd81d6a519d0d8cb6fb22c54d4083d5480a267e6489b4047d37727194e8bdec244dfc9f2364393fbe00a50ec63dd4376a3769f697176f82c03d5042513c7161eb928c450441c35a2a340e3ace822ea06d6462d9da1dc013402c3ba31a0461af9bc0ee8ea7dd4c53f7ab11237ee199b58ba04545bb1256f31e3586b89e6b140ad457edb6413b1d888ce121d6c09a845cb3c149f2b3e5d66c60cd23a507c57d505aab57a92cf4ef8fe138305dadc049a2f797bce15d539bcb381465c1da05822502c560b08eb18cc5d40152502f5cfacc6f44a40f1de63e1f6f133bd5f952da07818d55c6f27e9ec2e73482b6dcf052a48e5138fd178ec44a4182c1681f2d77a76c8caf4d706aa48050d7f4184ad6c30d805d47ba99cf5a377ae015d87bf0e743e9b8ef5ee04cb7dc22230fb40d52b05a80c9b19df81d407caf1f992aa47355b04e79774447968c9ab6824cdfc730513f3ab4e3bab7f06b4e7b358a7c8184c86f210501d5e977c0f532e15d03cfa1d015ae961532f464f4dc711ee210fb559f01aa016d133808e5c8f9bfc7846d2df4d1d048a01bb8b299757028a074febb18a5a6a95c741a032c90cd971a0158cf3818ed726d62b71e7e97d1589944067afadf4995d05548fb059bb88f30ca022f8bb78fb624fa3680b680cbad1c5ed3bd25702ca60cd8066efa1867d7846f27eab5452a0f6d88591327f22b9fa9537cc4ed76cfcbd40fb1ae2980ad26fa62c620af4f7ff09f34a9fd97eff5b6c84abf678d7029de389407b1adbfbcddaec3dd4f8dca84c814ad37810b3dba4b93a57038df0ce008afd1565b67609d0ca2bf1bc5029e8213c03685d56038d338e327d0934eeec764aea2950f4cada3b998233a0bd13d0b381c611f0addaf62999243d7a2a42efdcde5ba3bab334c120f6ccbc1ae8cc016c3b3917c9b5dd91079c0854df278d527bd06453ad00ed6cd85f11e8e0107d343d7ca277dad350ee9d730533a0ac5517284799d7572374810ea49e94ddbb1740f12c845b8599111da00cd5954063b466f3ccc6b7eb969de62950fbb73bd62fc5a9e746cc8076519d0bd48fcbe699f7b79434bb17474f0fd4feed5df7255dc4909b7035d07980e2a1a71a5b806a2c4d81226f012a5d3d4eafc4738046f3d7807674c53b4c4b036f0ad4c3c49701b34cb9a264868a8dd2c19e8db10768d656327ddca9a7313402c5a4b40fe88aef65ed9e09d4b6d62da4fd6dd2e46d932624dc9b4635b8995700ed9b9ccf5bebb207a8c4d29687be16d04d8b2ed00cde2a506687ac5ddd386df5ad183ac2adddec77a3e45540b73a9f1c8f015db74360ea7b7bdd8b1640ad7fea663f3784df9d07d4a603dcbe3d1ee84087ff1d63df3e119cd62ff5396440191ca6e811a0f86b330f6005e81e3d11a77735f99f5102f48f5f22ca0b562de750d68056f93bf7508b359be76aa07ffcb1b1d8b4d83e6d8e116a0950dc2e59d0cf023aeee58d4266f2f540079ded0a5f7352a07ffe14bbffdce4fd5d6a8e00eded30674057761b19d06cfc79adf0d97eec3be3513301aa4fe0cf3f8f02ada268666e06b44a490c491f289fdd965842087483fca240c7ecaf07d472b01e2a3f0428c6cf3d3174653bc381da456ddbd8add3b380f21c235224258469075a4f4b7b808a0f6a1b3d25d540abbb1c6807b6073a7eece6b24c4a6cb9ef5bf473a0581e7799ea0df938d52c1e67a663adbf5ff2233559a0690cddaa47e50ad09942dc34065463a400b598cf03eae75f078a81b14c4a039d7ccf8072f5ab3b0fd4de79a0518e01adf4af46f6aee563e804e830ad03b46f5c06d42e6b1e43af045af5ad808ad34d81ea965e37f40c28f7499f04eab682d3beacd576d84237cf6b40bb7b800a36073af550c9f092c17c86c72c3fcbb17da08a0cb7455223a543c7b38056fab19e9ec4a0a150936d93058a7bd0eb808aa1fef7aa08db9e99fd185703e538f505c978819400f59f39d2b380aaa8278a3ea354944d3ce1d7d8c780e63d33a00d0fd5a65701e5380497d54634d2eb0a28c7b7a21fd3f634a01c26029d471e5fb32216a4ea96bc792458ed3583c61f37b7e3c0929fcb1e1fe821440f5594e8adf49057ca51a01599b6879e09b46bb8261ffb1ec12e7c04fb3a400f79e83c8ace938f85e8fd52ef2344abc39a5440b915b6fe6140b3ec383b3c72805a32b4c145ef75d82773ff5c03aa502f06da15fb7a216aa35ad964742e505663efe7380fc65004ca955b918872945a88766ef9de2f73a0583f077ad04373a47b4d8ccb3e5beaaac131891aef056a5f373b390a74bf7931350d7de2614335dd3f1b9797037ad4a08f9fe2f5e1fbcef391eec569a91025f70255b5bc8ab64c5f838c1fa9c70732b0463523f208858fac5ad8cf0ed20701f548ad4accbc78cfca997722ca19520f3002c6995f14282ac5cde340ed06256ac2604a491728f7d42ed055260780b2b79211a8ff96f663720bd46b2257dc3357808a061e6c07e9838172952aa03c927913716c86b30f34ff99235d657210281bc247546ea67efa72067420b45e99c7d12a66b25050415d277201d07325f3c359ae3f4b0ed358077a25520f6dbbfbfcdc7e1e01f414167fed92ab4cdaa00d8072a7e5d702ddc7e13a12278945a877f3bde80b8957f6d1f795367a1d33fe311da474b57fc30a6cfcf1f1d87b95b17c3ea8c4947454071d63b5bf2f7941a012871028c6cda8fa311dbe38501be0b14e4c67dba9233a7c61a08252f3a5b6d5fbeca4b44f87230f6401e833eed90604cdc6522eab3af811fbfd7ba9f5a96281da45bf5de98eb406fa6222065cfd1d9f2bdf266bbd00956dbef4c96cb0a3e7da9c6bf513817a93b373c7a8fffc5b50cf1c6816f9be2c506f7207286a375054073e3ffed3803e46bcb91ea8f53d960c46bffa0c1de778829cf39cea6f5cf03273e6a10254db6a3f8f9e5993cdeda3f9796befe140ada90ca75fcab6adbdb66d6648ed83f86240a3a116a86ac290aaa87ff68166d65d0af459e2bd53ca466d86537a54cbfee972a637f2f8893951e1f9ab780045a0fe18507ba91de5ca60f660a0689607a340331f951465df4ac534c62caae3e81700aa38bc8762a9d54bb5e43833a84f057abd30a016a2dee55e57018d3d9e68eeb5cfcfc7d2988210e40c28c719fbe89cd75a471edaa3802a180bcf47d40ce80c67eea3ff18a08a30a2f51a72ec1d1f7d02d0c74b84a040f56e93ed05c9a634db30cd7df46972f439555e6ec717f11014d306d0c21940d18b573df4ea35f80240fd3b235dee9f9fb65cdf865adf8c0fe5cb01adbe7b400595f5507dbd8c8b3d078a489f08f45af9f86053232085287811276fdf01fa0493af7e7ed12cb9d3b8a9180599fdf5079ea4a46c75d13f2ccb9f016c15a82d1971d32ef9f16bb94d462b0c0f37500a54fc74601458e3eaf397f825ee757f49a08f16c529482d508b5323aa7f59d789a14f94fdcf67d6dfd6c6d9b44cf0f96f9b8ad6815a0f7d68967f065054e59308c2f36fa9e20b957f3cd0ed4fbf155b0694a1629ec916fcd3805e2b19d0ed5affcc8601e57ed78f9e4f32f9e8f3e9d423502c63cbddff118e85d64f4851872bbe4f06da038ed37e7c60598654b0e2c2cee54b003deea188d46f9bf0d51e82ebf9e8c3813e5e3c4e8518ef623ac2b1e691f409b2df3babfe7e0fa0ad71f618376d5ad29f4d041ace604302b30b7b9cfd7d32d0bcde2e360631df2a450f45a01f462c50efa35c8f97065ad573a05502f298bdc709da0f90d9c6fe0940af140f7413f5bf39de2c775ba09bcc3cf481b2fa3cf45e95cef35fc7a80a6844ea812252d672ddca95ef834039b06340b3b3bc46558b35e2b448ff0f816a22ea03f573fa34c20200028d982cd288dddaf660a0cf10046ab33be6788634e254a35e6427bafa5cd0ff3a59decfe83d54dfd36f7772b5f59c03cd3dd4d65afce77e9f0a54977f0d14278e38f1f79c72cd558e38b365c7f57849a06244d5ae0b54ae22d02c4679a499614f037aa5d440edf5b76fb6cdb76fdb7d7c40386a8593cffd00597f2e51e959965f012aad052843979547cbac1e0fcdf2ab43ed07fa1795b7b7efdf3906bdcf6a32b37cfb2f04d4ce94011d75d8c763b300fd7d6ed383817eff2ebef108e13811a84a8ed37bef4b8947da7d3ea3ed5a96cf80b2bf5e8e7e68117680323d8e7e7bab4ba088361f7afcd40b6905a8fe290302cda50394eb711ce860b45d276b7b60fcfe4be2f3e580cf058a8bbf03f5394095169ff5cda214a008f6489c8d26d738f721edcebd2299c583cfb82ab878a81806b4c4ab583d4f6ed46cc9af23cd90d8fabef7092cbbb465a96bdd043bc3e9e95ba46703f55e9aa1b90e6864e181dad28c118189dcedc0d9c29fab88b206d43f9873812205bc622e85bc2ca9376c18a17a903100e451a696ce92f79ba798543a405704315a0ed15a9ec261a888d436f5653a158ed4338f03f5b5382ecfd82b38fd03510bb867aac5717d46f773c281faed94df30441f650632b33b3eea47b118116a8d31f370b500ddc452c1526b75c41dba62159b24628e0bc42a3a7ea2d9f83f1d88b04a4b11e20ca8008c4099e5e8ad9191f5d07c4e6880cfc0d764adb200c081c63f98e1403bbf3c9efbe72c20a0ad3152fa5a5e12068d7ee7e366f4477caa716726257c616a5eb7f79dad935c7770796fc6339e058aab0fb930578af81d508c0a78c57601be0427b7cb438d1174fccfbffc3fd0d47f406b47cd7fd3195be343f0eec376360ca85d97d9dc00d74f9023e668b196cd13ff28d17eda101011f99cdf13bb1b456be3b21f5711b5b73df550ec8acfc596ea9435443f1ec3ea6329cff4de7f15ea1ace68336aa69af31c117d77e2a1169e96e0840c25eb95abcdc42fee1ca90802cd03442e4c1b8bb4caf6f3918827469fab3d32fab77f103552bcc27ff4f27b80d87b0694adb6791ec8083580aafce7b08c31b6cf6cccb7b71f3f46cdf6fde3c7b88bffd2e581f2986a6b7116b4ca6bc26d9552e9279facd70e8c0ac70f5529332ff3401529fba991da6d566ea845256d323ba2de9c918ed4046a9f8bf5b8fa21cc45505aa08238fb9b923ca6629d9d4391b1555203cd59c4fb050fad3af5fa64e503a105ba5dfbfda80786983b40edd57552c0c970ad2d90ced402149122a20c28df622950f4cedc53e76bb3b2c4475c87543146a02b0b84a96e3d4717b746520e347aa05ff631c27a2d304576b4f78f226be34b084edff0ac8582383162fe00518d66486740f75a31779d988a8a7ccfbbae2894abb089444e8167bf31dbe3def4b1402bbbb9fb15203bdb85bd223ea928596212887cdbe4919e0d54359dd71440c5cd332f3d43bc27b23cbfdd31f56aa036ea1ed12fdbc07b2bd8212105ca07384374a9db9f1845a3827c3f6a177d5c690c4b6d49ddd672b273611928c2959ae39cb5d0a9d922f77e6bd74a0728229debbacf3d88073a47a4157ba7eb88fae6108ca4089421ad97fc1ce8b104abe8d867eaa167464cabc8b8c26d9185996932072a48cfd5bab68627bec443b1911faa3f31fe6c6297ba056a93535c2be7025d3998b01e79ff16d03dca54fd71335f01f5a7b639d263ba316de395ad6527328773e6caeb01dd3f5d7dbf84afed702bc5f71939cefd402bdf46bba35d5a9300b51dbdcbe342dc1fd671b1dbc8891b2766dcf940739bb51e2dae0e0d0468ecc8f35a3674c700efa3fc6d13eb5b015ddfce77323e1e75e65bc304277a2bc6336cb1a6bc02c588c98e9dacef99407d9466daae0a8119a1fad4d01b36bfe328e52e033a7e8e02edb5a8acf47e8a9e9bfa27a258f3c55a3d7ff0e4474fdbc72eb81aa7fe2e294797bbc6de5086ba521f6513f5f77855f0de047d134ff316378ed801caa2bfb703c79ce9ba6e73b2e8f70ddb6dc7ded5db258f59de3effca3bb315664bfd5ae46872b7cafa587604e92a22db1add9faba4086dccb41b7cdc877693521d453bb6319cfe71b071f5a12592abd5951828745ce693fe0509573df7cf39526b34d395eb3de76151a720fd62e9c69ade6ec0faa1faa587bc0254c4228debc3fa5aad9d2532078a6d4b996f23e2f0cc1cae04fa657c6112fbcd808e58aa1aacac35bf9ad4c5ea50819c528cf9903de57a4fd5ffe2c3226523e4ff3762ff92644dd7b905d149fc2c0dffc4ec68217450f53c94fff2434300eb9703d5eb6c4e0e8369cf7ba21fea5825c87c89fb5638956f95a9ecdb7994f66509ebb50ab4c2c375aaf6afd63ec682c0c4ae3820428f6af652128ec54ef159961fbd38d2b8e4a3f6337d663a5b3b39b70094c3e228b0c76a0af08909a3673ccf6b1ff6abbad15a81ae6be367896511668cb48987c6dd230e552bd35df6765e7c2b5afbe80c2822d1fb8e4edefa381652f0234667bbe5965b6eb9e5965b6eb9e5965b6eb9e5965b6eb9e5965b6eb9e5965b6eb9e5965b6eb9e5965bce96ff024fe93d3bcd2738cc0000000049454e44ae426082);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `ArticleID` int(11) NOT NULL,
  `InsertDate` datetime NOT NULL,
  `Content` text COLLATE utf8_polish_ci NOT NULL,
  `UserID` int(11) NOT NULL,
  `Votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `ArticleID`, `InsertDate`, `Content`, `UserID`, `Votes`) VALUES
(14, 37, '2018-01-17 17:37:44', 'Super artykuÅ‚!', 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(11) NOT NULL,
  `SenderID` int(11) NOT NULL,
  `RecieverID` int(11) NOT NULL,
  `Content` text COLLATE utf8_polish_ci NOT NULL,
  `Title` varchar(100) COLLATE utf8_polish_ci NOT NULL COMMENT 'Max 100 znaków',
  `SendDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `PermissionID` int(11) NOT NULL,
  `Description` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`PermissionID`, `Description`) VALUES
(1, 'Admin'),
(2, 'Moderator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_polish_ci NOT NULL COMMENT 'Max 50 znaków',
  `Password` varchar(70) COLLATE utf8_polish_ci NOT NULL COMMENT 'Max 70 znaków',
  `Email` varchar(50) COLLATE utf8_polish_ci NOT NULL COMMENT 'Max 50 znaków',
  `Avatar` blob COMMENT 'Avatar użytkownika, tylko jpeg',
  `Description` text COLLATE utf8_polish_ci COMMENT 'O sobie',
  `PermissionID` int(11) NOT NULL,
  `BirthDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Password`, `Email`, `Avatar`, `Description`, `PermissionID`, `BirthDate`) VALUES
(21, 'Admin', '$2y$10$LcI2I5Fa2ABcI4tYRSXppe4oHwepOK8QEZXoQmsV8MpB2a64hY7Py', 'admin@admin.pl', NULL, 'Admin', 1, NULL),
(22, 'User', '$2y$10$ftAJCR63utX5hkrswv1Lf.0ZnDbbLuz7shHumccRYuGgq9UicrWZq', 'user@user.pl', NULL, NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `VoteID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CommentID` int(11) NOT NULL,
  `VoteDate` datetime NOT NULL,
  `VoteValue` tinyint(4) NOT NULL COMMENT '1 albo -1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`VoteID`, `UserID`, `CommentID`, `VoteDate`, `VoteValue`) VALUES
(6, 21, 14, '2018-01-17 17:37:48', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articlecategories`
--
ALTER TABLE `articlecategories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ArticleID`),
  ADD KEY `User` (`UserID`),
  ADD KEY `Category` (`CategoryID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `Article` (`ArticleID`),
  ADD KEY `UserName` (`UserID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `Reciever` (`RecieverID`),
  ADD KEY `Sender` (`SenderID`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`PermissionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `Permission` (`PermissionID`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`VoteID`),
  ADD KEY `UserCommenting` (`UserID`),
  ADD KEY `Comment` (`CommentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articlecategories`
--
ALTER TABLE `articlecategories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `ArticleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `PermissionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `VoteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `Category` FOREIGN KEY (`CategoryID`) REFERENCES `articlecategories` (`CategoryID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `User` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Article` FOREIGN KEY (`ArticleID`) REFERENCES `articles` (`ArticleID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserName` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `Reciever` FOREIGN KEY (`RecieverID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `Sender` FOREIGN KEY (`SenderID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Permission` FOREIGN KEY (`PermissionID`) REFERENCES `permissions` (`PermissionID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `Comment` FOREIGN KEY (`CommentID`) REFERENCES `comments` (`CommentID`),
  ADD CONSTRAINT `UserCommenting` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
