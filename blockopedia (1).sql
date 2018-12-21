-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2018 at 08:53 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blockopedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `bop_careers`
--

CREATE TABLE `bop_careers` (
  `bop_job_id` int(10) NOT NULL,
  `bop_job_title` varchar(200) DEFAULT NULL,
  `bop_job_description` text,
  `bop_job_qualification` varchar(200) DEFAULT NULL,
  `bop_job_created_at` datetime DEFAULT NULL,
  `bop_job_updated_at` datetime DEFAULT NULL,
  `bop_job_status` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_careers`
--

INSERT INTO `bop_careers` (`bop_job_id`, `bop_job_title`, `bop_job_description`, `bop_job_qualification`, `bop_job_created_at`, `bop_job_updated_at`, `bop_job_status`) VALUES
(12, 'Test Career1', 'Lorem ipsum dolor sit amet, mi bibendum ut sed curabitur, neque lobortis, congue a volutpat mauris a nulla,', 'Mca', '2018-03-23 10:08:19', '2018-03-23 10:10:49', 2),
(13, 'Test Career2', 'Lorem ipsum dolor sit amet, mi bibendum ut sed curabitur, neque lobortis, congue a volutpat mauris a nulla,', 'Btech', '2018-03-23 10:08:50', '2018-03-23 10:10:53', 2),
(14, 'Test Career3', 'Lorem ipsum dolor sit amet, mi bibendum ut sed curabitur, neque lobortis, congue a volutpat mauris a nulla,', 'Ma', '2018-03-23 10:09:19', '2018-03-23 10:11:23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bop_compaines`
--

CREATE TABLE `bop_compaines` (
  `cm_id` int(11) NOT NULL,
  `cm_uid` int(11) DEFAULT NULL,
  `cm_unique_id` varchar(200) DEFAULT NULL,
  `cm_ctid` int(11) DEFAULT NULL,
  `cm_name` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `cm_apiname` varchar(200) DEFAULT NULL,
  `cm_picture` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `cm_decript` text CHARACTER SET latin1,
  `cm_siteurl` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `cm_marketcap` bigint(63) DEFAULT '0',
  `cm_escrow` text CHARACTER SET latin1,
  `cm_total_token_supply` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `cm_tokens_available_crowd_sale` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `cm_inflation` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `cm_ico_start_date` date DEFAULT NULL,
  `cm_ico_end_date` date DEFAULT NULL,
  `cm_ico_start_time` varchar(50) DEFAULT NULL,
  `cm_ico_end_time` varchar(50) DEFAULT NULL,
  `cm_ico_conditions` text CHARACTER SET latin1,
  `cm_mobile` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `cm_email` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `cm_resources` int(11) DEFAULT NULL,
  `cm_discord` varchar(200) DEFAULT NULL,
  `cm_slack` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `cm_twitter` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `cm_facebook` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `cm_github` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `cm_telegram` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `cm_google_plus` varchar(200) DEFAULT NULL,
  `cm_linkedin` varchar(200) DEFAULT NULL,
  `cm_coinmarket_cap` varchar(200) DEFAULT NULL,
  `cm_address` text CHARACTER SET latin1,
  `cm_overallrating` varchar(50) DEFAULT NULL,
  `cm_totalviews` int(11) DEFAULT NULL,
  `cm_status` tinyint(4) DEFAULT NULL,
  `cm_approval` int(11) DEFAULT '0' COMMENT '1-Approve,0-Disapprove',
  `cm_caretedat` datetime DEFAULT NULL,
  `cm_modifiedat` datetime DEFAULT NULL,
  `cm_cron_checker` tinyint(2) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bop_compaines`
--

INSERT INTO `bop_compaines` (`cm_id`, `cm_uid`, `cm_unique_id`, `cm_ctid`, `cm_name`, `cm_apiname`, `cm_picture`, `cm_decript`, `cm_siteurl`, `cm_marketcap`, `cm_escrow`, `cm_total_token_supply`, `cm_tokens_available_crowd_sale`, `cm_inflation`, `cm_ico_start_date`, `cm_ico_end_date`, `cm_ico_start_time`, `cm_ico_end_time`, `cm_ico_conditions`, `cm_mobile`, `cm_email`, `cm_resources`, `cm_discord`, `cm_slack`, `cm_twitter`, `cm_facebook`, `cm_github`, `cm_telegram`, `cm_google_plus`, `cm_linkedin`, `cm_coinmarket_cap`, `cm_address`, `cm_overallrating`, `cm_totalviews`, `cm_status`, `cm_approval`, `cm_caretedat`, `cm_modifiedat`, `cm_cron_checker`) VALUES
(11, 1, 'BOP712345', 1, 'Bitcoin', NULL, 'digital_bitcoin_20180321_072206.jpg', 'Bitcoin is the first digital currency that\'s sent via the internet.  Fees are supposedly lower using Bitcoin than regular currencies because there are no third parties in between each transaction.  Bitcoins can be used as any type of currency ex pound, dollar etc.  Miners are what verify each transaction.  Each transaction is recorded in a public ledger.                  ', 'https://bitcoin.org/en/', 112776532020, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'contact@blockopedia.com', NULL, '', 'https://slack.bitcoincore.org/', 'https://twitter.com/bitcoin', '', 'https://github.com/bitcoin/bitcoin', '', NULL, NULL, '', 'New York, NY, USA', '0', 0, 2, NULL, '2017-06-13 00:40:55', '2018-07-06 00:09:27', 0),
(181, 1, 'BOP000181', 1, 'SONM', NULL, 'digital_sonm_20180322_052857.png', 'SONM stands for supercomputer organized by network mining.  SONM is based on Ethereum.  This is designed for general purpose computing such as mobile app hosting to video rendering.\r\n', 'https://sonm.io/', 20543100, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://sonmio.signup.team/', 'https://twitter.com/sonmdevelopment', 'https://www.facebook.com/SONM-Supercomputer-Organized-by-Network-Mining-954849207981204', 'https://github.com/sonm-io', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-25 20:54:35', '2018-11-14 02:13:28', 1),
(14, 1, 'BOP000014', 1, 'Monaco', NULL, 'digital_monaco_20180322_052649.png', 'Monaco is a cryptocurrency card called Monaco Visa.  Using the Monaco Visa people can send and spend money internationally.  Costomer onboarding can even be done using the Monaco app.', 'https://mona.co/', 66182913, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/monaco_card', 'https://www.facebook.com/Monaco-Card-1355426087883151/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-15 20:29:02', '2018-11-14 02:16:06', 1),
(15, 1, 'BOP000015', 1, 'Storj', NULL, '20170615_203915.png', 'Storj is a large cloud storage provider with no data center.  This is an encrypted cloud storage that uses a blockchain.  Users can be paid by renting our their extra space.  All together Storj is a token, platform and tools for developers.', 'https://storj.io/', 41553613, '', '', '30000000', '', '2017-05-19', '2017-06-19', NULL, NULL, ' ', '', '', NULL, NULL, '', 'https://twitter.com/storjproject', 'https://www.facebook.com/storjproject', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-06-15 20:39:48', '2018-11-14 02:15:14', 1),
(16, 1, 'BOP000016', 1, 'MobileGo', NULL, '20170615_211713.png', 'MobileGo is a gaming platform and store for in game purchases that\'s all decentralized.', 'https://mobilego.io/', 49682327, NULL, '100', '20', '', '2017-04-25', '2017-07-24', '5:30', '4:30', '', NULL, 'sathyam@gmail.com', NULL, NULL, 'https://gamecredits.com/slack.html', 'https://twitter.com/MobileGoIco', 'https://www.facebook.com/MobileGo-ICO-1967836613444499/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-15 21:17:51', '2018-11-14 11:23:30', 1),
(17, 1, 'BOP000017', 2, 'Exscudo', NULL, 'ico_exscudo_20180420_113416.jpg', 'Exscudo is a platform that makes access to cryptocurrency market, fast, easy and secure.  Some things included are: leading exchange platform, charts, trading terminals, wallet, cryptocoin debit card, and a messenger that\'s decentralized.', 'https://exscudo.com/', 123456789, NULL, '', '', '', '2017-04-25', '2017-09-29', '0:00', '4:00', '', NULL, 'team@exscudo.com', NULL, '', '', 'https://twitter.com/ex_scudo', 'https://www.facebook.com/exscudo/', '', '', NULL, NULL, '', 'New Delhi, India', '0', 0, 0, NULL, '2017-06-15 21:27:50', '2018-10-19 02:01:50', 0),
(18, 1, 'BOP000018', 1, 'EncryptoTel', NULL, 'digital_encryptotel_20181018_050308.png', 'EncryptoTel is a softphone that helps make communication private.  Some features include: blockchain technology, PBX cloud, large coverage area, API, call mining, unlimited communication, encryption and privacy.', 'http://ico.encryptotel.com/', 576858, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://encryptotel.herokuapp.com/', 'https://twitter.com/encryptotel', 'https://www.facebook.com/encryptotel', '', '', NULL, NULL, '', '', '4.5', 3, 1, NULL, '2017-06-15 21:57:12', '2018-12-21 13:19:12', 1),
(19, 1, 'BOP000019', 2, 'Zrcoin', NULL, '20170615_221129.jpg', 'Zrcoin is a blockchain option.  It\'s a liquid trading asset and invests in the production of an industrial material.', 'https://zrcoin.io/', 7200141, '', '', '', 'total raised 5,169,612 usd  opening of the plant 3,500,000  second plant 7,000,000  total invested in Zrcoin 712,125', '2017-05-11', '2017-06-06', NULL, NULL, '', '', 'support@zrcoin.io', NULL, NULL, 'https://slack.zrcoin.io/', 'https://twitter.com/ZrCoin/media', 'https://www.facebook.com/zrcoin/', '', '', NULL, NULL, NULL, '', '0', 0, 0, NULL, '2017-06-15 22:11:42', '2018-10-19 02:01:52', 0),
(33, 1, 'BOP000033', 1, 'Ethereum', NULL, 'digital_ethereum_20181024_044555.png', 'Ethereum is an open-source, public, blockchain-based distributed computing platform and operating system featuring smart contract (scripting) functionality. Ether is a cryptocurrency whose blockchain is generated by the Ethereum platform. Ether can be transferred between accounts and used to compensate participant mining nodes for computations performed.\r\n\r\nCoin use - Used as a transaction fee (also called gas)', 'https://www.ethereum.org/', 10671685321, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/ethereumproject', 'https://www.facebook.com/ethereumproject', 'https://github.com/ethereum/', '', NULL, NULL, '', '', '0', 0, 1, NULL, '2017-06-17 04:24:17', '2018-12-20 11:07:26', 1),
(34, 1, 'BOP000034', 1, 'Ripple', NULL, 'digital_ripple_20181024_045056.png', 'Ripple is a real-time gross settlement system, currency exchange and remittance network created by Ripple Labs Inc. Ripple purports to enable \"secure, instantly and nearly free global financial transactions of any size with no chargebacks.\" Ripple is based around a shared public ledger, the XRP Ledger, which uses a consensus process that allows for payments, exchanges and remittance in a distributed process. XRP is a native cryptocurrency that can be used in Ripple network.', 'https://ripple.com/', 14616250461, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/Ripple', 'https://www.facebook.com/ripplepay', 'https://github.com/ripple', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-17 04:37:15', '2018-12-01 01:42:21', 1),
(35, 1, 'BOP000035', 1, 'Litecoin', NULL, 'digital_litecoin_20181024_100413.png', 'Litecoin is a peer-to-peer crypto currency that was developed on the base of Bitcoin and has an open source code. Unlike Bitcoin, the Litecoin blockchain is able to process a greater number of transactions. Litecoin differs primarily by having a decreased block generation time (2.5 minutes), increased maximum number of coins, different hashing algorithm (scrypt), instead of SHA-256), and a slightly modified GUI.', 'https://litecoin.com/', 3102293619, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', '', '', 'https://github.com/litecoin-project/litecoin', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-17 04:45:19', '2018-10-24 10:04:15', 1),
(36, 1, 'BOP000036', 1, 'Dash  ', NULL, 'digital_dash___20181024_202308.png', 'Dash is an open-source peer-to-peer cryptocurrency that aims to be the most user-friendly and most on-chain-scalable cryptocurrency in the world. It is also formerly known as Darkcoin and XCoin. On top of Bitcoin\'s feature set, it currently offers instant transactions (InstantSend), private transactions (PrivateSend) and operates a self-governing and self-funding model that enables the Dash network to pay individuals and businesses to perform work that adds value to the network.', 'https://www.dash.org/', 1404203533, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/dashpay', 'https://www.facebook.com/DashPay/', 'https://github.com/dashpay/dash', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-17 04:58:20', '2018-11-08 01:20:09', 1),
(37, 1, 'BOP000037', 1, 'Ethereum Classic', 'ethereum-classic', 'digital_ethereum_classic_20181026_102412.png', 'Ethereum Classic is an open-source, public, blockchain-based distributed computing platform featuring smart contract (scripting) functionality. It provides a decentralized Turing-complete virtual machine, the Ethereum Virtual Machine (EVM), which can execute scripts using an international network of public nodes. The Ethereum platform has been forked into two versions: \"Ethereum Classic\" (ETC) and \"Ethereum\" (ETH). Prior to the fork, the token had been called Ethereum. After the fork, the new tokens kept the name Ethereum (ETH), and the old tokens were renamed Ethereum Classic\" (ETC).\r\n\r\nCoin use - Classic ether (ETC) can be transferred between participants, stored in a cryptocurrency wallet and is used to compensate participant nodes for computations performed.', 'https://ethereumclassic.github.io/', 496512595, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://ethereumclassic.herokuapp.com/', 'https://twitter.com/eth_classic', '', 'https://github.com/ethereumproject', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-17 05:25:17', '2018-12-21 13:14:54', 1),
(38, 1, 'BOP000038', 1, 'Nem', NULL, 'digital_nem_20181024_202754.png', 'NEM is a peer-to-peer blockchain platform for app developers. Its native cryptocurrency is the XEM. Its code was created from scratch in Java by the New Economy Movement (NEM), which seeks to build \"a new economy based on the principles of financial freedom, decentralization, equality and solidarity\".\r\n\r\nXEM Use - When users broadcast transactions to the network, they pay a low transaction fee in XEM that goes towards supernodes. Supernodes are nodes that process payments on the network.', 'https://www.nem.io/', 846658745, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/NEMofficial', 'https://www.facebook.com/ourNEM/', 'https://github.com/NemProject', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-17 05:36:11', '2018-11-08 15:22:02', 1),
(39, 1, 'BOP000039', 1, 'Monero', NULL, 'digital_monero_20181024_100133.png', 'Monero (XMR) is an open-source cryptocurrency created in April 2014 that focuses on privacy, decentralization, and scalability that runs on Windows, MacOS, Linux, Android, and FreeBSD. Monero uses a public ledger to record transactions while new units are created through a process called mining. Monero aims to improve on existing cryptocurrency design by obscuring sender, recipient and amount of every transaction made as well as making the mining process more egalitarian.', 'https://getmonero.org/home', 2626934682, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://monero.slack.com/', '', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-17 05:46:03', '2018-10-24 10:01:33', 1),
(40, 1, 'BOP000040', 1, 'Golem', NULL, 'digital_golem_20181025_100444.png', 'The Golem platform is a marketplace for computing power. On the peer-to-peer network, unused computational resources can be rented out to users wishing to perform memory-intensive tasks, who pay the provider in GNT. The idea is that an individual possessing, say, a high-end gaming rig can profit from allowing another to use its GPU/CPU cycles for anything from CGI rendering to training neural nets. Resources that once would have sat idle can now be monetized on the decentralized network.\r\n', 'https://golem.network/', 391303159, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://golemproject.org:3000/', 'https://twitter.com/golemproject', '', 'https://github.com/golemfactory/golem', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-17 06:00:31', '2018-10-25 10:04:45', 1),
(41, 1, 'BOP000041', 1, 'Augur', NULL, 'digital_augur_20181025_100652.png', 'Augur is an open-source, decentralized, peer-to-peer prediction market platform built on Ethereum. People trading on Augur are rewarded if they bet on the right outcomes. The idea is to use markets in order to predict outcomes. The feature of Augur is tradable tokens called \"Reputation\" Augur (REP).\r\n', 'https://augur.net/', 433701400, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://invite.augur.net/', 'https://twitter.com/AugurProject', 'https://www.facebook.com/augurproject', 'https://github.com/AugurProject', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-17 07:00:41', '2018-10-25 10:06:52', 1),
(42, 1, 'BOP000042', 1, 'Stellar Lumens', 'stellar', 'digital_stellar_lumens_20181024_095547.png', 'Stellar Lumens is an open-sourced, distributed payments infrastructure, built on the premise that the international community needs “a worldwide financial network open to anyone.”  Stellar Lumens will fill this need, connecting individuals, institutions, and payment systems through its platform. Stellar Lumens is a cryptocurrency platform that focuses on remittance and cross-border payments. It\'s like Ripple but for the average joe and banks alike.', 'https://www.stellar.org/', 2342993215, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://slack.stellar.org/', 'https://twitter.com/stellarorg', 'https://www.facebook.com/stellarfoundation', 'https://github.com/stellar', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-17 07:11:58', '2018-12-21 13:22:28', 1),
(43, 1, 'BOP000043', 1, 'Steem', NULL, 'digital_steem_20181025_102417.png', 'Steem is a blockchain-based rewards platform for publishers to monetize content and grow communities. Steemit is a social network that runs on top of Steem. The approach of Steemit can be seen as an implementation of the popular social network Reddit on the blockchain.\r\n', 'https://steem.io/', 693702977, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://steem.slack.com/', 'https://twitter.com/steemchain', 'https://www.facebook.com/steemit', 'https://github.com/steemit', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-17 07:21:41', '2018-10-25 10:24:17', 1),
(44, 1, 'BOP000044', 1, 'Dogecoin', NULL, '20170617_072950.jpg', 'Dogecoin is a digital currency that can be sent all around the world in seconds.  With Dogecoin users can easily send cash to comments on any social medias, buy products and give to charity.  Transactions are kept confidential with no middleman involvement.  Dogecoin community has funded olympic athletes and helped people in need.  Go to Dogecoin.com to download the digital wallet.  Dogecoin even has its own community on reddit where users can earn some coins.', 'http://dogecoin.com/', 631356484, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/dogecoin?lang=en', '', 'https://github.com/dogecoin/dogecoin', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-06-17 07:30:01', '2018-10-11 09:09:44', 1),
(45, 1, 'BOP000045', 1, 'MaidSafeCoin', NULL, 'digital_maidsafecoin_20181012_020144.png', 'Maidsafe uses decentralization and encryption so only you can view your files not cloud or the government.  It allows users to run any app and will pay you for the contributions.  People can create an account anonymously. ', 'https://maidsafe.net/', 89699072, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://slack.safenetwork.org/', 'https://twitter.com/maidsafe', '', 'https://github.com/maidsafe', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-17 07:35:14', '2018-10-12 02:01:47', 1),
(46, 1, 'BOP000046', 1, 'Bitshares', NULL, 'digital_bitshares_20181025_102441.png', 'BitShares is an open-source, public, blockchain-based real-time financial platform. It provides a built-in decentralized asset exchange, similar to New York Stock Exchange but for cryptocurrencies and without the need to trust a central authority to handle all the funds, that can execute trading using an international network of computers in which anyone can take part. \r\n', 'https://bitshares.org/', 510209423, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://slack.bitshares.org/', 'https://twitter.com/_bitshares', 'https://www.facebook.com/officialbitshares', 'https://github.com/bitshares', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-20 01:38:13', '2018-10-25 10:24:41', 1),
(47, 1, 'BOP000047', 1, 'Stratis', NULL, 'digital_stratis_20181025_102516.png', 'Stratis is a Blockchain-as-a-Service (BaaS) platform, created with C# programming language for Microsoft’s .NET framework. It allows enterprises to build their own private blockchains, which can be integrated with the main Stratis blockchain. The Stratis API framework enables organizations to speed up their blockchain creation and simplify the development process involved with it.\r\n\r\nToken use - STRAT is used to handle transactions that take place on the Stratis blockchain.', 'https://stratisplatform.com/', 481116019, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-20 02:28:25', '2018-10-25 10:25:17', 1),
(48, 1, 'BOP000048', 1, 'Zcash', NULL, 'digital_zcash_20181025_102535.png', 'Zcash (ZEC) is a decentralized open-source cryptocurrency that ensures privacy and selective transparency of transactions. Zcash coin payments are published on the public blockchain, but the sender, receiver and transfer amount remain confidential.\r\n\r\nCoin use - Privacy focussed cryptocurrency.', 'https://z.cash/', 630793985, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/zcashco', '', 'https://github.com/zcash/zcash', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-20 02:37:55', '2018-10-25 10:25:35', 1),
(49, 1, 'BOP000049', 1, 'Gnosis', 'gnosis-gno', 'digital_gnosis_20181025_102554.png', 'Gnosis is a prediction market.  Some Gnosis apps include: the hunchgame ( a prediction market for celebrity gossip) and will be launched soon, price discovery in auctions, financial markets, insurance and governance where instead of asking legislature markets can be created to decide on information.  Gnosis is built on a Ethereum blockchain.', 'https://gnosis.pm/', 11903474, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://slack.gnosis.pm/', 'https://twitter.com/gnosisPM', 'https://www.facebook.com/Gnosis.pm/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-20 03:11:02', '2018-12-21 13:09:52', 1),
(50, 1, 'BOP000050', 1, 'Waves', NULL, 'digital_waves_20181024_205749.png', 'Waves Platform is a crypto currency analogue of the Kickstarter crowdfunding platform. The platform allows any user to issue a cryptographic token for less than a minute, and to raise funding through a crowdfunding campaign. Waves opened DEX, the first decentralized exchange in history, which allows users to trade any pair of tokens without conducting a transaction through an intermediate currency. It takes a few milliseconds to approve the transaction.\r\n', 'https://wavesplatform.com/', 188823641, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, 'https://discord.gg/cnFmDyA', 'http://wavesplatform.herokuapp.com/', 'https://twitter.com/wavesplatform', 'https://www.facebook.com/wavesplatform', 'https://github.com/WAVESPLATFORM/', 'https://t.me/Wavescommunity', NULL, NULL, 'https://coinmarketcap.com/currencies/waves/', '', NULL, NULL, 1, NULL, '2017-06-20 03:27:15', '2018-10-24 20:57:50', 1),
(51, 1, 'BOP000051', 1, 'Round', NULL, 'digital_round_20181018_081637.jpg', 'Round is an e-sports gaming platform that is decentralized.  The people involved in the game can compete against each other for money.  The audience can make bets on who will win the game.  Some of the money bets will be given to the winner.  All transactions are done on a blockchain.', 'http://roundcoin.org/#', 5673512, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', '', '', '', '', NULL, NULL, 'https://coinmarketcap.com/currencies/round/#charts', '', NULL, NULL, 1, NULL, '2017-06-20 03:33:28', '2018-10-18 08:16:37', 1),
(52, 1, 'BOP000052', 1, 'DigixDAO', NULL, 'digital_digixdao_20181018_081807.png', 'Digix is an asset token platform which is built on Ethereum.  Physical assets are applied to leverage the blockchain.  Some technologies Digix created are as follows: the proof of asset protocol, Digix gold coins and Digix DAO tokens.  The proof of asset protocol is showing all records being permanently published using Ethereum.  The Digix gold coins are very stable with not many value changes.  It\'s all secure and spendable.', 'https://digix.io/', 85550900, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'support@digix.io', NULL, '', '', 'https://twitter.com/digixglobal', '', 'https://github.com/digixglobal', '', NULL, NULL, '', '32 Carpenter Street,\r\nSingapore, (S)059911', NULL, NULL, 1, NULL, '2017-06-20 03:46:23', '2018-10-19 04:30:11', 1),
(53, 1, 'BOP000053', 1, 'GameCredits', NULL, '20170628_043856.png', 'GameCredits will give gaming companies a way to make easy and secure payments.  Some benefits for the gamers include: easy integration, more purchasing power, higher deposit limits, easy transfers, more deposit options, safe place to store money, purchase power and sending money anonymously.  Some benefits to gaming companies are as follows: high processing speeds, higher deposit limits,scalable, no chargebacks, fraud protection, cross promotion, blockchain protection and additional value.', 'https://gamecredits.com/', 11706396, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'http://gamecredits.com/slack.html', 'https://twitter.com/game_credits', 'https://www.facebook.com/gamecredits/', 'https://github.com/gamecredits-project', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-06-28 04:39:11', '2018-09-17 11:01:44', 1),
(54, 1, 'BOP000054', 1, 'SingularDTV', NULL, '20170628_050641.png', 'SingularDTV is a blockchain entertainment studio.  SingularDTV is changing the entertainment industry in many different ways from how projects are funded to sharing them.  SingularDTV rights management platform will change the accounting in the entertainment industry.  It will give back the creators control over their output.  Singular is partnered with Consensus systems, where they are programming a decentralized world on a blockchain. ', 'https://singulardtv.com/', 41166840, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'https://slack.singulardtv.com/', 'https://twitter.com/SingularDTV', 'https://www.facebook.com/singulardtv/', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-06-28 05:05:52', '2018-05-26 04:48:59', 1),
(55, 1, 'BOP000055', 1, 'Ardor', NULL, 'digital_ardor_20181019_042339.png', 'Ardor is a blockchain platform that allows individuals to use Nxt\'s blockchain technology through child chains.  All processing will be done on the Ardor main chains.  The child chains can use features in Nxt like trading, voting and interacting with other child chains.  The Ardor tokens will be kept in the Ardor main chain.  all transactions are fast, scalable and secure.', 'https://www.ardorplatform.org/', 249757866, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://nxtchat.herokuapp.com/', 'https://twitter.com/ArdorPlatform', 'https://www.facebook.com/ardorplatform', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-30 03:29:53', '2018-10-19 04:23:39', 1),
(56, 1, 'BOP000056', 1, 'Bytecoin', 'bytecoin-bcn', 'digital_bytecoin_20181025_102626.png', 'Bytecoin (BCN) is the first CryptoNote based cryptocurrency launched in July 2012. CryptoNote technology provides absolute anonymity to Bytecoin using Ring Signatures and one-time addresses. This type of anonymous transactions make it almost impossible to find out the sender/receiver address. \r\n\r\nCoin use - BCN can be used as privacy focussed cryptocurrency.', 'https://bytecoin.org/', 135569313, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/Bytecoin_dev', '', 'https://github.com/amjuarez/bytecoin', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-30 03:58:08', '2018-12-21 13:11:49', 1),
(57, 1, 'BOP000057', 1, 'Factom', NULL, '20170630_040712.png', 'Factom creates products that change the way organizations share data.  Some of the products include: Factom Harmony, it creates a record of all loan files and is permanent.  Factom Harmony reduces the cost of file reviews, audits and much more.  Factom Acolyte lets people build Oracles for smart contracts.  Dloc by smartrac lets any institution protect their important records with blockchain technology.', 'https://www.factom.com/', 39963111, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'http://factom-slack.herokuapp.com/', 'https://twitter.com/factom', 'https://facebook.com/factomproject', 'https://github.com/FactomProject', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-06-30 04:07:22', '2018-10-30 19:16:52', 1),
(58, 1, 'BOP000058', 1, 'Sia', 'siacoin', 'digital_sia_20181024_204853.jpg', 'Sia is a cooperative file storage network platform that leverages the Siacoin token, smart contracts, and blockchain technology to safely store data on hosts distributed throughout the world. It is written in the language Go and actively developed by Nebulous Inc.\r\n\r\nCoin use - Siacoin (SC) is the cryptocurrency used to buy and sell storage on the Siacoin platform.', 'http://sia.tech/', 108662221, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://slackin.sia.tech/', 'https://twitter.com/SiaTechHQ', 'https://www.facebook.com/nebulouslabs/', 'https://github.com/NebulousLabs/Sia', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-06-30 23:26:39', '2018-12-21 13:11:31', 1),
(59, 1, 'BOP000059', 1, 'Decred', NULL, 'digital_decred_20181024_204117.jpg', 'Decred is an open and progressive cryptocurrency with a system of community-based governance integrated into its blockchain.\r\nIt uses a hybrid proof-of-work and proof-of-ownership system to ensure that a small group cannot dominate the transaction flow or make changes to the Decred without community involvement.\r\n\r\nCoin use - Decreed (DCR) can be used as a cryptocurrency and holders can also earn PoS reward in DCR.', 'https://www.decred.org/', 175188782, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://slack.decred.org/', 'https://twitter.com/decredproject', '', 'https://github.com/decred', '', NULL, NULL, '', '', '5', 1, 1, NULL, '2017-06-30 23:32:10', '2018-12-20 23:56:35', 1),
(61, 1, 'BOP000061', 1, 'BitConnect', NULL, 'digital_bitconnect_20181004_013639.jpg', 'BitConnect coin is a p2p network with a dectralized cryptocurrency meaning no government/third party involvement.  Users can earn interest on investments.  With BitConnect coin there are: fast transactions, decentralized environment, blockchain security and is valuable.\r\n', 'https://bitconnectcoin.co/', 6706355, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/bitconnect', 'https://www.facebook.com/bitconnect.co/', 'https://github.com/bitconnectcoin', '', NULL, NULL, 'https://coinmarketcap.com/currencies/bitconnect/', '', '0', 0, 0, NULL, '2017-06-30 23:44:21', '2018-10-06 00:13:00', 1),
(62, 1, 'BOP000062', 1, 'Lisk', NULL, 'digital_lisk_20181024_204521.jpg', 'Lisk (LSK) is a blockchain application platform, established in early 2016 by Max Kordek and Oliver Beddows. Based on its own Blockchain network and token LSK, Lisk will enable developers to create, distribute and manage decentralized Blockchain applications by deploying their own sidechain linked to the Lisk network, including a custom token. Thanks to the flexibility of sidechains, developers can implement and customize their Blockchain applications entirely.', 'https://lisk.io/', 940538967, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/LiskHQ', 'https://www.facebook.com/Lisk-1118720888180640/', 'https://github.com/LiskHQ', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-07 00:19:53', '2018-10-24 20:45:21', 1),
(63, 1, 'BOP000063', 1, 'NXT', NULL, 'digital_nxt_20181018_081935.png', 'NXT is a blockchain platform that improves and builds the basic functions of cryptocurrencies.  NXT has its own cryptocurrency and module toolset that lets users create their own applications.  Some overall features include: monetary system, asset exchange, voting system, account control, data cloud, plug ins, authentication system and alias system.\r\n', 'https://nxt.org/', 133512346, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://nxtchat.herokuapp.com/', 'https://twitter.com/nxtcommunity', 'https://www.facebook.com/NxtBlockchain', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-07 00:23:46', '2018-10-18 08:19:35', 1),
(64, 1, 'BOP000064', 1, 'PIVX', NULL, '20170707_002844.png', 'PIVX ( private instant verified transaction) is a decentralized private cryptocurrency.  Some features include: obfusication ( provides an extra layer of privacy in each transaction) swiftTX (fast transactions)and 3.0 bitcoin codebase.\r\n', 'https://pivx.org/', 213222593, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/_pivx', 'https://www.facebook.com/PIVxCrypto/', 'https://github.com/PIVX-Project/PIVX/releases', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-07 00:29:02', '2018-05-26 04:50:13', 1),
(65, 1, 'BOP000065', 1, 'Tether', NULL, 'digital_tether_20181024_095905.png', 'Tether (USDT) is a cryptocurrency with reference to fiat currencies that is issued by Tether Limited Company. Using the technology of blockchain, Tether coin allows the users to keep, send and receive digital tokens pegged to dollars, euros and yens. Tether currencies are 100% supported by the actual currency actives on a reserve account of the Tether platform. The crypto currency can be bought or exchanged for fiat currencies in accordance with the service terms of Tether Limited.', 'https://tether.to/', 2513183023, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/Tether_to/', 'https://www.facebook.com/tether.to', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-07 00:32:30', '2018-10-24 09:59:05', 1),
(66, 1, 'BOP000066', 1, 'PeerCoin', NULL, 'digital_peercoin_20181018_092632.png', 'PeerCoin is a cryptocurrency that rewards users by giving them 1% annual PeerCoin (PPC) return.  PeerCoin uses proof of stake where users secure network and verify transactions by all their PeerCoins.  PeerCoin has a smaller blockchain so wallets can sync at faster rates.\r\n', 'https://peercoin.net/', 56344078, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://peercoin.chat/home', 'https://twitter.com/PeercoinPPC', 'https://www.facebook.com/Peercoin', 'https://github.com/peercoin', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-07 00:37:40', '2018-10-18 09:26:32', 1),
(67, 1, 'BOP000067', 1, 'DigiByte', NULL, 'digital_digibyte_20181024_205425.png', 'The DigiByte coin was developed in 2013 and released in January 2014. Although based on Bitcoin, adjustments in the code allow for improved functionality, including 15-second block time and improved security.\r\n\r\nCoin use - Can be used as a cryptocurrency as well as for transaction fee on DiguSign smart contract platform running on the DigiByte blockchain', 'http://www.digibyte.co/', 261477228, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/DigiByteCoin', 'https://www.facebook.com/digibytecoin/', 'https://github.com/digibyte/digibyte', '', NULL, NULL, 'https://coinmarketcap.com/currencies/digibyte/', '', NULL, NULL, 1, NULL, '2017-07-07 00:43:42', '2018-10-24 20:54:25', 1),
(68, 1, 'BOP000068', 1, 'FirstBlood', NULL, 'digital_firstblood_20181019_044040.png', 'FirstBlood is an esports platform that lets people win rewards while playing against each other.  Users have full control over their funds.  People just need to: select the game of their choice and stakes, find someone to play against and win rewards.\r\n', 'https://firstblood.io/#', 21596473, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://slack.firstblood.io/', 'https://twitter.com/firstbloodio', 'https://facebook.com/firstbloodio', 'https://github.com/firstbloodio', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-07 00:51:57', '2018-10-19 04:40:40', 1),
(69, 1, 'BOP000069', 1, 'Aragon', NULL, 'digital_aragon_20181018_090327.png', 'Using the blockchain, Aragon lets users manage organizations with no borders or permissions.  The Aragon companies are run by the blockchain platform, Ethereum.  The Aragon network acts as a digital jurisdiction making it user friendly.  The token being used is referred to as ANT.  Aragon also has the first vesting calendar built on blockchain.\r\n', 'https://aragon.one/', 89583975, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://aragon.chat/', 'https://twitter.com/AragonProject', '', 'https://github.com/aragon', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-07 00:58:58', '2018-10-18 09:03:28', 1),
(70, 1, 'BOP000070', 1, 'Byteball', NULL, 'digital_byteball_20181018_085639.png', 'Byteball is a digital currency where users set a condition to the person receiving the money.  If that condition hasn\'t been met then the money will be returned to the owner.  Some features include: paying and chatting, prediction markets, p2p insurance, p2p betting, chatbots, untraceable currency, get help with other users, multi signature and on chain oracles.\r\n', 'https://byteball.org/', 115040401, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://slack.byteball.org/', 'https://twitter.com/ByteballOrg', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-07 01:05:55', '2018-10-18 08:56:39', 1),
(71, 1, 'BOP000071', 1, 'Komodo', NULL, 'digital_komodo_20181024_210252.png', 'Komodo(KMD) is a cryptocurrency project that focuses on providing anonymity through zero-knowledge proofs and security through a novel Delayed Proof of Work (dPoW) protocol. The Komodo Platform was forked from Zcash by the SuperNET team. The SuperNET team has also developed a hand full of individual tools that will stand together with Komodo to form a complete ecosystem with advanced functionalities like decentralized trading and mixing.\r\n\r\nToken use - KMD is a privacy focussed cryptocurrency', 'https://komodoplatform.com/', 268421440, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/KomodoPlatform', 'https://www.facebook.com/Komodo-Platform-321638648182713/', 'https://github.com/jl777/komodo', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-07 01:15:32', '2018-10-24 21:02:52', 1),
(72, 1, 'BOP000072', 1, 'Syscoin', NULL, '20170707_012023.png', 'Syscoin is a cryptocurrency that has low cost transactions and gives businesses infrastructure to trade assets, goods, data and digital certificates securely.  The blockchain is in charge of all Syscoin services.  Syscoin\'s value comes from the decentralized services on the blockchain.  With Syscoin users can: buy and resell others products (similar to Amazon except no middleman), send and receive money easily and digital certificates.', 'http://syscoin.org/', 195398618, 'While the goods are in transit, buyers can form a mutual agreement to secure funds.', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'http://join.syscoin.org/', 'http://twitter.com/syscoin', 'http://facebook.com/syscoin', 'https://github.com/syscoin', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-07 01:20:46', '2018-05-26 04:51:27', 1),
(73, 1, 'BOP000073', 1, 'Emercoin', NULL, '20170707_014851.png', 'Emercoin is a blockchain platform and digital currency.  Includes: secure shell management system, uncensored domain name system,passwordless authentication, storage for electronic business cards and digital proof of onwership.\r\n\r\n', 'https://emercoin.com/', 108326447, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'https://emercoin-slack-invite.herokuapp.com/', 'https://twitter.com/emercoin', '', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-07 01:49:05', '2018-05-26 04:51:28', 1),
(74, 1, 'BOP000074', 1, 'ATB Coin', 'atbcoin', 'digital_atb_coin_20181012_015558.png', 'ATB Coin is an investment platform organizing financial assets.  ATB Coin uses a reliable and secure payment system.  ATB offline codes where users can purchase virtual goods online.  ATB segregated witness, ATB lightning network, cloud mining and smart contracts.\r\n', 'https://atbcoin.com/', 123456789, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'support@atbcoin.com', NULL, '', 'https://join.slack.com/atbcoin/shared_invite/MTk5NDY5NDUxMjUyLTE0OTc3MzM2MTQtMDQxZWIyY2Q1MA', 'https://twitter.com/atbcoincom', 'https://facebook.com/atbcoincom', '', 'https://t.me/atbcoinchat', NULL, NULL, 'https://coinmarketcap.com/currencies/atbcoin/', '40 Wall Street, 28th floor New York , NY 10005', NULL, NULL, 1, NULL, '2017-07-08 20:06:23', '2018-10-12 01:55:58', 1),
(191, 1, 'BOP000191', 1, 'Dharani Tech', NULL, '', 'descc', '', 123654478, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'dharani@gmail.com', NULL, NULL, '', '', '', '', '', NULL, NULL, '', '', '0', 0, 2, NULL, '2017-08-08 12:22:23', '2017-08-08 12:23:36', 0),
(75, 1, 'BOP000075', 1, 'Bitquence', NULL, '20170708_201050.jpg', 'Bitquence is a people powered universal cryptocurrency service.  Bitquence combines a universal crypto wallet with a secure layer that works with many different currencies.  Users can carry all of their funds with Bitquence wherever they go.  All funds are stored in the Bitquence code vault.\r\n', 'https://www.bitquence.com/tokensale/', 174039631, 'Funds are held in TokenMarket escrow.  Multi signature wallet.  Management team tokens non-transferable locked for three months in smart contract.\r\n', '', '', '', '2017-06-28', '2017-07-13', NULL, NULL, '', '', '', NULL, NULL, 'https://join.slack.com/bitquence/shared_invite/MTk1NzYxMDkzMjAyLTE0OTcwNzI4ODUtNjhlYzRlY2Q2MQ', 'https://twitter.com/bitquence', 'https://web.facebook.com/bitquence/', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-08 20:10:56', '2018-05-26 04:51:28', 1),
(76, 1, 'BOP000076', 1, 'Orocrypt', NULL, 'digital_orocrypt_20181025_102659.png', 'Orocrypt is an asset digitized company aiming for more secured alternative to precious metals ownership.  Tokens are secured on the Ethereum platform.  Orocrypt will first launch gold backed tokens that represent 30g of LBMA.  In the future Orocrypt is planning to have gold, silver and platinum tokens.\r\n', 'https://orocrypt.com/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', 'https://orocrypt.slack.com/shared_invite/MTg2MjIzOTY1MTcxLTE0OTU0NTI5MDAtYTIzYTM0ZTVmYg', 'https://twitter.com/orocrypt', 'https://www.facebook.com/orocrypt', '', 'https://t.me/joinchat/AAAAAAhCWkGn4hcOoQ_LYQ', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-08 20:16:41', '2018-10-25 10:26:59', 1),
(77, 1, 'BOP000077', 1, 'Encrypgen', NULL, '20170708_202750.png', 'Encyrypgen provides software for genomic data empowering donors, patients, facilitating health, business and science in a safe environment.  Products offered: Gene chain link (users can plug and play gene chain onto existing infrastructure) Gene chain lab (labs that want to enhance storage and computing systems)  Gene chain commerce  (largest gene chain plan available)\r\n', 'https://www.encrypgen.com/', 2808729, '', '', '', '', '2017-06-29', '2017-07-17', NULL, NULL, '', '', '', NULL, NULL, 'http://bit.ly/2ryBhq3', 'https://twitter.com/encrypgen', 'https://www.facebook.com/Encrypgen', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-08 20:28:09', '2018-10-19 14:34:00', 1),
(195, 1, 'BOP000195', 1, 'Infinite coin', 'infinitecoin', 'digital_infinitecoin_20181025_102727.png', 'Infinitecoin is a P2P payment system.  It has low fees and instant transactions.\r\n', 'http://www.infinitecoin.com/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'email@admin.com', NULL, '', '', 'https://twitter.com/Infinitecoin_US', 'https://www.facebook.com/IFCInfinitecoin', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-08-30 03:31:00', '2018-12-21 13:12:40', 1),
(78, 1, 'BOP000078', 1, 'FinShi Capital', NULL, '20170708_203307.jpg', 'FinShi Capital is the first venture fund formed on blockchain technology.  FinShi capital is reviewing more than 30 growing fintech projects.  Then those startups will eventually be sold to other investors.  The funds will be known and investors will get their cash back while the world views new ICOS.  FinShi Capital can provide 120% per annum income.  Anyone with a dollar can invest.\r\n', 'http://finshi.capital/', 0, '', '', '', '', '2017-07-05', '2017-07-18', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/FinshiCapital', 'https://www.facebook.com/finshi.capital', 'https://github.com/finshi', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-08 20:33:17', '2017-07-08 20:33:17', 1),
(79, 1, 'BOP000079', 1, 'True Flip', 'trueflip', 'digital_true_flip_20181025_102802.png', 'True Flip is an international anonymous blockchain lottery.  True Flip has an open source code, one moment payouts and a transparent prize fund.  Users can: guess between numbers, fill out lottery tickets, pay for participation with any coin method, wait for the next lottery, each takes place between everyday 8pm GMT.  True Flip offers: instant payouts, 0 hold, 60-65% of individuals contribution is allocated to prize fund, multi currency, international and traansparent.  \r\n', 'https://trueflip.io/', 2794382, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'support@trueflip.io', NULL, '', 'https://trueflip.io/slack', 'https://twitter.com/TrueFlipLoto', 'https://www.facebook.com/TrueFlip.io/', 'https://github.com/TrueFlip', 'https://t.me/truefliplotto', NULL, NULL, 'https://coinmarketcap.com/currencies/trueflip/', '', NULL, NULL, 1, NULL, '2017-07-09 09:58:13', '2018-10-25 10:28:02', 1),
(83, 1, 'BOP000083', 1, 'Iota', NULL, 'digital_iota_20181025_102823.png', 'IOTA is an open-source distributed ledger (cryptocurrency) focused on providing secure communications and payments between machines on the Internet of Things. Using directed acyclic graph (DAG) technology instead of the traditional blockchain, IOTA\'s transactions are free regardless of the size of the transaction, confirmations times are fast, the number of transactions the system can handle simultaneously is unlimited, and the system can easily scale.', 'https://iota.org/', 1369239748, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://slack.iota.org/', 'https://twitter.com/iotatoken?lang=en', '', 'https://github.com/iotaledger', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 20:46:37', '2018-10-25 10:28:23', 1),
(84, 1, 'BOP000084', 1, 'NEO (Gas)', 'neo', 'digital_neo__gas__20181024_202429.png', 'NEO (formerly known as Antshares) is a smart economy platform and the first Chinese blockchain project. The project was founded in 2014 and was real-time open source on GitHub in June 2015. NEO coin and the platform aims to develop a \"smart economy\" with a distributed network by utilizing blockchain technology and digital identity to digitize assets, and automating the management of digital assets using smart contracts.', 'https://neo.org/', 457536236, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'contact@neo.org', NULL, 'https://discord.io/neo', '', 'https://twitter.com/neo_blockchain', 'https://www.facebook.com/NEOSmartEcon/', 'https://github.com/neo-project', '', NULL, NULL, 'https://coinmarketcap.com/currencies/gas/', '', '0', 0, 1, NULL, '2017-07-17 20:50:27', '2018-12-21 13:12:12', 1),
(85, 1, 'BOP000085', 1, 'Veritaseum', NULL, 'digital_veritaseum_20181018_085134.png', 'Veritaseum is a P2P software without using banks, traditional exhanges and brokerages.\r\n', 'http://veritas.veritaseum.com/', 153758177, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/ReggieMiddleton', 'https://www.facebook.com/reggiemiddletonfintech/?fref=ts', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 20:53:58', '2018-10-18 08:51:35', 1),
(86, 1, 'BOP000086', 1, 'MCAP', NULL, 'digital_mcap_20181025_102913.png', 'Using MCAP individuals can make money from all cryptocoins at once.  This algorithm analyzes the altcoins lets one know which one would be profitable at each time.  MCAP token is part of the P2P transactions.\r\n', 'https://bitcoingrowthfund.com/mcap', 77437, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'support@bitcoingrowthfund.com', NULL, '', '', 'https://twitter.com/growth_fund', 'https://www.facebook.com/Bitcoin-Growth-Fund-556914781171379/', '', '', NULL, NULL, 'https://coinmarketcap.com/currencies/mcap/', '', NULL, NULL, 1, NULL, '2017-07-17 20:56:02', '2018-10-25 10:29:48', 1),
(87, 1, 'BOP000087', 1, 'Basic Attention Token', 'basic-attention-token', 'digital_basic_attention_token_20181024_205255.png', 'Basic Attention Token (BAT) is a blockchain-based advertising system, that aims to change how ads are served. It is built on top of the Ethereum blockchain and uses a browser called Brave. Brave is an open-source, privacy-centred browser designed to block trackers and malware. Basic Attention Token improves the efficiency of digital advertising by creating a new unit of exchange between publishers, advertisers and users.\r\n', 'https://basicattentiontoken.org/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://slack.basicattentiontoken.org/', 'https://twitter.com/@attentiontoken', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 20:59:49', '2018-10-24 20:52:55', 1),
(88, 1, 'BOP000088', 1, 'Status', NULL, 'digital_status_20181018_085334.png', 'Status is a messenger, brower and gateway to the decentralized world.  Users can send, receive and store ether, buy and sell ether locally and browse decentralized apps.\r\n', 'http://status.im/', 127034135, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', 'http://slack.status.im/', 'https://twitter.com/ethstatus', 'https://www.facebook.com/ethstatus', 'https://github.com/status-im', '', NULL, NULL, 'https://coinmarketcap.com/currencies/status/', '', NULL, NULL, 1, NULL, '2017-07-17 21:03:15', '2018-10-18 08:53:34', 1),
(89, 1, 'BOP000089', 1, 'Bancor', NULL, '20170717_211154.jpg', 'Bancors gives a liquidity mechanism and built in price discovery for tokens on smart contracts blockchains.  Bancor is: continuous liquidity, backward compatible, no counterparty risk, lower volatility, predictable price slippage and no spreading.\r\n', 'https://www.bancor.network/', 197099259, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'https://bancor-slack-invite.herokuapp.com/', 'https://twitter.com/bancornetwork', '', 'https://github.com/bancorprotocol/contracts', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 21:12:02', '2018-05-26 04:52:43', 1),
(90, 1, 'BOP000090', 1, 'TenX', NULL, 'digital_tenx_20181019_042730.png', 'TenX helps to make cryptocurrencies spendable at any given time.  TenX connects blockchain to the real world for everyday use.  TenX will have an IOS and WebApp wallet at the end of July 2017.  The TenX token holder receives 0.5% reward for every transaction.  \r\n', 'https://www.tenx.tech/', 105937996, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://ten-x.herokuapp.com/', 'https://twitter.com/tenxwallet', 'https://www.facebook.com/tenxwallet/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 21:17:26', '2018-10-19 04:27:31', 1);
INSERT INTO `bop_compaines` (`cm_id`, `cm_uid`, `cm_unique_id`, `cm_ctid`, `cm_name`, `cm_apiname`, `cm_picture`, `cm_decript`, `cm_siteurl`, `cm_marketcap`, `cm_escrow`, `cm_total_token_supply`, `cm_tokens_available_crowd_sale`, `cm_inflation`, `cm_ico_start_date`, `cm_ico_end_date`, `cm_ico_start_time`, `cm_ico_end_time`, `cm_ico_conditions`, `cm_mobile`, `cm_email`, `cm_resources`, `cm_discord`, `cm_slack`, `cm_twitter`, `cm_facebook`, `cm_github`, `cm_telegram`, `cm_google_plus`, `cm_linkedin`, `cm_coinmarket_cap`, `cm_address`, `cm_overallrating`, `cm_totalviews`, `cm_status`, `cm_approval`, `cm_caretedat`, `cm_modifiedat`, `cm_cron_checker`) VALUES
(91, 1, 'BOP000091', 1, 'Metal', NULL, '20170717_212127.jpg', 'With Metal users can transfer money anywhere and earn rewards when a purchase is made.  The Metal digital wallet is: gamified (earn rewards), connected for sending payments, powerful by being in control of your coins, instant, secure and legendary with help support.\r\n', 'https://www.metalpay.com/', 70519733, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'http://metalpay.chat/', 'https://twitter.com/metalpaysme', 'https://www.facebook.com/metalpaysme/', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 21:21:35', '2018-05-26 04:53:56', 1),
(92, 1, 'BOP000092', 1, 'FunFair', NULL, 'digital_funfair_20181018_091059.jpg', 'FunFair is the world\'s fastest casino platform on an Ethereum base.  Users can: create their own blockchain casino, earn rewards and play games.\r\n', 'https://funfair.io/', 80286089, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, 'https://discordapp.com/invite/rwETqSP', 'https://funfair-slackin.herokuapp.com/', 'https://twitter.com/FunFairTech', 'https://www.facebook.com/groups/148397155706069/', '', 'https://t.me/joinchat/HtUKhUpG0FCu_X25mnU2Bg', NULL, NULL, 'https://coinmarketcap.com/currencies/funfair/', 'Grand Union House 20 Kentish Town Road, London, United Kingdom, NW1 9NX', NULL, NULL, 1, NULL, '2017-07-17 21:27:09', '2018-10-18 09:10:59', 1),
(93, 1, 'BOP000093', 1, 'BitcoinDark', NULL, '20170717_212913.png', 'BitcoinDark is a cryptocurrency platform.  BitcoinDark offers: an instant decentralized exchange, pegged asset exchange (allowing users to buy and sell pegged assets.\r\n', 'http://bitcoindark.com/', 90141990, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'http://slackinvite.supernet.org/', 'https://twitter.com/BitcoinDark', 'https://www.facebook.com/BitcoinDark', 'https://github.com/jl777/btcd', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 21:29:24', '2018-05-26 04:53:56', 1),
(94, 1, 'BOP000094', 1, 'LEOcoin', NULL, '20170717_213149.png', 'LEOcoin is digital cash that is private, seucre and user friendly.  LEOcoin lets users communicate privately with other LEOcoin wallets.  LEOcoin wallets can also send LEOcoin to other LEOwallets anywhere.\r\n', 'http://www.leocoin.org/', 18323545, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/LEOcoinORG', 'https://www.facebook.com/LEOcoin.org', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 21:32:01', '2018-05-26 04:53:56', 1),
(95, 1, 'BOP000095', 1, 'Nexus', NULL, 'digital_nexus_20181018_085857.png', 'Nexus is a network for the decentralized world.  Nexus wants to empower everyone from all backgrounds in every country.  Nexus is: P2P network,consensus with voting, reputable, secure, scalable and has partnerships.\r\n', 'http://www.nexusearth.com/', 114251030, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://nexusearth.com:3000/', 'https://twitter.com/Nxsearth', 'https://www.facebook.com/nxsearth', 'https://github.com/Nexusoft/Nexus', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 21:34:47', '2018-10-18 08:58:57', 1),
(96, 1, 'BOP000096', 1, 'Edgeless', NULL, '20170717_213726.png', 'Edgeless is a decentralized casino run on Ethereum smart contract.\r\n', 'https://edgeless.io/', 44985052, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/edgelessproject', 'https://www.facebook.com/EdgelessCasino/?fref=ts', 'https://github.com/EdgelessCasino', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 21:37:37', '2018-05-26 04:53:57', 1),
(97, 1, 'BOP000097', 1, 'Lykke', NULL, '20170717_214015.png', 'With Lykke users can trade Bitcoin, Ethereum, FX and digital assets.  Lykkewallet makes it easy for users to trade digital currencies on the new generation platform with 0% commission.\r\n', 'https://www.lykke.com/', 18274163, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'http://lykkecommunity.herokuapp.com/', 'https://twitter.com/LykkeCity', 'https://www.facebook.com/LykkeCity', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 21:40:23', '2018-05-26 04:53:57', 1),
(98, 1, 'BOP000098', 1, 'Qtum', NULL, 'digital_qtum_20181025_103102.png', 'Qtum (read Quantum) is a Chinese hybrid platform that connects the existing blockchain with a virtual machine, such as Ethereum. In the Qtum blockchain, there is an internal token – Qtum coin. It is a platform that enables developers to build applications and smart contracts on the current blockchain technology. It is an open-source, decentralized project that aims to capitalize on the success of Bitcoin, while competing for the Decentralized Application (DAPP) and Smart Contract market.', 'http://qtum.org/en/', 1166830436, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://qtumslack.herokuapp.com/', 'https://twitter.com/QtumOfficial', 'https://www.facebook.com/QtumOfficial/', 'https://github.com/qtumproject', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 21:43:34', '2018-10-25 10:31:02', 1),
(99, 1, 'BOP000099', 1, 'Decent', NULL, 'digital_decent_20181018_095155.png', 'Decent is and stands for: a decentralized network, encrypted and secure, content distribution system, elimination of third parties, new way of online publishing, timestamped data records.\r\n', 'https://decent.ch/', 29363347, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://decent-slack.herokuapp.com/', 'https://twitter.com/DECENTplatform', 'https://www.facebook.com/DECENTplatform/?ref=hl', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 21:47:57', '2018-10-18 09:51:55', 1),
(100, 1, 'BOP000100', 1, 'Ark', NULL, 'digital_ark_20181018_083058.png', 'Ark provides individuals with blockchain technologies.  Ark is fast, decentralized, bridging and sustainable.  Ark is an ecosystem of linked chains that makes using it flexible and secure.\r\n', 'https://ark.io/', 245828887, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://ark.io/join-ark-slack', 'https://www.twitter.com/arkecosystem', 'https://www.facebook.com/arkecosystem', 'https://www.github.com/ArkEcosystem', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 21:52:12', '2018-10-18 08:30:58', 1),
(101, 1, 'BOP000101', 1, 'DaxxCoin', NULL, 'digital_daxxcoin_20181019_033932.jpg', 'Daxxcoin is a digital secure payment system.  Some services provided are: network help/development all day and advanced support with a wallet.\r\n', 'https://daxxcoin.org/', 308260, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', '', 'https://www.facebook.com/DaxxCoinOfficial/?fref=ts', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 21:55:07', '2018-10-19 03:39:32', 1),
(102, 1, 'BOP000102', 1, 'Numeraire', NULL, '20170717_215851.png', 'Numeraire is a hedge fund built by data scientists.\r\n', 'https://numer.ai/', 13251455, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'https://slack.numer.ai/', 'https://twitter.com/numerai', '', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 21:59:07', '2018-05-26 04:55:10', 1),
(103, 1, 'BOP000103', 1, 'Ubiq', NULL, '20170717_220253.png', 'Ubiq is a decentralized platform allowing users to create smart contracts on decentralized apps.  Ubiq blockchain acts as a supercomputer and global ledger.\r\n', 'https://ubiqsmart.com/', 63952256, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'http://slack.ubiqsmart.com/', 'https://twitter.com/ubiqsmart', '', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 22:03:05', '2018-05-26 04:55:11', 1),
(104, 1, 'BOP000104', 1, 'Verge', NULL, 'digital_verge_20181024_205639.jpg', 'Verge (XVG) Coin is a privacy focused cryptocurrency token that utilizes the TOR network to anonymize IP addresses on its public leager. Verge uses multiple anonymity-centric networks such as TOR and I2P. The IP addresses of the users are fully obfuscated and transactions are completely untraceable.\r\n\r\nCoin use - Privacy focussed cryptocurrency.', 'https://vergecurrency.com/', 612448480, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://verge.typeform.com/to/RxDLtL', 'http://www.twitter.com/vergecurrency', 'https://www.facebook.com/VERGEcurrency/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 22:05:23', '2018-10-24 20:56:39', 1),
(105, 1, 'BOP000105', 1, 'Soarcoin', NULL, 'digital_soarcoin_20181018_094632.png', 'Soarcoin is a digital money system that is Ethereum based, has no or low mining fees, bounty program and has limited asset of 5,000,000,000 coins.  Soarcoin is private and secure and can be used anywhere.\r\n', 'http://soarlabs.org/', 32192474, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 22:09:03', '2018-10-18 09:46:33', 1),
(106, 1, 'BOP000106', 1, 'ReddCoin', NULL, '20170717_221206.png', 'ReddCoin is a decentralized digital currency.  ReddCoin makes the digital currency easy for everyone by integrating a digital currency platform with popular social networks.  Some features include: proof of stake velocity, tip platform to send and receive money on social networks, redd-Id that allows users to associate a username with the information and reddwallet.\r\n', 'https://www.reddcoin.com/', 191783925, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/reddcoin', 'https://www.facebook.com/reddcoin', 'https://github.com/reddcoin-project', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 22:12:14', '2018-05-26 04:55:11', 1),
(107, 1, 'BOP000107', 1, 'Namecoin', NULL, '20170717_221400.jpg', 'Namecoin is an experimental open source technology that is against censorship.  This technology helps improve the following: security, censorship, privacy, decentralization and identities.  Namecoin can be used for the following: protecting free speech rights online, attach identity information to something of your choice and much more.\r\n', 'https://www.namecoin.org/', 25865771, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/Namecoin', 'https://www.facebook.com/Namecoin.bit', 'https://github.com/namecoin', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 22:14:09', '2018-05-26 04:55:11', 1),
(108, 1, 'BOP000108', 1, 'Asch', NULL, 'digital_asch_20181018_090721.png', 'Asch makes it easy to create decentralized application.  Asch is an open platform providing a series of APIs that can be used in all types of applications.  This also makes the Dapp more characteristic.  Asch is a low cost one stop solution.\r\n', 'https://www.asch.so/', 88696713, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://asch-platform.slack.com/', 'https://twitter.com/Asch_Global', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 22:15:49', '2018-10-18 09:07:21', 1),
(109, 1, 'BOP000109', 1, 'Etheroll', NULL, 'digital_etheroll_20181019_034023.png', 'Etheroll is an Ethereum based dice game.  Nobody has to sign up, no deposits and a 1% house edge.  Users place bets and roll the dice.\r\n', 'https://etheroll.com/', 9329662, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://etheroll-invite.herokuapp.com/', 'https://twitter.com/etheroll?lang=en', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 22:17:20', '2018-10-19 03:40:23', 1),
(110, 1, 'BOP000110', 1, 'iExec RLC', 'rlc', 'digital_iexec_rlc_20181019_033722.png', 'iExec RLC is a blockchain based distributed cloud computing platform.  iExec RLC provides distributed applications scalable, secure and easy access to services.  This relies on Ethereum smart contracts.  In all iXec RLC is: technology for innovation, can be for everyone, mature technology based on XtremWebHEP ( a software for distributed and parallel computing) and affordable.\r\n', 'http://iex.ec/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/iEx_ec', 'https://www.facebook.com/Iex-ec-1164124083643301/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 22:22:47', '2018-10-19 03:37:22', 1),
(111, 1, 'BOP000111', 1, 'Melon', NULL, 'digital_melon_20181018_095654.png', 'Melon is a blockchain software for asset management on the Ethereum platform.  Melon lets users manage, set up and invest in digital asset management strategies.  Melon is the following: open source and transparent, lower costs, inclusive and reliable.\r\n', 'https://melonport.com/', 26987985, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://chat.melonport.com/', 'https://twitter.com/melonport', '', 'https://www.github.com/melonproject', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 22:26:24', '2018-10-18 09:56:55', 1),
(112, 1, 'BOP000112', 1, 'MonaCoin', NULL, 'digital_monacoin_20181018_084144.png', 'MonaCoin is a decentralized japanese cryptocurrency.  There are a total of 105,120,000\r\n', 'http://monacoin.org/', 196476572, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 22:29:04', '2018-10-18 08:41:44', 1),
(113, 1, 'BOP000113', 1, 'Wings', NULL, 'digital_wings_20181018_093717.jpg', 'Wings is a decentralized autonomous organization price discovery and promotion pre beta.\r\n', 'https://www.wings.ai/#!/home/discover', 34045209, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://hi.wings.ai/', 'https://twitter.com/wingsplatform', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 22:50:25', '2018-10-18 09:37:17', 1),
(114, 1, 'BOP000114', 1, 'ChainCoin', NULL, 'digital_chaincoin_20181019_034143.png', 'ChainCoin is a currency that is not centralized.  ChainCoin is: personal banking, decentralized governance, 11 hashing algos chained, financial independence, no pre-mining and coin mixing.\r\n', 'http://www.chaincoin.org/', 1590593, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://chaincoin-slack.herokuapp.com/', 'https://twitter.com/chain_coin', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 22:53:05', '2018-10-19 03:41:43', 1),
(115, 1, 'BOP000115', 1, 'Xaurum', NULL, 'digital_xaurum_20181019_034231.png', 'Xaurum is a unit of value on the golden blockchain.  It represents gold and can be exchanged by melting.  This blockchain is a transparent ledger of accounts that is responsible for the distribution of gold owned by the Xaurum Commonwealth.  Xaurum can be mined and profitable.  Some features include: a growing goldbase, global delivery, profitable, shared fees, Ethereum blockchain and a digital commonwealth.\r\n', 'http://www.xaurum.org/', 6129209, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://www.twitter.com/urumproject', 'https://www.facebook.com/xaurumofficial/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 22:55:33', '2018-10-19 03:42:31', 1),
(116, 1, 'BOP000116', 1, 'Gulden', NULL, '20170717_225716.png', 'Users can send money to each other, link it to an IBAN account and pay at Bitcoin merchants using Gulden.  Gulden increases capital by every new user.\r\n', 'https://gulden.com/', 35066118, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/gulden', 'https://www.facebook.com/gulden', 'https://github.com/gulden', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 22:57:23', '2018-05-26 04:56:26', 1),
(117, 1, 'BOP000117', 1, 'DubaiCoin', 'dubaicoin-dbix', 'digital_dubaicoin_20181025_103358.png', 'DubaiCoin is the first Arab public blockchain.  The ArabianChain allows users to create their own instructions.  This is a platform for different types of decentralized applications including cryptocurrencies.  The ArabianChain is their own secure blockchain, has a smart contract builder, Thuraya is the programming language and DBIX allows a secure money transfer.\r\n', 'https://www.arabianchain.org/index.php/en/', 1356580, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/arabianchain', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 23:02:57', '2018-12-21 13:13:07', 1),
(118, 1, 'BOP000118', 1, 'Peerplays', 'peerplays-ppy', '20170717_230530.jpg', 'Peerplays is the worlds first P2P betting platform on blockchain.  Users can bet from anywhere.  PPY holders receive commission and fees from Peerplays.\r\n', 'https://www.peerplays.com/', 0, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/peerplays', 'https://www.facebook.com/PeerPlays/', 'https://github.com/BunkerChainLabsInc', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 23:05:37', '2017-07-17 23:05:37', 1),
(119, 1, 'BOP000119', 1, 'CloakCoin', NULL, 'digital_cloakcoin_20181018_093014.png', 'CloakCoin is a digital currency that is decentralized, secure and private.  CloakCoin has fast transactions and user friendly.\r\n', 'https://www.cloakcoin.com/en/', 43172801, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/CloakCoin', 'https://www.facebook.com/CloakCoinOfficial/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 23:08:03', '2018-10-18 09:30:14', 1),
(120, 1, 'BOP000120', 1, 'Populous', NULL, 'digital_populous_20181018_082310.png', 'Populous is an invoice and trade finance platform.  Populous uses smart contracts, Z score formula, XBRL and stable tokens in trading for investors.\r\n', 'http://populous.co/', 501171439, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://bitpopulous.herokuapp.com/', 'https://twitter.com/bitpopulous', 'http://populous.co/#', 'https://github.com/Bitpopulous', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 23:11:16', '2018-10-18 08:23:10', 1),
(121, 1, 'BOP000121', 1, 'E-Dinar Coin', 'e-dinar-coin', '20170717_231522.jpg', 'E-Dinar is a decentralized payment system.  Part of E-Dinars income will go towards the development of new urban projects for fresh air and clean water.\r\n', 'https://edinarcoin.com/', 0, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/edinarworldwide', 'https://www.facebook.com/EDinarCoinWorld/', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 23:15:29', '2017-07-17 23:15:29', 1),
(122, 1, 'BOP000122', 1, 'Omni', NULL, '20170717_231731.jpg', 'Omni is a trading and creating platform for digital currencies and assets.  Some features provided are: blockchain based crowd funding, secure wallets, and easily creating custom currencies.\r\n', 'http://www.omnilayer.org/', 14934432, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/omni_layer?lang=en', '', 'https://github.com/OmniLayer/', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 23:17:38', '2018-05-26 04:57:39', 1),
(123, 1, 'BOP000123', 1, 'Quantum Resistant Ledger', 'quantum-resistant-ledger', '20170717_232048.jpg', 'Quantum Resistant Ledger is the place for blockchain transactions.  It\'s made for long term stability and secure transactions.  It designed security towards quantum computing advances.\r\n', 'https://theqrl.org/', 0, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'http://slack.theqrl.org/', 'https://twitter.com/qrledger', 'https://github.com/theQRL', 'https://github.com/theQRL', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 23:20:54', '2017-07-17 23:20:54', 1),
(124, 1, 'BOP000124', 1, 'LBRY Credits', 'library-credit', '20170717_232847.png', 'LBRY is a free community run digital marketplace.  Everyone owns their own data whether that be lessons, films or any other streams.\r\n', 'https://lbry.io/', 0, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'http://slack.lbry.io/', 'https://twitter.com/lbryio', 'https://www.facebook.com/lbryio', 'https://github.com/lbryio', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 23:28:54', '2017-07-17 23:28:54', 1),
(125, 1, 'BOP000125', 1, 'Humaniq', NULL, 'digital_humaniq_20181019_052335.png', 'Humaniq is a 4th generation  mobile bank.  Humaniq is a safe tool specifically designed for people that are under educated or with little income.  Their main focus is connecting millions of un-banked people to Humaniq.\r\n', 'https://humaniq.co/', 23255688, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'http://twitter.humaniq.co/?_ga=2.174838690.1475154709.1499958797-1420822536.1499958797', 'http://facebook.humaniq.co/?_ga=2.174838690.1475154709.1499958797-1420822536.1499958797', 'http://github.humaniq.co/?_ga=2.174838690.1475154709.1499958797-1420822536.1499958797', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 23:32:57', '2018-10-19 05:23:35', 1),
(126, 1, 'BOP000126', 1, 'Skycoin', NULL, 'digital_skycoin_20181018_083912.png', 'Skycoin has a consensus algorithm that is decentralized.  Skycoin is designed to fix the problems with Bitcoin.  Skycoin is fast, private, secure and a rich ecosystem.\r\n', 'https://www.skycoin.net/', 212775235, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://skycoin.herokuapp.com/', '', '', 'https://github.com/skycoin/skycoin', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 23:37:52', '2018-10-18 08:39:13', 1),
(127, 1, 'BOP000127', 1, 'vSlice', NULL, '20170717_234038.png', 'vSlice is an Ethereum gaming pltform token.  Users can contribute funds to smart contract game developers and earn ETH if they are successful.\r\n', 'http://www.vslice.io/', 2645402, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'https://vdice-slack-invite-page.stamplayapp.com/', '', '', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 23:40:54', '2018-05-26 04:57:40', 1),
(128, 1, 'BOP000128', 1, 'YbCoin', NULL, '20170717_234243.jpg', 'YbCoin is one of China\'s top cryptocurrencies.\r\n', 'http://www.ybcoin.com/', 0, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/ybcoin?lang=en', '', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 23:42:49', '2017-07-17 23:42:49', 1),
(129, 1, 'BOP000129', 1, 'Zcoin', NULL, 'digital_zcoin_20181018_085205.png', 'Zcoin does private financial transactions.  Users can mint a coin on the ledger into a private coin, spend the minted coin and repeat the process.\r\n', 'https://zcoin.io/', 149152268, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/zcoinofficial', 'https://www.facebook.com/zcoinofficial', 'https://github.com/zcoinofficial/zcoin', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 23:45:51', '2018-10-18 08:52:05', 1),
(130, 1, 'BOP000130', 1, 'Mooncoin', NULL, '20170717_234846.jpg', 'Mooncoin is reliable, easy and transparent for everyone.  This is great for micropayments, decentralized and low inflation.  Anyone can build projects in the Mooncoin ecosystem.\r\n', 'http://mooncoin.com/', 14335024, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/mooncoinitalia', 'https://www.facebook.com/mooncoincommunity/', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 23:48:53', '2018-05-26 04:58:53', 1),
(131, 1, 'BOP000131', 1, 'PotCoin', NULL, '20170717_235318.png', 'PotCoin is a decentralized currency, network and banking solution for the legal marijuana industry.  Users can send PotCoins through the internet with lower fees and can be used anywhere.\r\n', 'http://www.potcoin.com/', 19732929, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/potcoin', 'https://www.facebook.com/PotCoin', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 23:53:25', '2018-05-26 04:58:54', 1),
(132, 1, 'BOP000132', 1, 'Crown', NULL, 'digital_crown_20181019_044923.jpg', 'Crown is an application platform and digital commodity.\r\n', 'http://crown.tech/', 16826537, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/Crowncoin1', 'https://www.facebook.com/crowncoin/?fref=ts', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-17 23:56:53', '2018-10-19 04:49:23', 1),
(133, 1, 'BOP000133', 1, 'BitBay', NULL, '20170717_235836.png', 'With BitBay people trade anything safely with others throughout the world.  There are: decentralized markets, advanced security, unbreakable contracts, hire or find a job, pay to e-mail and no more volatility.\r\n', 'http://bitbay.market/', 42759158, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'http://twitter.com/bitbaytalk', 'https://facebook.com/bitbaymarket', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-17 23:58:43', '2018-05-26 04:58:54', 1),
(134, 1, 'BOP000134', 1, 'OBITS', NULL, '20170718_000013.png', 'OBITS is a token defined by generated profits from OpenLedger Fintech platform and its development.\r\n', 'https://obits.io/', 5541034, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'http://twitter.com/open_bits', 'https://www.facebook.com/obits.io/', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-18 00:00:19', '2018-05-26 04:58:54', 1),
(135, 1, 'BOP000135', 1, 'Groestlcoin', NULL, 'digital_groestlcoin_20181018_091455.png', 'Groestlcoin is a cryptocurrency utilizing proof of work and the Groestl algorithm.  Users can send and reseive money right away.\r\n', 'http://www.groestlcoin.org/', 74584049, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/GroestlcoinTeam', 'https://www.facebook.com/groups/groestlcoin/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 00:02:43', '2018-10-18 09:14:55', 1),
(136, 1, 'BOP000136', 1, 'Swarm City', 'swarm-city', 'digital_swarm_city_20181019_034507.png', 'Swarm City is a decentralized commerce platform.  It\'s enabled by the SWT token and run on Ethereum.  This is an open source project stored on your device.\r\n', 'https://swarm.city/', 1366113, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://swarm-slack-invite.herokuapp.com/', 'https://twitter.com/swarmcitydapp?lang=en', 'https://www.facebook.com/groups/SwarmCity/', 'https://github.com/swarmcity', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 00:08:22', '2018-12-21 13:13:30', 1),
(137, 1, 'BOP000137', 1, 'Viacoin', NULL, 'digital_viacoin_20181018_093402.png', 'Viacoin is the future of cryptocurrency.  It has: rapid payments, lightening network, blockchain notary, locktime support, decentralized and safe.\r\n', 'https://viacoin.org/', 38733745, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/viacoin', 'https://www.facebook.com/Viacoin-687153974696133/', 'https://github.com/viacoin/viacoin', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 00:11:18', '2018-10-18 09:34:02', 1),
(138, 1, 'BOP000138', 1, 'BlackCoin', NULL, 'digital_blackcoin_20181019_044749.png', 'BlackCoin is a digital currency with a decentralized public ledger.  BlackCoin is anonymous, eco friendly,  proof of stake 3.0 and fast transactions.\r\n', 'http://blackcoin.co/', 16865708, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/coinblack', 'https://www.facebook.com/coinblack/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 00:14:19', '2018-10-19 04:47:49', 1),
(139, 1, 'BOP000139', 1, 'Elastic', NULL, '20170718_001605.jpg', 'Elastic is a decentralized supercomputer.  Elastic has its own programming language similar to C but with limited functionality.  The programming language is called Elastic PL.  With other computers to do multiple tasks the user needs many use cases however with Elastic, users can just use one.\r\n', 'https://www.elastic.pw/', 21268571, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'https://elasticfans.herokuapp.com/', 'https://twitter.com/elastic_coin', '', 'https://github.com/elastic-coin', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-18 00:16:12', '2018-05-26 04:58:55', 1),
(140, 1, 'BOP000140', 1, 'Burst', NULL, '20170718_001740.jpg', 'Burstcoin is a green currency for investors, entrepeneurs and founders.  Burstcoin uses an advanced green algorithm for transactions.  Just use free space on the hard drive to mint coins and contribute to the network instead of using your processor.\r\n', 'https://www.burst-team.us/', 45604014, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/Burstcoin_dev', '', 'https://github.com/burst-team/burstcoin', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-18 00:17:47', '2018-05-26 05:00:08', 1),
(141, 1, 'BOP000141', 1, 'I/O Coin', 'iocoin', '20170718_002345.png', 'I/O Coin is a digital currency.  I/O digital develops blockchain technology for individuals to use.  IOC uses proof of stake using less energy.  Developments include: HTML5 wallet, mobile wallet and IONS.\r\n', 'http://iocoin.io/', 0, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'http://iodigital.io/slack', 'https://twitter.com/io_coin', 'https://www.facebook.com/iodigitalblockchain', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-18 00:24:11', '2017-07-18 00:39:52', 1),
(142, 1, 'BOP000142', 1, 'Synereo', NULL, 'digital_synereo_20181019_034638.png', 'Synereo is a decentralized social network platform that generates value for everyone.  Users can: make money by creating content and get paid for curating your feed.\r\n', 'http://www.synereo.com/', 19093704, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://joinslack.synereo.com/', 'https://twitter.com/synereo', 'https://www.facebook.com/synereo/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 00:27:34', '2018-10-19 03:46:38', 1),
(143, 1, 'BOP000143', 1, 'adToken', NULL, 'digital_adtoken_20181024_131844.png', 'The adChain Registry is a smart contract on the Ethereum blockchain which stores domain names accredited as non-fraudulent by adToken holders. The presence of the domain foo.net in the registry means that adToken holders have recently assessed that domain belongs to a legitimate publisher with a real human audience.', 'https://adtoken.com/', 3442465, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', 'http://slack.adchain.com/', 'https://twitter.com/ad_chain', '', 'https://github.com/adchain', 'https://t.me/adChain', NULL, NULL, 'https://coinmarketcap.com/currencies/adtoken/', '', '0', 0, 1, NULL, '2017-07-18 00:44:55', '2018-12-20 10:33:38', 1),
(144, 1, 'BOP000144', 1, 'TokenCard', NULL, 'digital_tokencard_20181018_094856.png', 'TokenCard is a smart contract powered debit card.  Users can do online payments, ATM withdrawals and PoS transactions.\r\n', 'http://tokencard.io/#token', 30959556, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://tokencard-team.herokuapp.com/', 'https://twitter.com/monolith_web3', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 00:48:54', '2018-10-18 09:48:56', 1),
(145, 1, 'BOP000145', 1, 'FairCoin', NULL, 'digital_faircoin_20181019_034808.png', 'FairCoin is a global currency.  Individuals can buy FairCoin and help fund some of FairCoops projects.  Users can visit FairCoops marketplace online and buy goods.  FairCoin is: ecological, fast, safe, ethical, strong and vibrant.\r\n', 'https://fair-coin.org/de', 25641023, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/FairCoinTeam?ref_src=twsrc%5Etfw&ref_url=https%3A%2F%2Ffair-coin.org%2Fde', '', 'https://github.com/faircoin', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 00:52:04', '2018-10-19 03:48:08', 1),
(146, 1, 'BOP000146', 1, 'Agoras Tokens', NULL, 'digital_agoras_tokens_20181018_085545.png', 'Agoras Tokens are an intelligent smart currency market built on Tau-Chain, decentralized network, it features a search engine, intelligent personal agents and programming market.\r\n', 'http://www.idni.org/home', 123456789, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'ohad@idni.org', NULL, '', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 00:55:14', '2018-10-18 08:55:46', 1),
(251, 43, 'BOP000251', 2, 'Serenity ', NULL, 'ico_serenity__20180420_113732.jpg', 'Serenity is a blockchain platform that secures funds with the Serenity smart contracts.  Serenity records all transactions to ensure accuracy between traders and brokers.', 'https://serenity-financial.io/#top', 0, NULL, '', '400000000', '', '2018-01-25', '2018-03-07', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/serenity_io', 'https://www.facebook.com/SerenityFinancial/', '', '', NULL, NULL, '', '', '0', 0, 1, NULL, '2018-03-07 22:55:44', '2018-04-20 11:37:32', 0),
(147, 1, 'BOP000147', 1, 'CounterParty', NULL, 'digital_counterparty_20181018_094752.png', 'CounterParty is a P2P platform that enables creating financial instruments.  Some Counterparty features include: wallets, lightening network, Bitcoin aware, creating assets, secure and decentralized.\r\n', 'https://counterparty.io/', 32159082, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://slack.counterparty.io/', 'http://twitter.com/CounterpartyXCP', 'http://www.facebook.com/CounterpartyXCP', 'http://github.com/CounterpartyXCP', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 01:03:21', '2018-10-18 09:47:53', 1),
(148, 1, 'BOP000148', 1, 'Blocknet', NULL, 'digital_blocknet_20181018_090133.png', 'Blocknet is a decentralized application platform.  Somefeatures are: cloud storage, instant transactions, private chats, distributed web content and a decentralized exchange.\r\n', 'http://blocknet.co/', 95014942, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://blocknet.herokuapp.com/', 'http://www.twitter.com/the_blocknet', 'https://www.facebook.com/theblocknet', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 01:06:32', '2018-10-18 09:01:33', 1),
(149, 1, 'BOP000149', 1, 'Expanse', NULL, 'digital_expanse_20181019_052701.jpg', 'Expanse is a platform that facilitates censorship resistant applications and is based on Ethereum.\r\n', 'http://www.expanse.tech/', 11879361, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://slack.expanse.tech/', 'https://twitter.com/expanseofficial', 'https://www.facebook.com/groups/expanseofficial', 'https://www.github.com/expanse-org', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 01:12:42', '2018-10-19 05:27:01', 1),
(150, 1, 'BOP000150', 1, 'FirstCoin', NULL, '20170718_011727.png', 'FirstCoin is a cryptocurrency project with an exchange rate protection program that will connect users to startups.  With FirstCoin there are ATMs, eco sharing, a community and tokens.  FirstCoin is safe, secure, fast, free, and private.\r\n', 'http://firstcoinproject.com/', 355276, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', '', 'https://www.facebook.com/firstcoinofficial', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-18 01:17:38', '2018-05-26 05:01:22', 1),
(151, 1, 'BOP000151', 1, 'Novacoin', NULL, 'digital_novacoin_20181019_034850.png', 'Novacoin is a coin that uses proof of stake and proof of work on blockchain that has separate target limits.  This is an open source and available for everyone.\r\n', 'http://novacoin.org/', 7085425, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', '', '', '', '', NULL, NULL, 'https://coinmarketcap.com/currencies/novacoin/', '', NULL, NULL, 1, NULL, '2017-07-18 01:20:42', '2018-10-19 03:48:50', 1),
(152, 1, 'BOP000152', 1, 'Wagerr', NULL, 'digital_wagerr_20181018_094031.png', 'Wagerr is a decentralized sportsbook.  It changes the way people bet on sports games.  Everyone can place bets and whoever wins will be rewarded.\r\n', 'https://www.wagerr.com/', 33917586, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://slack.wagerr.com/', 'https://twitter.com/wagerrx', 'https://www.facebook.com/wagerr', 'https://github.com/wagerr', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 01:27:23', '2018-10-18 09:40:31', 1),
(153, 1, 'BOP000153', 1, 'TaaS', NULL, 'digital_taas_20181018_100452.jpg', 'TaaS is a token closed end fund that reduces risks of investing in blockchain space.\r\n', 'https://taas.fund/', 26437601, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://taasfund.signup.team/', 'https://twitter.com/TaaSfund', 'https://www.facebook.com/taasfund/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 01:37:38', '2018-10-18 10:04:52', 1),
(154, 1, 'BOP000154', 1, 'Golos', NULL, '20170718_014300.png', 'Golos is the Russian version of Steemit.  This is a platform for bloggers.\r\n', 'https://golos.io/', 7156287, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/golos_gold?lang=en', '', 'https://github.com/GolosChain', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-18 01:43:08', '2018-05-26 05:01:23', 1),
(155, 1, 'BOP000155', 1, 'NAV Coin', 'nav-coin', '20170718_014544.png', 'NAC Coin is a decentralized cryptocurrency based on Bitcoin Core.  NAC Coin walletshave advanced privacy features.  Users can earn up to 5% interest on investments.\r\n', 'https://navcoin.org/', 0, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'https://navcoin-sign-up.herokuapp.com/', 'https://twitter.com/NavCoin', 'https://facebook.com/NAVCoin', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-18 01:45:50', '2017-07-18 01:45:50', 1),
(156, 1, 'BOP000156', 1, 'SIBCoin', NULL, '20170718_014801.png', 'SIBCoin is a Russian decentralized payment system.  It is fast, private, secure, low commission and limitless.\r\n', 'http://sibcoin.org/', 11951722, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, 'https://sibcoin.herokuapp.com/', 'https://twitter.com/sibcoin', 'https://www.facebook.com/SiberianChervonets/', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-18 01:48:07', '2018-05-26 05:01:23', 1),
(157, 1, 'BOP000157', 1, 'Polybius', NULL, 'digital_polybius_20181019_035112.png', 'Polybius is a project in creating a regulated bank for the digital world.  Some features will be similar to modern banking and blockchain technologies.\r\n', 'https://polybius.io/', 14566835, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://polybius.io/#', 'https://twitter.com/PolybiusBank', 'https://www.facebook.com/projectpolybius/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 01:56:28', '2018-10-19 03:51:13', 1),
(158, 1, 'BOP000158', 1, 'Vertcoin', NULL, 'digital_vertcoin_20181018_090758.png', 'Vertcoin is a decentralized currency on blockchain technology.  Vertcoin has a mobile wallet and stealth addresses for privacy.  Stealth address is a private exchange between the payers.\r\n', 'https://vertcoin.org/', 81147522, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://slack.vtconline.org/', 'https://twitter.com/Vertcoin?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'https://www.facebook.com/vertcoin/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 01:58:22', '2018-10-18 09:07:58', 1),
(159, 1, 'BOP000159', 1, 'OmiseGo', NULL, 'digital_omisego_20181024_203933.jpg', 'OmiseGO (OMG) is a cryptocurrency and also decentralized exchange, liquidity provider mechanism, clearinghouse messaging network, and asset-backed blockchain gateway based on Ethereum. Unlike nearly all other decentralized exchange platforms, OmiseGo allows for decentralized exchange of other blockchains and between multiple blockchains directly without a trusted gateway token.', 'https://omg.omise.co/', 1086100104, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://omg.omise.co/slack', 'https://twitter.com/omise_go', 'https://www.facebook.com/OmiseGo/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 02:04:18', '2018-10-24 20:39:33', 1),
(160, 1, 'BOP000160', 1, 'BCAP', NULL, '20170718_021330.jpg', 'BCAP is a venture fund that invests in blockchain companies.  BCAP has invested in many companies so far.\r\n', 'http://blockchain.capital/', 0, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/blockchaincap?lang=en', 'https://www.facebook.com/blockchaincapital', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-18 02:13:36', '2017-07-18 02:13:36', 1),
(161, 1, 'BOP000161', 1, 'E-Coin', NULL, '20170718_021608.jpg', 'E-Coin is a decentralized cryptocurrency that is transparent, easy to use, has inflation protection and has a debit card.  It is for businesses and end users where businesses deal directly with each other on the E-Coin X Platform.\r\n', 'https://www.ecoinsource.com/#', 2604919, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', '', 'https://www.facebook.com/Ecoin-1792949027636816/', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-18 02:16:17', '2018-05-26 05:02:37', 1),
(163, 1, 'BOP000163', 1, 'WeTrust', 'trust', '20170718_022325.jpg', 'WeTrust is a platform for savings and insurance on blockchain.  \r\n', 'https://www.wetrust.io/', 936059, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', NULL, NULL, '', 'https://twitter.com/wetrustplatform?lang=en', '', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-18 02:23:32', '2018-12-21 13:13:59', 1),
(164, 1, 'BOP000164', 1, 'GridCoin', NULL, 'digital_gridcoin_20181019_045057.png', 'GridCoin is a decentralized cryptocurrency and rewards computational research such as medical simulations or climate change.\r\n', 'http://www.gridcoin.us/', 14591062, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/GridcoinNetwork', 'https://www.fb.com/gridcoins', 'https://github.com/gridcoin/Gridcoin-Research', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-18 02:25:43', '2018-10-19 04:50:57', 1),
(166, 1, 'BOP000166', 1, 'Cofound.it', 'cofound-it', '20170724_215249.jpg', 'Cofound.it is a distributed global platform.  It connects startups, supporters and experts everywhere.\r\n', 'https://cofound.it/en/', 0, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', 'info@cofound.it', 0, NULL, 'http://cofoundit.herokuapp.com/', 'https://twitter.com/cofound_it', 'https://www.facebook.com/CofounditEcosystem/', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-24 21:52:55', '2017-07-24 21:52:55', 1),
(167, 1, 'BOP000167', 1, 'Civic', NULL, 'digital_civic_20181018_085926.png', 'Civic is a secure and identity platform.  It protects the identity of businesses and individuals.\r\n', 'https://www.civic.com/', 105594427, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/civickey', 'https://www.facebook.com/civictechnologiesinc', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-24 21:59:29', '2018-10-18 08:59:26', 1),
(168, 1, 'BOP000168', 1, 'Safe Exchange Coin', 'safe-exchange-coin', 'digital_safe_exchange_coin_20181019_035337.jpg', 'Safe Exchange Coin is a cryptocurrency.  The Safe Exchange Coin can be traded, used in voting and safe from inflation.\r\n', 'https://safex.io/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://safex.herokuapp.com/', 'https://twitter.com/safe_Exchange', '', 'https://github.com/safex', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-24 22:01:48', '2018-10-19 03:53:37', 1),
(169, 1, 'BOP000169', 1, 'SaluS', NULL, 'digital_salus_20181019_044326.png', 'SaluS is a cryptocurrency.  Some funding methods that are being used are: cloud staking service, foundation transaction fee, traders advantage service and affiliate programs.\r\n', 'http://saluscoin.info/', 19520636, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', 'https://slack.saluscoin.info/', 'https://twitter.com/Kushed_Crypto', '', '', '', NULL, NULL, 'https://coinmarketcap.com/currencies/salus/', '', NULL, NULL, 1, NULL, '2017-07-24 22:02:49', '2018-10-19 04:47:30', 1),
(170, 1, 'BOP000170', 1, 'Rialto', NULL, 'digital_rialto_20181019_053053.jpg', 'Rialto is a cryptocurrency, market making and arbitrage.  Rialto provides liquidity, improves efficiency and matches orders.\r\n', 'https://www.rialto.ai/', 10499913, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', '', 'https://twitter.com/RialtoAI', 'https://www.facebook.com/RIALTOAI-1908809969366651/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-24 22:07:55', '2018-10-19 05:30:53', 1),
(171, 1, 'BOP000171', 1, 'Mysterium', NULL, 'digital_mysterium_20181025_103736.png', 'Mysterium is a decentralized VPN (virtual private network) on a blockchain.  Users can sell and buy unused networks.\r\n', 'https://mysterium.network/', 6590616, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://slack.mysterium.network/', 'https://twitter.com/MysteriumNet', '', 'https://github.com/MysteriumNetwork', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-24 22:28:55', '2018-10-25 10:37:36', 1),
(172, 1, 'BOP000172', 1, 'Voxelus', NULL, '20170724_223103.jpg', 'Voxelus is a platform that lets anyone share and play virtual games without writing a line of code.  Voxelus has free assets that individuals can use to design more content.\r\n', 'https://www.voxelus.com/', 0, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', 'info@voxelus.com', 0, NULL, '', 'https://twitter.com/Voxelus', 'https://www.facebook.com/Voxelus?fref=ts', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-24 22:31:10', '2017-07-24 22:31:10', 1),
(173, 1, 'BOP000173', 1, 'EarthCoin', NULL, '20170724_223412.png', 'Eathcoin is a scrypt coin that is a descendant of Litecoin.\r\n', 'http://getearthcoin.com/', 7386940, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', 0, NULL, '', 'https://twitter.com/getearthcoin?ref_src=twsrc%5Etfw&ref_url=https%3A%2F%2Fwww.worldcoinindex.com', 'https://www.facebook.com/earthcoin.official/', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-24 22:34:19', '2018-04-01 11:37:03', 1),
(174, 1, 'BOP000174', 1, 'Unity Ingot', NULL, 'digital_unity_ingot_20181019_035545.jpg', 'Unity Ingot is a token backed by a physical gold bullion.  This is achieved by mining Ethereum, Zcash and Litecoin.  These currencies get stored and then used to buy the bullion.\r\n', 'https://unityingot.com/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://ingotfamilyoftokens.slack.com/signup', 'https://twitter.com/IngotTokenFam', 'https://www.facebook.com/ingotfamilyoftokens/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-24 22:36:57', '2018-10-19 03:55:45', 1),
(175, 1, 'BOP000175', 1, 'MonetaryUnit', NULL, '20170724_224039.jpg', 'MonetaryUnit is a fast, secure cryptocurrency.\r\n', 'https://www.monetaryunit.org/', 13240227, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', 0, NULL, 'https://mueslack.herokuapp.com/', 'http://www.twitter.com/MonetaryUnit', 'http://www.facebook.com/MonetaryUnit/', 'https://github.com/muecoin', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-24 22:40:46', '2018-05-26 05:03:52', 1),
(176, 1, 'BOP000176', 1, 'Santiment Network ', 'santiment', '20170724_224238.jpg', 'Santiment is a market intelligence and datafeeds platform.  \r\n', 'https://santiment.net/', 0, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', 0, NULL, 'https://santiment-slack.herokuapp.com/', 'https://twitter.com/santimentfeed', '', 'https://github.com/santiment', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-24 22:42:44', '2017-07-24 22:42:44', 1);
INSERT INTO `bop_compaines` (`cm_id`, `cm_uid`, `cm_unique_id`, `cm_ctid`, `cm_name`, `cm_apiname`, `cm_picture`, `cm_decript`, `cm_siteurl`, `cm_marketcap`, `cm_escrow`, `cm_total_token_supply`, `cm_tokens_available_crowd_sale`, `cm_inflation`, `cm_ico_start_date`, `cm_ico_end_date`, `cm_ico_start_time`, `cm_ico_end_time`, `cm_ico_conditions`, `cm_mobile`, `cm_email`, `cm_resources`, `cm_discord`, `cm_slack`, `cm_twitter`, `cm_facebook`, `cm_github`, `cm_telegram`, `cm_google_plus`, `cm_linkedin`, `cm_coinmarket_cap`, `cm_address`, `cm_overallrating`, `cm_totalviews`, `cm_status`, `cm_approval`, `cm_caretedat`, `cm_modifiedat`, `cm_cron_checker`) VALUES
(177, 1, 'BOP000177', 1, 'Augmentors', NULL, 'digital_augmentors_20181025_104120.jpg', 'Augmentors is augmented reality games built on a blockchain.  Users can trade, sell and buy creatures and potions.\r\n', 'http://www.augmentorsgame.com/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://augmentorsgame.signup.team/', 'https://twitter.com/AugmentorsGame', 'https://www.facebook.com/augmentors', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-24 22:44:46', '2018-10-25 10:41:20', 1),
(178, 1, 'BOP000178', 1, 'ION', NULL, 'digital_ion_20181018_094237.jpg', 'With ION users can play games and earn at the same time.  Individuals can share profiles in the community and investors can get daily payouts.\r\n', 'https://ionomy.com/', 32842068, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://slack.ionomy.com/', 'https://twitter.com/ionomics?lang=en', 'https://www.facebook.com/ionomy/', 'https://github.com/ionomy', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-24 22:49:29', '2018-10-18 09:42:37', 1),
(179, 1, 'BOP000179', 1, 'Bankcoin', NULL, '20170724_225115.jpg', 'Bankcoin is a cryptocurrency and blockchain.  Users can use and ATM, have a debit card and shop.\r\n', 'http://bankcoin.global/', 161018, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', 0, NULL, '', 'https://twitter.com/bankcoin_global', 'https://www.facebook.com/BankCoinglobal-253810794992240/', '', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-24 22:51:22', '2018-05-26 05:03:53', 1),
(180, 1, 'BOP000180', 1, 'SONM', NULL, '20170724_225829.jpg', 'SONM stands for supercomputer organized by network mining.  SONM is based on Ethereum.  This is designed for general purpose computing such as mobile app hosting to video rendering.\r\n', 'https://sonm.io/', 0, '', '', '', '', '2017-07-25', '2017-07-25', NULL, NULL, '', '', '', 0, NULL, 'https://sonmio.signup.team/', 'https://twitter.com/sonmdevelopment', 'https://www.facebook.com/SONM-Supercomputer-Organized-by-Network-Mining-954849207981204', 'https://github.com/sonm-io', '', NULL, NULL, NULL, '', '0', 0, 2, NULL, '2017-07-24 22:58:34', '2018-03-21 07:31:10', 0),
(182, 1, 'BOP000182', 1, 'NeosCoin', NULL, 'digital_neoscoin_20181019_035947.png', 'NeosCoin is a P2P decentralized blockchain social media sharing platform.\r\n', 'http://www.neoscoin.com/', 1610731, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'http://slack.neoscoin.com/', 'http://twitter.com/NeosCoin', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-25 20:56:19', '2018-10-19 03:59:47', 1),
(183, 1, 'BOP000183', 1, 'Matchpool', 'guppy', '20170725_210156.jpg', 'Matchpool is a platform that connects users to their interests.  Users can create their own free community of their interests and invite others to join in.  Each owner of a community can be rewarded when matches are created within their environment.\r\n', 'https://matchpool.co/', 0, '', '', '', '', '2017-07-25', '2017-07-25', '', '', '', '', '', NULL, NULL, 'https://matchpool.signup.team/', 'https://twitter.com/matchpool', 'https://www.facebook.com/matchpoolhq/', 'https://github.com/Matchpool/', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-25 21:02:03', '2017-07-25 21:02:03', 1),
(184, 1, 'BOP000184', 1, 'Radium', NULL, '20170725_210415.jpg', 'Radium is a proof of stake cryptocurrency that has identity management and file verification.\r\n', 'https://radiumcore.org/', 14375731, '', '', '', '', '2017-07-25', '2017-07-25', '', '', '', '', 'support@radiumcore.org', NULL, NULL, '', 'https://twitter.com/RadiumCore', 'https://www.facebook.com/CoreRadium/', 'https://github.com/RadiumCore/Radium', '', NULL, NULL, NULL, '', NULL, NULL, 1, NULL, '2017-07-25 21:04:21', '2018-05-26 05:05:06', 1),
(185, 1, 'BOP000185', 1, 'Chronobank', NULL, 'digital_chronobank_20181019_051807.png', 'Chronobank is a blockchain project disrupting the finance industry similar to Uber taking over the taxi business.  Chronobanks main goal is to make a difference in how people find work and how they are rewarded for it in a decentralized way.  Their main target professions are:e-commerce, cleaningwarehousing, industrial and building.  Tokens are called Labor hour tokens and these are linked to hourly wages in the country and backed by a real labor force.  \r\n', 'https://chronobank.io/', 11084932, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://chronobank.herokuapp.com/', 'https://twitter.com/ChronobankNews', 'https://www.facebook.com/ChronoBank.io', 'https://github.com/ChronoBank', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-07-25 21:15:04', '2018-10-19 05:18:07', 1),
(188, 2, 'BOP000188', 1, 'New Digital Asset', NULL, '', 'New Description', '', NULL, NULL, '', '', '', '2017-07-25', '2017-07-25', '', '', '', NULL, 'ddharani716@gmail.com', NULL, NULL, '', '', '', '', '', NULL, NULL, '', '', '0', 0, 2, NULL, '2017-07-27 16:21:58', '2018-03-22 05:23:52', 0),
(196, 1, 'BOP000196', 1, 'SpreadCoin', NULL, '20170830_033435.png', 'SpreadCoin is a cryptocurrency that prevents centralization.\r\n', 'http://www.spreadcoin.info/index.php', 3819900, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'email@admin.com', NULL, NULL, '', 'https://twitter.com/SpreadCoinTeam', 'https://facebook.com/spreadcoin', 'https://github.com/spreadcoin', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-08-30 03:34:44', '2018-05-26 05:05:06', 1),
(197, 1, 'BOP000197', 1, 'SuperNET ', NULL, 'digital_supernet__20181025_104325.png', 'SuperNET is a decentralized organization developing a blockchain based infrustructure for cryptocurrencies.  SuperNETS main goal is to solve current problems of blockchain technologies.\r\n', 'https://www.supernet.org/en', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'info@supernet.org', NULL, '', 'https://www.supernet.org/supernet/slack-invite', 'https://twitter.com/SuperNETorg', 'https://www.facebook.com/SuperNETorg', 'https://github.com/SuperNETorg', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-08-30 03:39:06', '2018-10-25 10:43:25', 1),
(198, 1, 'BOP000198', 1, 'LuckChain', NULL, 'digital_luckchain_20181019_040242.jpg', 'LuckChain is a forecast game platform on blockchain.  LuckChain has developed a few blockchain games.\r\n', 'http://luckchain.org/', 2492145, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'luckchainorg@gmail.com', NULL, '', '', 'https://twitter.com/Luck_Chain', 'https://www.facebook.com/groups/1748797598708254/', 'https://github.com/LuckBash/Bash', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-08-30 03:44:12', '2018-10-19 04:02:42', 1),
(199, 1, 'BOP000199', 1, 'HEAT', 'heat-ledger', 'digital_heat_20181025_104554.jpg', 'HEAT stands for heuristically enhanced asynchronous transactions ledger.  HEAT provides solution for crowdfunding and IPO arrangements.  HEAT has unlimited scalability and access to multiple cryptocurrencies\r\n', 'http://heatledger.com/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'info@heatledger.com', NULL, '', '', 'https://twitter.com/heatcrypto', 'https://www.facebook.com/heatcrypto', 'https://github.com/Heat-Ledger-Ltd', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-08-30 03:47:47', '2018-10-25 10:45:54', 1),
(200, 1, 'BOP000200', 1, 'Shift', NULL, '20170906_191856.jpg', 'Shift is the new decentralized web that is dApp ready, proof of stake blockchain with an interplanetary file system.  Shift lets users profit from their work such as becoming a developer and earning the fees that generate.\r\n', 'https://www.shiftnrg.org/', 23687564, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'connect@shiftnrg.org', NULL, NULL, 'https://shiftnrg.ryver.com/', 'https://twitter.com/ShiftNrg', 'https://www.facebook.com/ShiftNrg/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-06 19:19:04', '2018-05-26 05:05:08', 1),
(201, 1, 'BOP000201', 1, 'Nexium/Beyondthevoid', 'nexium', 'digital_nexium_beyondthevoid_20181019_040411.jpg', 'This is a multiplayer online battle arena with realtime game elements.  Users battle against each other and are in control of their own motherships.  Players can buy and sell their items using Nexium tokens.\r\n', 'https://beyond-the-void.net/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', 'https://beyond-the-void.signup.team/', 'https://twitter.com/BeyondVoidGame', 'https://www.facebook.com/beyondvoid/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-06 19:21:58', '2018-10-19 04:04:11', 1),
(202, 1, 'BOP000202', 1, 'Unobtanium', NULL, 'digital_unobtanium_20181019_043429.png', 'Uno is a proof of work cryptocurrency with low inflation.  A total of 250,000 coins will be distributed.\r\n', 'http://unobtanium.uno/', 14921938, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/unobtanium_uno', 'https://www.facebook.com/Unobtaniumrockchain', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-06 19:53:02', '2018-10-19 04:35:06', 1),
(203, 1, 'BOP000203', 1, 'BitcoinPlus', 'bitcoin-plus', '20170906_195616.png', 'BitcoinPlus is an alternative cryptocurrency with a modern working wallet.  BitcoinPlus has a maximum total of 1 million coins.  These coins are generated through proof of stake.  Users will be rewarded 20% each year.\r\n', 'https://www.bitcoinplus.org/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, NULL, '', 'http://www.twitter.com/bitcoinplusorg', 'https://www.facebook.com/OfficialBitcoinPlusXBC', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-06 19:56:32', '2017-09-06 19:56:32', 1),
(204, 1, 'BOP000204', 1, 'Energycoin', NULL, '20170906_200039.jpg', 'Energycoin is a cryptocurrency made to provide a platform for companies, communities and individuals to build energy applications.  This coin is trying to move away from fossil fuels and use renewable energy.\r\n', 'https://energycoin.eu/', 883476, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, NULL, 'https://energycoin.slack.com/', 'https://twitter.com/ECF4U', '', 'https://github.com/EnergyCoinProject/energycoin', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-06 20:00:53', '2018-10-20 13:23:19', 1),
(208, 1, 'BOP000208', 1, 'Rubycoin', NULL, 'digital_rubycoin_20181019_045341.png', 'Rubycoin is a digital currency that has fast transactions, global payments, energy efficient, low inflation, secure and private.\r\n', 'http://www.rubycoin.org/', 5568740, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'email@admin.com', NULL, '', 'http://rubycoin.herokuapp.com/', 'http://twitter.com/rubycoinorg', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-15 01:42:49', '2018-10-20 13:23:19', 1),
(209, 1, 'BOP000209', 1, 'Clams', NULL, '20170915_014503.png', 'Clams are a cryptocurrency that can be transferred and verified by the computers running the clams software.  Clams follows protocol to make sure everything is correct.\r\n', 'http://clamcoin.org/', 5255600, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, NULL, '', 'https://twitter.com/ClamClient', '', 'https://github.com/nochowderforyou/clams', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-15 01:46:07', '2018-10-20 13:23:19', 1),
(210, 1, 'BOP000210', 1, 'Bitdeal', NULL, '20170915_014906.jpg', 'Bitdeal is a digital currency with transactions throughout the world.\r\n', 'https://bitdeal.co.in/', 166355, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'email@admin.com', NULL, NULL, '', 'https://twitter.com/bitdealuk', 'https://www.facebook.com/bitdeal.co.in/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-15 01:51:24', '2018-10-20 13:23:19', 1),
(211, 1, 'BOP000211', 1, 'Pluton', NULL, '20170915_015628.jpg', 'With Pluton users can tap and pay using Ether or Bitcoin at the terminals throughout the world.\r\n', 'https://plutus.it/', 1194979, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'email@admin.com', NULL, NULL, '', 'https://twitter.com/PlutusIT', 'https://www.facebook.com/Plutus-526126840889793/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-15 01:58:19', '2018-10-20 13:23:20', 1),
(212, 1, 'BOP000212', 1, 'EB3coin', NULL, 'digital_eb3coin_20181019_040700.jpg', 'EB3coin is a cryptocurrency that is centralized on the blockchain technology.  EB3coin is a P2P global payment network.  The information being exchanged is encoded with private and public keys making everything anonymous.\r\n', 'http://www.eb3coin.com/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'email@admin.com', NULL, '', '', 'https://twitter.com/EurobitsCoin ', 'https://facebook.com/Eurobits-coin-1172231082845285/', '', '', NULL, NULL, 'https://coinmarketcap.com/currencies/eb3-coin/', '', NULL, NULL, 1, NULL, '2017-09-15 02:02:08', '2018-10-19 04:07:00', 1),
(213, 1, 'BOP000213', 1, 'Rise', NULL, '20170915_020515.jpg', 'Rise is a cryptocurrency and distributed application platform.  Rise is safe and secure to use.\r\n', ' https://rise.vision/', 4419585, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'email@admin.com', NULL, NULL, 'http://slack.rise.vision/', 'https://twitter.com/risevisionteam', 'https://facebook.com/risevisionteam', 'https://github.com/risevision', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-15 02:51:02', '2018-10-20 13:23:20', 1),
(214, 1, 'BOP000214', 1, 'WorldCoin', NULL, 'digital_worldcoin_20181019_040756.png', 'WorldCoin is a digital currency where users can send payments anywhere in the world in seconds.  With WorldCoin there are: low fees, fast transactions, easy to organize software and decentralized.\r\n', 'https://worldcoin.global/', 563156, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'email@admin.com', NULL, '', '', 'https://twitter.com/worldcoinglobal', 'https://www.facebook.com/worldcoinWDC/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-15 22:14:10', '2018-10-20 13:23:20', 1),
(215, 1, 'BOP000215', 1, 'Patientory', NULL, '20170915_222051.jpg', 'Patientory is a cryptocurrency that is a free and easy way to manage your health information.  Users can get information on any health question.\r\n', 'https://patientory.com/', 2261578, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'info@patientory.com', NULL, NULL, '', 'https://twitter.com/patientory', 'https://www.facebook.com/patientory/', 'https://github.com/Patientory', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-15 22:22:37', '2018-10-20 13:23:20', 1),
(216, 1, 'BOP000216', 1, 'Bitcrystals', NULL, 'digital_bitcrystals_20181019_040849.jpg', 'Bitcrystals are a digital assets in the game called Spells of Genesis.  Spells of Genesis is a blockchain based trading card game.  Users have to collect cards and fight against each other.\r\n', 'http://bitcrystals.com/', 682427, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'email@admin.com', NULL, '', '', 'https://twitter.com/spellsofgenesis', 'https://www.facebook.com/spellsofgenesis', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-15 22:26:46', '2018-10-19 20:48:01', 0),
(217, 1, 'BOP000217', 1, 'Quark', NULL, '20170915_222934.png', 'Quark is a fast, safe and secure cryptocurrency with military grade encryption.\r\n', 'http://quark.cc/', 3315135, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'email@admin.com', NULL, NULL, '', 'https://twitter.com/quarkcoin', 'https://www.facebook.com/quarkcoin/', 'https://github.com/quark-project/quark/releases/tag/v0.10.4.5', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-15 22:30:49', '2018-05-26 04:40:17', 0),
(218, 1, 'BOP000218', 1, 'NVO', NULL, 'digital_nvo_20181019_053438.jpg', 'NVO is a cross platform decentralized exchange.  NVO is private and secure with multi assets storage and full autonomy.\r\n', 'https://nvo.io/', 6993090, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'contact@nvo.io', NULL, '', 'https://nvoinvite.herokuapp.com/', 'https://twitter.com/NVOExchange', 'https://www.facebook.com/NVOExchange/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 01:24:46', '2018-10-19 05:34:38', 0),
(219, 1, 'BOP000219', 1, 'Pepe Cash', 'pepe-cash', 'digital_pepe_cash_20181019_054722.png', 'Pepe Cash is the currency of the Pepesphere and is on a blockchain.  Users pay Pepe Cash to get rare Pepes in their wallet.  Some games even require Pepe Cash.\r\n', 'http://rarepepedirectory.com/', 6464084, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/myrarepepe', '', '', '', NULL, NULL, 'https://coinmarketcap.com/currencies/pepe-cash/', '', NULL, NULL, 1, NULL, '2017-09-19 01:26:22', '2018-10-19 05:47:22', 0),
(220, 1, 'BOP000220', 1, 'Megacoin', NULL, 'digital_megacoin_20181025_104730.png', 'Megacoin is a decentralized currency that is anonymous, no transaction charges and open sourced.\r\n', 'http://www.megacoin.co.nz/', 980297, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'email@admin.com', NULL, '', '', 'https://twitter.com/mega_coin', 'https://www.facebook.com/megacoin.world/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 01:30:03', '2018-10-25 10:47:30', 0),
(221, 1, 'BOP000221', 1, 'LoMoCoin', NULL, 'digital_lomocoin_20181019_041317.png', 'LoMoCoin is a built in digital currency interactive map game.  LoMoCoin is a big treasure hunt game.\r\n', 'http://lomocoin.com/', 10041968, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'contact@LoMoCoin.com', NULL, '', '', '', '', 'https://github.com/lomocoin', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 01:34:25', '2018-10-19 04:13:17', 0),
(222, 1, 'BOP000222', 1, 'Primecoin', NULL, 'digital_primecoin_20181018_080646.png', 'Primecoin is a cryptocurrency with proof of work providing security to ther network.  It generates prime number chains of interest to mathematical research.\r\n', 'http://primecoin.io/', 13393951, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/primecoin', 'https://www.facebook.com/pages/Primecoin-XPM-Cryptocurrency/199526993546179', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 01:37:06', '2018-10-18 08:07:09', 0),
(223, 1, 'BOP000223', 1, 'Dnotes', NULL, '20170919_013947.jpg', 'Dnotes is a decentralized cryptocurrency that allows users to send money fast all over the globe.  Dnotes is bridging the gap between centralized and decentralized!\r\n', 'http://dnotescoin.com/', 4490784, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, NULL, '', 'https://twitter.com/DNotesCoin', 'https://www.facebook.com/Dnotescoin-777105165651768/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 01:40:35', '2018-04-28 23:17:16', 0),
(224, 1, 'BOP000224', 1, 'FlorinCoin', NULL, '20170919_014310.png', 'FlorinCoin is a minable cryptocurrency with fast transactions.  FlorinCoin has transaction comments that make unique enhancements within  blockchain applications.\r\n', 'http://florincoin.org/', 14382567, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, NULL, '', 'https://twitter.com/Official_Florin?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'https://www.facebook.com/FlorinCoin/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 01:44:08', '2018-05-26 04:40:18', 0),
(225, 1, 'BOP000225', 1, 'MergeCoin', NULL, 'digital_mergecoin_20181025_104938.jpg', 'MergeCoin is a cryptocurrency with a dashpay and blackcoin hybrid feature.  Merge is P2P with no middleman.\r\n', 'http://www.mergecoin.com/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@mergecoin.com', NULL, '', '', 'https://twitter.com/MergeCoin', 'https://www.facebook.com/MergeCoin', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 01:46:39', '2018-10-25 10:49:38', 0),
(226, 1, 'BOP000226', 1, 'Feathercoin', NULL, 'digital_feathercoin_20181018_095254.png', 'Feathercoin is a cryptocurrency and global payment network.  This open sourced and has fast transactions with low payment fees.\r\n', 'https://www.feathercoin.com/', 28158821, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', 'http://twitter.com/feathercoin', 'http://facebook.com/feathercoin', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 01:49:41', '2018-10-18 09:52:54', 0),
(227, 1, 'BOP000227', 1, 'VeriCoin', NULL, '20170919_015240.jpg', 'VeriCoin is a binary blockchain pairing digital currency with a digital reserve.  It has a fast transaction rate and is secure.\r\n', 'https://portal.vericoin.info/', 14412301, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, NULL, 'https://vericoinandveriuminvite.herokuapp.com/', 'https://twitter.com/VeriCoin', 'https://www.facebook.com/vericoin/', 'https://github.com/vericoin', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 01:53:53', '2018-05-26 04:41:31', 0),
(228, 1, 'BOP000228', 1, 'FoldingCoin', NULL, 'digital_foldingcoin_20181019_053308.png', 'FoldingCoin is a rewards program that gives out tokens to participants.  The Folding@home is a program made by Stanford university and uses computer power to find cures.  These individuals that are in the program get rewarded the tokens.\r\n', 'http://foldingcoin.net/', 7891286, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'rross@foldingcoin.net', NULL, '', 'http://slack.foldingcoin.net/', 'https://twitter.com/FoldingCoin', 'https://www.facebook.com/FoldingCoin/', 'https://github.com/FoldingCoinNet', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 01:58:26', '2018-10-19 05:33:08', 0),
(229, 1, 'BOP000229', 1, 'Jinn', NULL, 'digital_jinn_20181019_043313.png', 'Jinn is a hardware processing project\r\n', 'http://www.jinnlabs.com/', 43345483, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', '', '', '', '', NULL, NULL, 'https://coinmarketcap.com/currencies/jinn/', '', NULL, NULL, 1, NULL, '2017-09-19 01:59:39', '2018-10-19 04:33:13', 0),
(230, 1, 'BOP000230', 1, 'Gambit', NULL, 'digital_gambit_20181004_011820.jpg', 'Gambit is a token in the trading community.  A portion of these profits get sent to the exchanges and added as buy support on the GAM markets.  Their main focus is trading tools, buy/sell signals, bots and more.\r\n', 'http://www.gambitcrypto.com/', 3720029, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', '', '', '', '', NULL, NULL, 'https://coinmarketcap.com/currencies/gambit/#charts', '', NULL, NULL, 1, NULL, '2017-09-19 02:04:42', '2018-10-04 01:18:34', 0),
(231, 1, 'BOP000231', 1, 'ZenCash', NULL, '20170919_020857.jpg', 'Zen is a private and reliable platform for transactions, publishing and communications.  Users can have private and secure transactions involving ZenCash.\r\n', 'https://zensystem.io/', 153985863, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, NULL, '', 'https://twitter.com/zencashofficial', 'https://www.facebook.com/zencash/', 'https://github.com/ZencashOfficial', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 02:10:08', '2018-05-26 04:41:32', 0),
(232, 1, 'BOP000232', 1, 'Aeon', NULL, 'digital_aeon_20181019_043734.png', 'Aeon is a decentralized currency making people from anywhere able to send and receive money with any gadget they own.\r\n', 'http://www.aeon.cash/', 24593222, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/AeonCoin', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 02:13:24', '2018-10-19 04:37:34', 0),
(233, 1, 'BOP000233', 1, 'NoLimitCoin', NULL, 'digital_nolimitcoin_20181019_052829.jpg', 'NoLimitCoin is a cryptocurrency for the no limit fantasy sports platforms.\r\n', 'http://www.nolimitcoin.org/', 10895838, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'support@nolimitcoin.org', NULL, '', '', 'https://twitter.com/NoLimitCoin', 'https://www.facebook.com/nolimitcoin/?ref=aymt_homepage_panel', 'https://github.com/NoLimitCoin', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 02:19:43', '2018-10-19 05:28:29', 0),
(234, 1, 'BOP000234', 1, 'Cryptonite', NULL, 'digital_cryptonite_20181025_105128.png', 'Cryptonite is a mini blockchain.  Cryptonite combines ideas by the altcoin community and includes novel features.  Two of these features will improve security.  Some other features include: smart adaptation, multi-sig support and micro transactions.\r\n', 'http://cryptonite.info/', 580080, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, 'https://discord.gg/psFsTMv', 'https://cryptonite-group.herokuapp.com/', 'https://twitter.com/CryptoniteCoin', 'https://www.facebook.com/XCN.mini.blockchain/', '', 'https://t.me/xcnCryptonite', NULL, NULL, 'https://coinmarketcap.com/currencies/cryptonite/', '', NULL, NULL, 1, NULL, '2017-09-19 02:21:15', '2018-10-25 10:51:28', 0),
(235, 1, 'BOP000235', 1, 'Einsteinium', NULL, 'digital_einsteinium_20181018_093203.png', 'Einsteinium is funding the future with currency.  It\'s main focus is to raise funds for scientific research.\r\n', 'https://www.emc2.foundation/', 41717258, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', 'http://emc2slack.herokuapp.com/', 'https://twitter.com/einsteiniumcoin', 'https://www.facebook.com/einsteiniumfoundation/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 02:26:20', '2018-10-18 09:32:03', 0),
(236, 1, 'BOP000236', 1, 'Monkey Capital', NULL, 'digital_monkey_capital_20181025_105419.png', 'Monkey Capital is a decentralized hedge fund.\r\n', 'https://www.monkey.capital/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', 'https://mkinvites.herokuapp.com/', 'https://twitter.com/monkeycapitaico', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 02:33:22', '2018-10-25 10:54:19', 0),
(237, 1, 'BOP000237', 1, 'Particl ', NULL, 'digital_particl__20181018_090429.png', 'Particl is a decentralized privacy platform.  It\'s made for business to person or person to person eCommerce.  There are confidential transactions, end-to-end encrypted chats and the market where individuals can buy, sell or trade.\r\n', 'http://particl.io/', 88912156, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'hello@particl.io', NULL, '', 'https://particl.slack.com/', 'https://twitter.com/particlproject', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 02:40:01', '2018-10-18 09:04:29', 0),
(238, 1, 'BOP000238', 1, 'EcoBit', NULL, 'digital_ecobit_20181019_053552.png', 'EcoBit is a green blockchain project.  EcoBit has individuals invest in sustainable environmental projects.  Some features include: tracing of supply of produce and proof of stake.\r\n', 'http://www.ecobit.io/', 6862178, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'support@ecobit.io', NULL, '', 'https://ecobitsupport.slack.com/signup', 'https://twitter.com/EcoBit_io', 'https://www.facebook.com/EcoBit.io/', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 02:45:39', '2018-10-19 05:35:52', 0),
(239, 1, 'BOP000239', 1, 'Muse', NULL, '20170919_024710.png', 'Muse is a foundation for the music world.  Muse is owned and controlled by musicians.  This is a location where individuals can input copyright information.  Funds can travel through Muse and it will go directly to the copyright holders.\r\n', 'http://peertracks.com/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, NULL, '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 02:47:28', '2017-09-19 02:47:28', 0),
(240, 1, 'BOP000240', 1, 'Diamond', NULL, '20170919_024948.png', 'Diamond is a digital currency that is scarce, valuable, secure, fast and ecological.\r\n', 'http://bit.diamonds/', 14270624, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, NULL, '', 'https://twitter.com/dmdcoin', 'https://www.facebook.com/dmdcoin', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 02:51:39', '2018-05-26 04:42:46', 0),
(241, 1, 'BOP000241', 1, 'BelaCoin', NULL, '20170919_025456.png', 'BelaCoin is a cryptocurrency that is paid to individuals using the two features.  Belacam lets users get paid for the photos they take.  Bellachess is an online chess game that lets players get rewarded.\r\n', 'http://belacoin.org/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'contact@livebela.com', NULL, NULL, 'http://belacoin.herokuapp.com/', 'https://twitter.com/belacoin?lang=en', 'https://www.facebook.com/Belacoin-395853550747478/', 'https://github.com/theambiafund/belacoin', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 02:56:38', '2018-05-26 04:42:46', 0),
(242, 1, 'BOP000242', 1, 'Espers', NULL, '20170919_030009.jpg', 'Espers is a blockchain project offering websites on the chain and secure messaging.\r\n', 'https://espers.io/', 7725187, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'contact@espers.io', NULL, NULL, 'https://espers.io/#', 'https://twitter.com/EspersCoin', '', 'https://github.com/cryptocoderz/espers', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 03:00:25', '2018-05-26 04:42:47', 0),
(243, 1, 'BOP000243', 1, 'Pascal Coin', 'pascal-coin', '20170919_030216.jpg', 'Pascal Coin is a cryptocurrency that has infinite scaling, instant transactions, unique account names, smart contracts and a self funded community.\r\n', 'http://pascalcoin.org/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, NULL, 'https://pascalcoin.slack.com/', 'https://twitter.com/PascalCoin', '', 'https://github.com/PascalCoin/PascalCoin', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 03:03:53', '2017-09-19 03:03:53', 0),
(244, 1, 'BOP000244', 1, 'MaxCoin', NULL, '20170919_031039.png', 'MaxCoin is a cryptocurrency that can be send all around the globe to anyone.  It is decentralized, energy efficient and secure.\r\n', 'https://www.maxcoin.co.uk/', 3425573, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, NULL, '', 'https://twitter.com/getmaxcoin', 'http://www.facebook.com/sharer.php?u=http%3A%2F%2Fmaxcoin.online', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 03:11:16', '2018-05-26 04:42:47', 0),
(245, 1, 'BOP000245', 1, 'Sphere', NULL, '20170919_032120.png', 'Sphere is a decentralized P2P network run on proof of stake blockchain.\r\n', 'https://sphrpay.io/', 6237405, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'spheredevs@gmail.com', NULL, NULL, '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 03:22:19', '2018-05-26 04:42:47', 0),
(246, 1, 'BOP000246', 1, 'Lunyr', NULL, 'digital_lunyr_20181018_095518.png', 'Lunyr is a peer review system that is Ethereum based.  Users share knowledge, get peer approval and earn rewards.\r\n', 'https://lunyr.com/', 27338937, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'support@lunyr.com', NULL, '', 'https://slack.lunyr.com/', 'https://twitter.com/LunyrInc', 'https://www.facebook.com/Lunyr-806275516194118', 'https://github.com/lunyr', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-19 03:27:50', '2018-10-18 09:55:18', 0),
(247, 1, 'BOP000247', 1, 'OKCash', NULL, '20170921_230511.jpg', 'OKCash is a digital currency that is open source, has fast transactions, low fees and secure.\r\n', 'http://okcash.co/', 8606599, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, NULL, '', 'https://twitter.com/OKCashCrypto', 'https://www.facebook.com/OKCashCrypto', '', '', NULL, NULL, '', '', NULL, NULL, 1, NULL, '2017-09-21 23:11:37', '2018-05-26 04:44:00', 0),
(250, 43, 'BOP000250', 1, 'VeChain', NULL, 'digital_vechain_20181024_203203.jpg', 'Vechain (VEN) is a cryptocurrency and blockchain platform that is targeting the Internet of Things. VeChain allows manufacturers to assign products with RFID (radio-frequency identification) identifiers which record information across the supply chain. RFID information becomes subsequently available on the VeChain blockchain. The objective of VeChain is to make the supply chain more efficient, transparent and cost effective by using blockchain technologies.\r\n\r\n', 'https://www.vechain.com/', 937872403, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'support@vechain.com', NULL, '', '', 'https://twitter.com/vechainofficial', 'https://www.facebook.com/vechainfoundation', '', '', NULL, NULL, 'https://coinmarketcap.com/currencies/vechain/#social', '', '0', 0, 1, NULL, '2018-01-23 22:35:47', '2018-10-24 20:32:03', 0),
(252, 43, 'BOP000252', 2, 'Utemis', NULL, 'ico_utemis_20180420_113804.jpg', 'This is a Latin American e-commerce that decentralizes businesses into one market.', '', 0, NULL, '200000000000', '', '', '2018-03-01', '2018-04-30', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/UTEMISUTS', 'https://www.facebook.com/utemiskrypto/', '', '', NULL, NULL, '', '', '0', 0, 1, NULL, '2018-03-09 00:11:44', '2018-04-20 11:38:04', 0),
(253, 43, 'BOP000253', 2, 'KWHCoin', NULL, '20180309_014847.png', 'KWHCoin is a cryptocurrency backed by renewable energy.  The energy is obtained from sensor readings, green button data and smart meters.', 'https://kwhcoin.com/#/', 0, NULL, '', '195,000,000', '', '2018-02-08', '2018-03-08', '20:00', '23:30', '', NULL, 'contact@KWHCoin.com', NULL, NULL, 'https://kwhcoin.slack.com/', 'https://twitter.com/KwhCoin', 'https://www.facebook.com/KWHCoin/', 'https://github.com/kwhcoindev/kwhcoin', '', NULL, NULL, '', '3031 Tisch Way,\r\n110 Plaza West\r\nSan Jose CA, 95128', '0', 0, 1, NULL, '2018-03-09 01:48:56', '2018-09-23 07:24:21', 0),
(254, 43, 'BOP000254', 2, 'Crowd Machine', NULL, 'ico_crowd_machine_20181101_012307.jpg', 'Crowd Machine is an app development engine allowing users to create decentralized apps and smart contracts without coding.', 'https://www.crowdmachine.com/', 0, NULL, '2000000000', '', '', '2018-04-01', '2018-05-22', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/Crowd_Machine', 'https://www.facebook.com/Crowd-Machine-393354234414159/', '', '', NULL, NULL, '', '', '0', 0, 1, NULL, '2018-03-09 03:31:06', '2018-11-01 01:23:07', 0),
(255, 43, 'BOP000255', 2, 'MedChain', NULL, 'ico_medchain_20181101_015733.jpeg', 'A storage platform for electronic medical records.', '', 0, NULL, '', '', '', '2018-04-11', '2018-07-11', '16:30', '23:30', '', NULL, 'info@MedChain.us', NULL, '', '', 'https://twitter.com/medchaininc', 'https://www.facebook.com/MedChainOfficial/', '', '', NULL, NULL, '', '9555 Maroon Circle Englewood, CO 80112', '0', 0, 1, NULL, '2018-03-09 04:23:54', '2018-11-01 01:57:33', 0),
(256, 43, 'BOP000256', 2, 'Moneto', NULL, '', 'Moneto is a loan service secured by bitcoin.', 'https://mone.to/', 0, NULL, '3950000', '3000000', '', '2018-04-10', '2018-07-09', '13:00', '23:30', '', NULL, 'admin@email.com', NULL, NULL, '', 'https://twitter.com/monetoteam', 'https://www.facebook.com/Moneto-ICO-210668832840975/', '', '', NULL, NULL, '', '', '0', 0, 1, NULL, '2018-03-09 04:33:02', '2018-03-13 01:25:45', 0),
(257, 43, 'BOP000257', 2, 'Oris.Space', NULL, 'ico_oris.space_20180420_113719.jpg', 'Oris.Space is a platform for organizing prediction markets, gaming algorithms and social research.', 'https://orisspace.io/eng/', 0, NULL, '', '', '', '2018-03-21', '2018-07-07', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/AKolokhmatov', 'https://www.facebook.com/oris.space/', 'https://github.com/oris-space', '', NULL, NULL, '', '', '0', 0, 1, NULL, '2018-03-09 08:58:32', '2018-04-20 11:37:19', 0),
(258, 43, 'BOP000258', 2, 'TRIPBIT ', NULL, 'ico_tripbit__20180420_113750.jpg', 'TRIPBIT is a cryptocurrency for traveling such as real time booking, ticket reselling services and no double booking.', 'https://www.tripbit.info/', 0, NULL, '700000000', '', '', '2018-03-21', '2018-07-03', '0:00', '23:30', '', NULL, 'support@tripbit.info', NULL, '', '', 'https://twitter.com/tripbitico', 'https://facebook.com/tripbitico', '', '', NULL, NULL, '', '', '0', 0, 1, NULL, '2018-03-09 09:17:15', '2018-04-20 11:37:50', 0),
(259, 43, 'BOP000259', 2, 'ZeroState', NULL, '', 'ZeroState is an emotional intelligence platform that is blockchain based.      Benefits include: users getting paid for writing reviews, \r\n advertisers attract users looking for specific emotions and get loyal customer reviews,  search engine improvement on how it feels rather than what and search for soulmates instead of common interests.', '', 0, NULL, '100,000,000', '', '', '2018-03-21', '2018-06-30', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, NULL, '', 'https://twitter.com/ZeroStateDapp', 'https://www.facebook.com/zerostate.info/', 'https://github.com/0stateapp', 'https://t.me/zero_state_news', NULL, NULL, '', '', '0', 0, 1, NULL, '2018-03-09 10:14:49', '2018-03-13 01:26:01', 0),
(260, 43, 'BOP000260', 2, 'KINEKT', NULL, '', 'KINEKT is a Blockchain integrated touch terminal that processes multiple transactions using a fingerprint and pin.  The terminal allows:cryptocurrency transactions, mobile wallet transactions, bank card transactions, loyalty transactions, unbanked transactions and charity transactions.', '', 0, NULL, '1,000,000,000', '', '', '2018-04-03', '2018-07-31', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, NULL, 'https://kinekt-terminals.slack.com/home', 'https://twitter.com/kinekt_hq', '', '', 'https://t.me/kinekt_terminals', NULL, NULL, '', '473 Alexander Street, Pretoria, Gauteng 0181, South Africa', '0', 0, 1, NULL, '2018-03-12 05:06:16', '2018-03-13 01:25:30', 0),
(267, 1, 'BOP000267', 1, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', NULL, '', '?8??(%???\"D???4j?0u2js??MY??????S???? ?)f???C????y??	I<\ry\0???!+??E????fMy?k?????K?5=|?t ??G)?s??U??tB??)???', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '', '', '', NULL, NULL, '', '', '0', 0, 2, 0, '2018-03-21 08:46:40', '2018-03-21 16:44:58', 0),
(362, 1, 'BOP000362', 1, 'Cardano', NULL, 'digital_cardano_20181024_100043.png', 'Cardano is a decentralized block platform on opensource smart contracts, launched in September 2017 by Blockchain Development Output Hong Kong (IOHK). Cardano is developed by the team headed by Charles Hoskinson, the former cofounder of BitShares and Ethereum, and is aimed at the launch of smart contracts, decentralized apps, sidechains, multipart calculations and metadata.', 'https://www.cardano.org/en/home/', 1940054236, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'support@cardano.com', NULL, '', '', 'https://twitter.com/cardanocom', 'https://www.facebook.com/groups/CardanoCommunity', '', 'https://t.me/CardanoAnnouncements', NULL, NULL, 'https://coinmarketcap.com/currencies/cardano/', '', NULL, NULL, 1, 0, '2018-04-07 07:26:13', '2018-10-24 10:08:38', 0),
(363, 43, 'BOP000363', 1, 'Bitcoin Cash', NULL, 'digital_bitcoin_cash_20181024_095227.png', 'Bitcoin Cash is a cryptocurrency. In mid-2017, a group of developers wanting to increase bitcoin\'s block size limit prepared a code change. The change, called a hard fork, took effect on 1 August 2017. As a result, the bitcoin ledger called the blockchain and the cryptocurrency split in two. At the time of the fork anyone owning bitcoin was also in possession of the same number of Bitcoin Cash units.', 'https://www.bitcoincash.org/', 12910804254, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', '', 'https://www.facebook.com/bitcoincashorg', 'https://github.com/bitcoincashorg/website', '', NULL, NULL, 'https://coinmarketcap.com/currencies/bitcoin-cash/#charts', '', '0', 0, 1, 0, '2018-04-18 01:58:24', '2018-10-24 09:52:27', 0),
(364, 43, 'BOP000364', 1, 'Binance Coin', NULL, NULL, 'Binance Coin (BNB) is an ERC20 token issued on the Ethereum blockchain by the popular cryptocurrency exchange Binance. With this cryptocurrency, you can pay a commission for transactions on the exchange. And if you decide to do so, you will receive additional discounts. In the first year, you will be able to get a discount – 50%, in the second – 25%, in the third – 12.5%, in the fourth – 6.75%. The token was established with a total supply of 200 million.\r\n\r\n', 'https://www.binance.com/', 1354628060, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'market@binance.com', NULL, '', '', 'https://twitter.com/binance', 'https://www.facebook.com/binanceexchange', '', '', NULL, NULL, 'https://coinmarketcap.com/currencies/binance-coin/', '', '0', 0, 1, 0, '2018-04-18 02:11:26', '2018-10-24 20:29:30', 0),
(365, 43, 'BOP000365', 1, 'Ontology', NULL, NULL, 'Ontology is a new high-performance public blockchain project & a distributed trust collaboration platform. Ontology provides new high-performance public blockchains that include a series of complete distributed ledgers and smart contract systems. Ontology blockchain framework supports public blockchain systems and is able to customize different public blockchains for different applications. Ontology supports collaboration amongst chain networks with its various protocol groups.\r\n\r\n', 'https://ont.io/', 794094640, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'contact@ont.io', NULL, 'https://discord.gg/4TQujHj', '', 'https://twitter.com/OntologyNetwork', 'https://www.facebook.com/Ontology-Network-468098413590227/', '', 'https://t.me/OntologyNetwork', NULL, NULL, 'https://coinmarketcap.com/currencies/ontology/', '', '0', 0, 1, 0, '2018-04-18 02:28:08', '2018-10-24 20:44:34', 0),
(366, 43, 'BOP000366', 1, 'NEO', NULL, 'digital_neo_20181018_092013.png', 'NEO is China\'s non-profit community-based blockchain project managing digital assets with digital identity using smart contracts.', 'https://neo.org/', 3388950500, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'contact@neo.org', NULL, 'https://discord.gg/DtzSb2Z', '', 'https://twitter.com/neo_blockchain', 'https://www.facebook.com/NEOSmartEcon/', 'https://github.com/neo-project', '', NULL, NULL, 'https://coinmarketcap.com/currencies/neo/', '', '0', 0, 1, 0, '2018-04-24 20:16:48', '2018-10-18 09:20:13', 0),
(367, 43, 'BOP000367', 1, 'Tron', NULL, 'digital_tron_20181024_100918.png', 'TRON is a blockchain-based, decentralized protocol project with an internal TRON (TRX) coin that aims to be a content distribution platform for the digital entertainment industry. Tron is designed to ultimately make entertainment content both easier to sell and cheaper to consume. In theory, this goal is achieved by putting the content on a blockchain and the creators and consumers in a network of peers, eliminating the middleman.', 'https://tron.network/enindex.html', 4634959154, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', 'https://tronfoundation.slack.com', 'https://twitter.com/Tronfoundation', 'https://www.facebook.com/tronfoundation', 'https://github.com/tronprotocol', 'https://t.me/tronnetworkEN', NULL, NULL, 'https://coinmarketcap.com/currencies/tron/', '', '0', 0, 1, 0, '2018-04-25 00:45:16', '2018-10-24 10:09:18', 0),
(368, 43, 'BOP000368', 1, 'Bitcoin Gold', NULL, NULL, 'Bitcoin Gold (BTG) is a hardfork of the cryptocurrency Bitcoin. The fork occurred in late October 2017. The purpose of the fork is to create an ASIC resistant Bitcoin, by reusing Equihash proof-of-work algorithm from Zcash. There are any number of reasons for cryptocurrencies to experience a hard fork, including improvements to the code, differences among developers, or changing goals. In the case of Bitcoin Gold, the stated purpose for the fork was to “Make Bitcoin decentralized again.\"', 'https://bitcoingold.org', 1519124154, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'support@bitcoingold.org', NULL, 'https://discord.gg/HmVUU6S', '', 'https://twitter.com/bitcoingold', 'https://www.facebook.com/bitcoingoldofficial/', 'https://github.com/BTCGPU/BTCGPU', 'https://t.me/BitcoinGoldHQ', NULL, NULL, 'https://coinmarketcap.com/currencies/bitcoin-gold/', '', '0', 0, 1, 0, '2018-04-25 01:31:52', '2018-10-24 20:42:11', 0),
(374, 1, 'BOP000374', 1, 'Bitcoin', NULL, 'digital_bitcoin_20181026_102242.png', 'Bitcoin is a cryptocurrency, a form of electronic cash. It is a decentralized digital currency without a central bank or single administrator that can be sent from user-to-user on the peer-to-peer bitcoin network without the need for intermediaries. Transactions are verified by network nodes through cryptography and recorded in a public distributed ledger called a blockchain.', 'https://bitcoin.org', 97021394433, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, '', NULL, '', 'https://bitcoincoreslack.herokuapp.com/', '', '', 'https://github.com/bitcoin', '', NULL, NULL, 'https://coinmarketcap.com/currencies/bitcoin/', '', NULL, NULL, 1, 0, '2018-05-15 09:34:15', '2018-11-15 02:04:12', 0),
(375, 91, 'BOP000375', 1, 'Tezos', NULL, 'digital_tezos_20181024_202938.png', 'Tezos is a secure, future-proof smart contract system. Because Tezos has a built-in consensus mechanism, its protocol can evolve, and incorporate new innovations over time, without the risk of hard forks splitting the market. Tezos relies on a less onerous, less computationally intensive, and less power-consuming proof-of-stake consensus algorithm, where bonded stakeholders validate transactions.\r\n\r\nToken use - XTZ (Tezzies) is used as transaction fee', 'https://www.tezos.com/', 745100573, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/tezos', '', '', '', NULL, NULL, 'https://coinmarketcap.com/currencies/tezos/#charts', '', '0', 0, 1, 0, '2018-09-21 02:41:56', '2018-10-24 20:29:38', 0),
(376, 91, 'BOP000376', 1, 'Nano', NULL, 'digital_nano_20181024_204747.png', 'Nano is a cryptocurrency that was formerly called Raiblocks and focuses on providing payment solutions. Nano counts with instant transactions, zero transaction fees and a high degree of scalability. Nano transactions happen immediately, so it\'s a currency you can use every day for purchases large or small. Nano has zero fees on whatever you buy, from bus ticket to business class flight. Nano can process over 1000x more transactions per second than Bitcoin, so you\'ll never get stuck in a queue.\r\n', 'https://nano.org/en', 234713876, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'press@nano.co', NULL, 'https://chat.nano.org/', '', 'https://twitter.com/nano', '', 'https://github.com/nanocurrency', '', NULL, NULL, 'https://coinmarketcap.com/currencies/nano/', '', '0', 0, 1, 0, '2018-09-21 03:03:45', '2018-11-14 02:15:14', 0),
(377, 91, 'BOP000377', 1, 'Ontology', NULL, 'digital_ontology_20180921_034804.jpg', 'Ontology is a high performance public blockchain project and a trust collaboration platform.', 'https://ont.io/', 317225208, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'contact@ont.io', NULL, 'https://discord.gg/4TQujHj', '', 'https://twitter.com/OntologyNetwork', 'https://www.facebook.com/Ontology-Network-468098413590227/', 'https://github.com/ontio', 'https://t.me/OntologyNetwork', NULL, NULL, 'https://coinmarketcap.com/currencies/ontology/', '', NULL, NULL, 0, 0, '2018-09-21 03:48:04', '2018-09-21 03:48:04', 0);
INSERT INTO `bop_compaines` (`cm_id`, `cm_uid`, `cm_unique_id`, `cm_ctid`, `cm_name`, `cm_apiname`, `cm_picture`, `cm_decript`, `cm_siteurl`, `cm_marketcap`, `cm_escrow`, `cm_total_token_supply`, `cm_tokens_available_crowd_sale`, `cm_inflation`, `cm_ico_start_date`, `cm_ico_end_date`, `cm_ico_start_time`, `cm_ico_end_time`, `cm_ico_conditions`, `cm_mobile`, `cm_email`, `cm_resources`, `cm_discord`, `cm_slack`, `cm_twitter`, `cm_facebook`, `cm_github`, `cm_telegram`, `cm_google_plus`, `cm_linkedin`, `cm_coinmarket_cap`, `cm_address`, `cm_overallrating`, `cm_totalviews`, `cm_status`, `cm_approval`, `cm_caretedat`, `cm_modifiedat`, `cm_cron_checker`) VALUES
(378, 1, 'BOP000378', 1, 'Maker', NULL, 'digital_maker_20181024_203259.png', 'Maker (MKR) is a digital token created on the Ethereum platform of the project Maker, the main purpose of which is to create a line of decentralized digital assets that would be tied to the value of real instruments such as currency, gold, etc. On Maker platform, it is planned to create an exchange where it would be possible to carry out margin trading of tokens on the ERC20 Protocol. Maker\'s objective is to minimize the price volatility of its own stablecoin Dai, against the U.S. Dollar.\r\n', 'https://makerdao.com/', 322543710, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/MakerDAO', '', '', 'https://t.me/MakerdaoMKR', NULL, NULL, 'https://coinmarketcap.com/currencies/maker/#charts', '', NULL, NULL, 1, 0, '2018-09-22 23:41:45', '2018-10-24 20:32:59', 0),
(379, 1, 'BOP000379', 1, 'Aeternity', NULL, 'digital_aeternity_20181024_204703.png', 'Aeternity is ?n open-source decentralized apps platform utilizing next generation, highly scalable, public blockchain technology. Its off-chain smart contracts use real-world and real-time data by interacting with built-in oracles. Aeternity’s primary goals are to deliver unmatched efficiency, transparent governance, and global scalability.', 'https://www.aeternity.com/', 234374039, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/aeternity', 'https://www.facebook.com/aeternityproject/', 'https://github.com/aeternity', 'https://telegram.me/aeternity', NULL, NULL, 'https://coinmarketcap.com/currencies/aeternity/', '', NULL, NULL, 1, 0, '2018-09-23 00:08:07', '2018-10-24 20:47:03', 0),
(380, 1, 'BOP000380', 1, 'Zilliqa', NULL, 'digital_zilliqa_20181024_204940.png', 'Zilliqa is a scalability-focused, blockchain-based payment processing and decentralized application (dapp) platform based on sharding. Sharding refers to dividing the network into smaller subnetworks that can process transactions and execute computing operations in parallel. Unlike other platforms in which transaction rates decrease as the network grows, Zilliqa transaction speeds will theoretically increase as the number of network nodes increases.', 'https://www.zilliqa.com/', 276405890, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'enquiry@zilliqa.com', NULL, '', 'https://invite.zilliqa.com/', 'https://twitter.com/zilliqa', '', 'https://github.com/Zilliqa/Zilliqa', 'https://t.me/zilliqachat', NULL, NULL, 'https://coinmarketcap.com/currencies/zilliqa/', '', NULL, NULL, 1, 0, '2018-09-23 00:33:59', '2018-10-24 20:49:40', 0),
(381, 1, 'BOP000381', 1, 'Elastos', NULL, 'digital_elastos_20181018_092554.png', 'Elastos is the new smart web operating system where decentralized applications are detached from the internet with full scalability to users.', 'https://www.elastos.org/', 57656922, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'contact@elastos.org', NULL, '', 'https://elastos.slack.com/', 'https://twitter.com/Elastos_org', 'https://www.facebook.com/elastosorg/', 'https://github.com/elastos', 'https://t.me/elastosgroup', NULL, NULL, 'https://coinmarketcap.com/currencies/elastos/', '', NULL, NULL, 1, 0, '2018-10-03 03:03:26', '2018-10-18 09:25:54', 0),
(382, 1, 'BOP000382', 1, 'Dragonchain', NULL, 'digital_dragonchain_20181018_092341.png', 'Dragonchain is a hybrid blockchain platform for businesses', 'https://dragonchain.com/', 57964975, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/dragonchaingang', 'https://facebook.com/Dragonchaingang/', 'https://github.com/dragonchain/dragonchain', 'https://t.me/dragontalk', NULL, NULL, 'https://coinmarketcap.com/currencies/dragonchain/', '', NULL, NULL, 1, 0, '2018-10-03 03:22:42', '2018-10-18 09:23:41', 0),
(383, 1, 'BOP000383', 1, 'Cortex', NULL, 'digital_cortex_20181019_043116.png', 'Cortex blockchain is a decentralized autonomous artificial intelligence platform.  Developers can upload their models to be integrated into smart contracts.', 'http://www.cortexlabs.ai/', 45154794, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'support@cortexlabs.ai', NULL, '', '', 'https://twitter.com/CTXCBlockchain', 'https://www.facebook.com/CTXCBlockchain', '', 'https://t.me/CortexBlockchain', NULL, NULL, 'https://coinmarketcap.com/currencies/cortex/', '', NULL, NULL, 1, 0, '2018-10-03 04:05:27', '2018-10-19 04:32:52', 0),
(384, 1, 'BOP000384', 1, '0x', NULL, 'digital_0x_20181026_025809.jpg', '0x (ZRX) is a protocol that allows for decentralized exchange of tokens and assets issued on the Ethereum blockchain. Developers can use 0x to create their own applications for cryptocurrency exchange with a wide range of functions, for example, the ability to conduct over-the-counter trading of tokens issued on the Ethereum blockchain.\r\n', 'https://0xproject.com/', 461085470, NULL, '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, '', NULL, 'team@0xproject.com', NULL, '', '', 'https://twitter.com/0xproject', '', '', '', NULL, NULL, 'https://coinmarketcap.com/currencies/0x/', '', NULL, NULL, 1, 0, '2018-10-26 02:58:10', '2018-11-08 20:16:43', 0),
(385, 1, 'BOP000385', 1, 'Bitcoin Diamond', 'bitcoin-diamond', 'digital_bitcoin_diamond_20181026_030603.png', 'Bitcoin Diamond is a hard fork of the cryptocurrency Bitcoin. The fork occurred in November 2017. The difference between Bitcoin and Bitcoin Diamond is that they multiplied the supply by 10, meaning that if you had 1 BTC before block 495866, you received 10 BCD. The code appears to be very similar to the Bitcoin Core code. The developers remain anonymous.', 'https://btcd.io/', 284906505, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, '', 'https://bitcoindiamond.slack.com/messages/C8GHHC6DN/team/', 'https://twitter.com/BitcoinDiamond_', '', 'https://github.com/eveybcd/BitcoinDiamond', 'https://t.me/BCDcommunity', NULL, NULL, 'https://coinmarketcap.com/currencies/bitcoin-diamond/', '', NULL, NULL, 1, 0, '2018-10-26 03:06:03', '2018-10-26 03:06:03', 0),
(387, 1, 'BOP000387', 1, 'Bytom', NULL, 'digital_bytom_20181026_032413.png', 'The objective of Bytom is to bridge the digital world and the physical world, and to build a decentralized network where various digital and physical assets can be registered and exchanged. Various assets such as warrants, securities, dividends, bonds, intelligence information, forecasting information and other information that exist in the physical world can be registered, exchanged, gambled via Bytom.\r\n\r\nCoin use - BTM token can be used for Transaction fees, Dividends, Asset issuance deposits.', 'http://bytom.io/', 207639530, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'contact@bytom.io', NULL, '', '', '', '', 'https://github.com/Bytom/bytom', '', NULL, NULL, 'https://coinmarketcap.com/currencies/bytom/', '', NULL, NULL, 1, 0, '2018-10-26 03:24:13', '2018-10-26 03:24:13', 0),
(388, 1, 'BOP000388', 1, 'Pundi X', 'pundi-x', 'digital_pundi_x_20181026_033236.png', 'Pundi X is the world\'s largest decentralized offline cryptocurrency sales network. The project provides the first comprehensive solution for the sale of cryptocurrencies online and offline, including decentralized sales network, multicurrency wallet, decentralized trading platform,  ICO platform, off-line. Pundi X is designed to help investors, developers, exchanges, companies, as well as ordinary consumers with the purchase of cryptocurrencies, making it as simple and convenient as possible.\r\n', 'https://pundix.com/', 203557851, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'contact@pundix.com', NULL, '', '', 'https://twitter.com/PundiXLabs', 'https://web.facebook.com/pundixlabs/', '', 'https://t.me/Pundix', NULL, NULL, 'https://coinmarketcap.com/currencies/pundi-x/', '', NULL, NULL, 1, 0, '2018-10-26 03:32:36', '2018-10-26 03:32:36', 0),
(389, 1, 'BOP000389', 1, 'TrueUSD', NULL, 'digital_trueusd_20181026_043447.png', 'TrueUSD is a USD-backed ERC20 stablecoin that is fully collateralized, legally protected, and transparently verified by third-party attestations. TrueUSD uses multiple escrow accounts to reduce counterparty risk and to provide token-holders with legal protections against misappropriation.\r\n\r\nToken use - can be used as a stable coin with 1:1 parity against USD.', 'https://www.trusttoken.com/', 176905878, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'hello@trusttoken.com', NULL, '', '', 'https://twitter.com/TrustToken', 'https://www.facebook.com/TrustToken/?fref=ts', 'https://github.com/trusttoken', 'https://t.me/joinchat/HihkMkTja1gIyBRM1J1_vg', NULL, NULL, 'https://coinmarketcap.com/currencies/trueusd/', '', NULL, NULL, 1, 0, '2018-10-26 04:34:47', '2018-10-26 04:34:47', 0),
(390, 1, 'BOP000390', 1, 'Holo', NULL, 'digital_holo_20181026_044132.png', 'Holochain provides a framework for developers to build decentralized applications and aims to change the paradigm of data-centric blockchains to an agent-centric system. In Holochain’s fledgeling system, no true global consensus is maintained. Instead, each agent in the public blockchain maintains a private fork, essentially, that is managed and stored in a limited way on the public blockchain with a distributed hash table. This means there are no scalability limits.', 'https://holochain.org/', 147574383, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/holochain', 'https://www.facebook.com/holochain.design/', 'https://github.com/holochain/holochain-proto', 'https://chat.holochain.net/appsup/channels/app-dev', NULL, NULL, 'https://coinmarketcap.com/currencies/holo/', '', NULL, NULL, 1, 0, '2018-10-26 04:41:33', '2018-10-26 04:41:33', 0),
(391, 1, 'BOP000391', 1, 'Metaverse ETP', 'metaverse', NULL, 'Metaverse (ETP) is a decentralised platform of smart properties and digital identities, based on public blockchain technology. It is initially developed and supported by the development team from Viewfin, it is a project under MIT licenses agreement.\r\n\r\nToken use - ETP is the token used on Metaverse and can be used to measure the value of smart properties in Metaverse or as collateral in financial transactions. ETP is also used to pay transaction and other fees applied on Metaverse.', 'https://mvs.org/', 161235496, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, 'https://discordapp.com/invite/ubgMRts', '', 'https://twitter.com/mvs_org', 'https://www.facebook.com/mvsofficial/', 'https://github.com/mvs-org', 'https://t.me/Metaverse_Blockchain', NULL, NULL, 'https://coinmarketcap.com/currencies/metaverse/', '', NULL, NULL, 1, 0, '2018-10-26 04:47:41', '2018-10-26 04:47:41', 0),
(392, 1, 'BOP000392', 1, 'Electroneum', NULL, 'digital_electroneum_20181026_050255.png', 'Electroneum (ETN) is a mobile cryptocurrency, that allows mining and offers a wallet for smartphones, designed for simplicity. They have developed an iOS and Android app that not only contains easy wallet functions, but also allows a smartphone mobile mining experience to let anybody get into cryptocurrency within minutes of downloading a free app. Their blockchain has been specifically chosen and modified to limit the ability of ASIC and GPU miners.\r\n', 'http://electroneum.com/', 117557059, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/electroneum', 'https://www.facebook.com/electroneum', '', 'https://t.me/joinchat/DxoSakHOdk5mqsE-LelfVg', NULL, NULL, 'https://coinmarketcap.com/currencies/electroneum/', 'Dun and Bradstreet No. 223070089 - Lyndean House, 30-34 Albion Place, Maidstone, Kent, ME14 5DZ United Kingdom', NULL, NULL, 1, 0, '2018-10-26 05:02:55', '2018-10-26 05:02:55', 0),
(393, 1, 'BOP000393', 2, 'Filmgrid', NULL, 'ico_filmgrid_20181101_012936.png', 'Decentralizing the movie industry for users to stream and finance independent films on the internet.', 'https://filmgrid.space/', 0, NULL, '', '', '', '2018-12-16', '2019-10-31', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/FilmgridSpace', 'https://www.facebook.com/filmgrid/', '', 'https://t.me/filmgrid', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-10-27 00:56:12', '2018-11-01 01:29:36', 0),
(394, 1, 'BOP000394', 2, 'Oasis', NULL, 'ico_oasis_20181101_020447.jpg', 'Develops Brain-Computer interface and training programs.', 'http://oasis.ac/', 0, NULL, '', '1000000000', '', '2019-06-03', '2019-09-09', '0:00', '23:30', '', NULL, 'info@oasis.ac', NULL, '', '', 'https://twitter.com/@oasis_ac', 'http://fb.me/Oasis.ac.neuro', '', 'https://t.me/oasis_ac', NULL, NULL, '', '105064, Moscow, Gorokhovsky Pereulok, 5.', NULL, NULL, 1, 0, '2018-10-27 01:03:37', '2018-11-01 02:04:47', 0),
(395, 1, 'BOP000395', 2, 'BitCanna', NULL, 'ico_bitcanna_20181101_010217.png', 'A decentralized payment system for the legal cannabis industry.  Agreements with major companies have been in place which is now called BitCanna Alliance.', 'https://www.bitcanna.io/', 0, NULL, '', '', '', '2018-11-01', '2019-06-30', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://www.twitter.com/BitcannaGlobal', 'https://www.facebook.com/BitCanna/', 'https://www.github.com/BitCannaGlobal', 'https://t.me/joinchat/F4JfThITJB3cU-uaCwtKlQ', NULL, NULL, '', 'Nieuwezijds Voorburgwal 101 – 3\r\n1012 RG Amsterdam\r\nThe Netherlands', NULL, NULL, 1, 0, '2018-10-27 01:11:11', '2018-11-01 01:02:17', 0),
(396, 1, 'BOP000396', 2, 'BehaviourExchange', NULL, 'ico_behaviourexchange_20181101_005747.jpg', 'A platform for customizing websites content for each individual.  Businesses show content that the user is interested in.  Each time web users enter into a website, they will be satisfied by the content they see as it\'s their interest.', 'https://behaviour.exchange/en/', 0, NULL, '', '270000000', '', '2018-11-19', '2019-05-15', '0:00', '23:30', '', NULL, 'contact@behaviour.exchange', NULL, '', '', 'https://twitter.com/BEX_tokens', 'https://www.facebook.com/BehaviourExchange-150375779045471/', '', 'https://t.me/behaviourexchange', NULL, NULL, '', 'I.R.V. d.o.o.\r\nLeskoškova 12\r\n1000 Ljubljana\r\nSlovenia', NULL, NULL, 1, 0, '2018-10-27 01:18:16', '2018-11-01 00:57:47', 0),
(397, 1, 'BOP000397', 2, 'Börser', NULL, 'ico_b__rser_20181101_010728.jpg', 'A cryptocurrency backed by shares of Börser S.A.  It\'s allowing users to be apart of three other projects, Mi Wall Street, CrowdingFunds and X-Change since Börser holds these shares.', 'https://borser.cr/index.php#home', 0, NULL, '', '', '', '2019-01-01', '2019-03-31', '0:00', '23:30', '', NULL, 'join@borser.cr', NULL, '', '', 'https://twitter.com/BORSERcr', 'https://www.facebook.com/BORSERcr', 'https://github.com/BORSER-cr', 'https://t.me/joinchat/ISDMclNeM7kMXq0Qwt0eXw', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-10-27 01:36:16', '2018-11-01 01:07:29', 0),
(398, 1, 'BOP000398', 2, 'RAWG', NULL, 'ico_rawg_20181101_021152.png', 'A video game platform with over 56,000 games.  Gamers are rewarded with RAWG tokens.', 'https://token.rawg.io/en/', 0, NULL, '', '', '', '2019-03-07', '2019-04-15', '0:30', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/rawgtheworld', 'https://facebook.com/rawgtheworld/', '', 'https://t.me/RAWGeng', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-10-27 02:30:47', '2018-11-01 02:11:52', 0),
(399, 1, 'BOP000399', 2, 'Clarity', NULL, 'ico_clarity_20181101_011514.png', 'A management platform for small businesses, accountants, advisors and institutional investors to be in control of their data.', 'https://www.clarityproject.io/', 0, NULL, '80000000', '', '', '2019-02-14', '2019-04-08', '0:00', '23:30', '', NULL, 'info@clarityproject.io', NULL, '', '', 'https://twitter.com/theCLRTYproject', 'https://www.facebook.com/theCLRTYproject/', 'https://github.com/CLRTY-Token', 'https://t.me/theCLRTYproject', NULL, NULL, '', 'Jersey, Channel Islands', NULL, NULL, 1, 0, '2018-10-30 02:34:28', '2018-11-01 01:15:14', 0),
(400, 1, 'BOP000400', 2, 'Alluma', NULL, 'ico_alluma_20181101_005332.jpg', 'Emerging markets exchange to buy, sell or trade cryptocurrency securely.  ', 'https://www.alluma.io/', 0, NULL, '500000000', '', '', '2019-01-15', '2019-02-28', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/allumaexchange', 'https://www.facebook.com/alluma', '', 'https://t.me/allumaexchange', NULL, NULL, '', '70, Sohna Rd, Sector 48, Gurugram, Haryana 122004 \r\n59 New Bridge Rd, Singapore 059405', NULL, NULL, 1, 0, '2018-10-30 02:48:25', '2018-11-01 00:53:32', 0),
(401, 1, 'BOP000401', 2, 'WeBuy', NULL, 'ico_webuy_20181101_025604.png', 'An advertising platform for buyers and sellers.', 'https://wby.io/', 0, NULL, '', '', '', '2019-01-07', '2019-02-16', '0:00', '23:30', '', NULL, 'info@wby.io', NULL, 'https://discord.gg/2RwAc3P', '', 'https://twitter.com/@wby_io', 'http://www.facebook.com/wbyio', '', 'https://t.me/joinchat/AkMS_kXOxHrk7FZoF4Q6wg', NULL, NULL, '', 'WeBuy UK LIMITED, 35 Great St. Helen‘s, London, EC3A 6AP, UK', NULL, NULL, 1, 0, '2018-10-30 02:57:28', '2018-11-01 02:56:04', 0),
(402, 1, 'BOP000402', 2, 'Holiday Coin', NULL, 'ico_holiday_coin_20181101_015401.jpg', 'A cryptocurrency for the travel booking platform TripByCoin.com. ', 'https://hldycoin.com/', 0, NULL, '240000000', '', '', '2018-11-15', '2019-02-15', '0:00', '23:30', '', NULL, 'info@hldycoin.com', NULL, '', '', 'https://twitter.com/@hldycoin', '', 'https://github.com/hldycoin', 'https://t.me/hldyico', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-10-30 03:13:07', '2018-11-01 01:54:01', 0),
(403, 1, 'BOP000403', 2, 'Pantercon', NULL, 'ico_pantercon_20181101_020905.jpg', 'A platform for start-up founders to secure capital without using banks.', 'https://pantercon.com/', 0, NULL, '1000000000', '', '', '2018-11-01', '2019-01-31', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, 'https://discord.gg/3edR7Gk', '', 'https://twitter.com/pantercon', 'https://www.facebook.com/Pantercon-1932266703739338', '', 'https://t.me/Pantercon_Chat', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-10-30 03:33:28', '2018-11-01 02:09:05', 0),
(404, 1, 'BOP000404', 2, 'Moozicore', NULL, 'ico_moozicore_20181101_020120.png', 'A music streaming service for businesses.  Customers can control the background music in businesses by using MooziCoins with the mobile app.', 'https://tokensale.moozicore.com/', 0, NULL, '1000000000', '', '', '2018-11-26', '2019-01-29', '0:00', '23:30', '', NULL, 'contact@moozicore.com', NULL, '', '', 'https://twitter.com/Moozicore', 'https://www.facebook.com/Moozicore/', 'https://github.com/Moozicore', 'https://t.me/moozicore', NULL, NULL, '', '', '0', 0, 1, 0, '2018-10-30 03:45:14', '2018-11-01 02:01:20', 0),
(405, 1, 'BOP000405', 2, 'Terra Virtua', NULL, 'ico_terra_virtua_20181101_023910.jpg', 'A VR entertainment platform where everything can be bought and sold using the TERRA token.', 'https://www.terravirtua.io/', 0, NULL, '', '', '', '2018-11-20', '2019-01-20', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/terra_virtua', 'https://www.facebook.com/Terra-Virtua-2000931300180443', '', 'https://t.me/TerraVirtua', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-10-30 03:59:18', '2018-11-01 02:39:10', 0),
(406, 1, 'BOP000406', 2, 'Gallactic', NULL, 'ico_gallactic_20181101_014611.jpg', 'A blockchain platform using Smart Chain technology.', 'https://gallactic.io/', 0, NULL, '', '', '', '2018-11-01', '2019-01-30', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/gallacticbc', 'https://www.facebook.com/gallactic2u/', '', 'https://t.me/gallactic', NULL, NULL, '', 'Republic Plaza, 9, Raffles Place, Singapore 048619', NULL, NULL, 1, 0, '2018-10-31 02:03:26', '2018-11-01 01:46:11', 0),
(407, 1, 'BOP000407', 2, 'SISHUB', NULL, 'ico_sishub_20181101_021606.jpeg', 'An ecosystem for data sharing, payment transactions and messaging.', 'https://sishub.network/', 0, NULL, '', '35000000000', '', '2018-11-20', '2019-01-20', '0:00', '23:30', '', NULL, 'info@sishub.network', NULL, '', '', 'https://twitter.com/STEEL_SISHUB', 'https://www.facebook.com/sishubico', 'https://github.com/sishubdev/smartcontracts/blob/master/STEEL_COIN_v1_0_1_without_Mint_.sol', 'https://t.me/SISHUBeng', NULL, NULL, '', 'Machness street 2 Netanya', NULL, NULL, 1, 0, '2018-10-31 02:18:42', '2018-11-01 02:16:06', 0),
(408, 1, 'BOP000408', 2, 'DESICO', NULL, 'ico_desico_20181101_012547.png', 'A security tokens platform.', 'https://www.desico.io/', 0, NULL, '', '', '', '2018-11-07', '2019-01-15', '0:00', '23:30', '', NULL, 'hello@desico.io', NULL, '', '', 'https://twitter.com/desico_io', 'https://www.facebook.com/desico.io/', '', 'https://t.me/desicochat', NULL, NULL, '', '33 Rue la Fayette, 75009 Paris, France\r\n\r\nA. Rotundo st. 5-102, Vilnius / Lithuania', NULL, NULL, 1, 0, '2018-10-31 02:33:00', '2018-11-01 01:25:47', 0),
(409, 1, 'BOP000409', 2, 'Craftcoin', NULL, 'ico_craftcoin_20181101_012154.png', 'A cryptocurrency for the Craftbeer industry.', 'http://www.craftcoin.io/', 0, NULL, '', '', '', '2018-12-12', '2019-01-12', '0:00', '23:30', '', NULL, 'ceo@robin-green.com', NULL, '', '', '', 'https://www.facebook.com/CraftCoin.io/', '', 'https://t.me/joinchat/GupEtxAJiKp8as2UYm_9ug', NULL, NULL, '', 'Schaperstr. 18\r\n10719 Berlin\r\nGermany', NULL, NULL, 1, 0, '2018-10-31 02:42:57', '2018-11-01 01:21:54', 0),
(410, 1, 'BOP000410', 2, 'CoVEX', NULL, 'ico_covex_20181101_011915.jpg', 'A trading platform where users can accept payments, obtain credit options,  exchange cryptocurrencies and use prepaid card services.', 'https://covex.io/', 0, NULL, '250000000', '150000000', '', '2018-11-15', '2018-12-31', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/CoVEXcoin', 'https://www.facebook.com/covexcoin/', '', 'https://t.me/joinchat/FGqocRL7Oj3p-YYV3mu2Ng', NULL, NULL, '', 'International House, 24 Holborn Viaduct,London, EC1A 2BN', NULL, NULL, 1, 0, '2018-10-31 02:51:36', '2018-11-01 01:19:15', 0),
(411, 1, 'BOP000411', 2, 'CDRX', NULL, 'ico_cdrx_20181101_011133.jpeg', 'Exchange platform for coins, CDR\'s ( Crypto Depository Receipt) and tokens.', 'https://cdrx.io/', 0, NULL, '', '', '', '2018-11-05', '2018-12-23', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/cdrxchange', 'https://facebook.com/cdrx.io', '', 'https://t.me/cdrxchange', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-10-31 02:58:19', '2018-11-01 01:11:33', 0),
(412, 1, 'BOP000412', 2, 'W12', NULL, 'ico_w12_20181031_030658.png', 'Blockchain protocol for the creation of milestone-based smart contracts.', 'https://tokensale.w12.io/', 0, NULL, '', '', '', '2018-11-01', '2018-12-12', '0:00', '23:30', '', NULL, 'enquiries@w12.io', NULL, '', '', 'https://twitter.com/w12_io', 'https://www.facebook.com/w12.io/', '', 'https://t.me/w12_io', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-10-31 03:06:58', '2018-10-31 03:06:58', 0),
(413, 1, 'BOP000413', 2, 'HighVibe.Network', NULL, 'ico_highvibe.network_20181101_015158.jpeg', 'A blockchain ecosystem to awaken the human conscience by having uplifting content like meditation and multidimensional learning.', 'https://www.highvibe.network/', 0, NULL, '8000000000', '', '', '2018-11-11', '2018-12-12', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/HighVibeNetwork', 'https://www.facebook.com/highvibe.network/', '', 'https://t.me/highvibenetworktoken', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-10-31 03:25:21', '2018-11-01 01:51:58', 0),
(414, 1, 'BOP000414', 2, 'Twogap', NULL, 'ico_twogap_20181101_024202.jpeg', 'A crypto bonds market.', 'https://twogap.com/', 0, NULL, '', '', '', '2018-11-30', '2018-12-08', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', 'https://twogap.slack.com/', 'https://twitter.com/twogap_official', 'https://www.facebook.com/twogapofficial/', 'https://github.com/twogap', 'https://t.me/twogap', NULL, NULL, '', '', '0', 0, 1, 0, '2018-10-31 03:31:17', '2018-11-09 08:41:58', 0),
(419, 97, 'BOP000419', 1, 'HetaChain', NULL, 'digital_hetachain_20181115_212203.jpeg', 'A blockchain platform with applications across communities.  It\'s a multichain platform that can be hosted wherever the user wants.', 'https://heta.org/', 0, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/heta_org', 'https://www.facebook.com/hetachainofficial', '', 'https://t.me/Hetachain_Community', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-11-15 21:22:03', '2018-11-15 21:22:03', 0),
(415, 97, 'BOP000415', 2, 'Rigoblock', NULL, 'ico_rigoblock_20181115_032512.jpg', 'Rigoblock is an asset management system with full transparency making it easily assessable to everyone.', 'https://rigoblock.com/', 0, NULL, '10000000', '3000000', '', '2018-12-01', '2018-12-31', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, 'https://discord.gg/FXd8EU8', '', 'https://twitter.com/rigoblock', 'https://facebook.com/RigoBlockProtocol', 'https://github.com/rigoblock', 'https://t.me/rigoblockprotocol', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-11-15 03:25:12', '2018-11-15 03:25:12', 0),
(416, 97, 'BOP000416', 2, 'Game X Coin', NULL, 'ico_game_x_coin_20181115_033804.jpg', 'A digital currency for games run on a blockchain platform.  Gamers create games available for others to purchase using this token.', 'https://www.gamexcoin.io/', 0, NULL, '1000000000', '400000000', '', '2018-12-11', '2018-12-15', '0:00', '23:30', '', NULL, 'support@bcventures.io', NULL, '', '', 'https://twitter.com/GXC_Official', '', 'https://github.com/game-x-coin', '', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-11-15 03:38:04', '2018-11-15 03:38:04', 0),
(417, 97, 'BOP000417', 2, 'Soar', NULL, 'ico_soar_20181115_034753.jpeg', 'A decentralized blockchain platform for maps using drones to capture high-resolution images around the globe.', 'https://soar.earth/index.html', 0, NULL, '', '15000000', '', '2018-11-19', '2018-12-03', '0:00', '23:30', '', NULL, 'info@soar.earth', NULL, '', '', 'https://twitter.com/Soar_Earth', 'https://www.facebook.com/SoarEarthOfficial/', 'https://github.com/SoarEarth', 'https://t.me/SoarEarth', NULL, NULL, '', '', '4', 1, 1, 0, '2018-11-15 03:47:53', '2018-11-15 03:47:53', 0),
(418, 97, 'BOP000418', 2, 'CafeCoin', NULL, 'ico_cafecoin_20181115_045357.png', 'A blockchain payment app that is low cost with savings, private and universal.  ', 'https://cafe-coin.com/', 0, NULL, '100000000', '', '', '2018-07-01', '2018-12-23', '0:00', '23:30', '', NULL, 'info@cafe-coin.com', NULL, '', '', 'https://twitter.com/CafeCoinICO', 'https://www.facebook.com/Cafe-Coin-1127820677359367/', '', 'https://t.me/CafeCoin_ICO', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-11-15 04:53:57', '2018-11-15 04:53:57', 0),
(420, 97, 'BOP000420', 1, 'Mithril', NULL, 'digital_mithril_20181115_213039.png', 'A social media token rewarding users content.', 'https://mith.io/', 89597888, NULL, '', '', '', '1970-01-01', '1970-01-01', '', '', '', NULL, 'contact@mith.io', NULL, '', '', 'https://mith.pse.is/B5ES8', 'https://mith.pse.is/9S5MV', '', 'https://mith.pse.is/B6SP4', NULL, NULL, 'https://coinmarketcap.com/currencies/mithril/', '', NULL, NULL, 1, 0, '2018-11-15 21:30:39', '2018-11-16 09:28:44', 0),
(421, 97, 'BOP000421', 2, 'Naitech', NULL, 'ico_naitech_20181115_214551.jpeg', 'Artificial intelligence run on the blockchain for prediction markets in the financial world.', 'https://naitech.io/', 0, NULL, '', '', '', '2018-09-24', '2018-12-23', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/NAiTechOfficial', 'https://www.facebook.com/NAiTech.io/', 'https://github.com/NAi-Tech', 'https://t.me/joinchat/J61oPUhjWBCzZeDWRyVbGQ', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-11-15 21:45:51', '2018-11-15 21:45:51', 0),
(422, 97, 'BOP000422', 2, 'PrimeX', NULL, 'ico_primex_20181115_215240.jpeg', 'A wallet for cryptocurrencies with zero fees, loyalty program and multiple payment options.', 'https://www.primex.cards/', 0, NULL, '100000000', '', '', '2018-06-18', '2018-12-23', '0:00', '23:30', '', NULL, 'support@primex.cards', NULL, '', '', 'https://twitter.com/PrimexCards', 'https://www.facebook.com/www.primex.cards/?modal=admin_todo_tour', '', 'https://t.me/PrimexCards', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-11-15 21:52:40', '2018-11-15 21:52:40', 0),
(423, 97, 'BOP000423', 2, 'Koilop', NULL, 'ico_koilop_20181115_220019.png', 'A decentralized freelance system where buyers/clients can exchange their money for service. ', 'https://www.koilop.com/', 0, NULL, '600000000', '', '', '2018-10-05', '2018-12-23', '0:00', '23:30', '', NULL, 'contact@koilopecosystem.com', NULL, '', '', 'https://twitter.com/KoilopOfficial', 'https://www.facebook.com/KoilopOfficial', 'https://github.com/koiloplimited/smart-contract', 'https://t.me/koilopofficial', NULL, NULL, '', '02-001 Warszawa Al. Jerozolimskie 85/21', NULL, NULL, 1, 0, '2018-11-15 22:00:19', '2018-11-15 22:00:19', 0),
(424, 97, 'BOP000424', 2, 'Genuine Fashion Token', NULL, 'ico_genuine_fashion_token_20181115_221009.jpg', 'A decentralized platform that changes the forged fashion industry without the use of third parties.', 'https://genuinefashiontoken.com/', 0, NULL, '1500000000', '', '', '2018-07-27', '2018-12-24', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/GFToken', 'https://www.facebook.com/genuinefashiontoken/', 'https://github.com/genuinefashion', '', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-11-15 22:10:09', '2018-11-15 22:10:09', 0),
(425, 97, 'BOP000425', 2, 'RENC', NULL, 'ico_renc_20181115_221915.jpeg', 'A P2P car sharing platform with fast and easy decentralized transactions.', 'https://www.rentalcurrency.com/', 0, NULL, '1000000000', '100000000', '', '2018-09-25', '2018-12-26', '0:00', '23:30', '', NULL, 'ferrypilot.jj@gmail.com', NULL, '', '', 'https://twitter.com/tingname/', 'https://www.facebook.com/rentalcurrency/', '', 'https://t.me/RENC_Community', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-11-15 22:19:15', '2018-11-15 22:19:15', 0),
(426, 97, 'BOP000426', 2, 'Ronaldinho Soccer Coin', NULL, 'ico_ronaldinho_soccer_coin_20181115_223938.png', 'A world soccer coin to use for: betting, supporting a team, purchasing digital content, using a training program and more.', 'https://www.soccercoin.eu/', 0, NULL, '350000000', '', '', '2018-08-16', '2018-12-28', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/CoinSoccer', 'https://www.facebook.com/CoinSoccer/', '', 'https://t.me/ronaldinhosoccercoin', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-11-15 22:39:38', '2018-11-15 22:39:38', 0),
(427, 97, 'BOP000427', 2, 'GOODWORK', NULL, 'ico_goodwork_20181115_225207.png', 'An ecosystem for remote teams to help coworkers interact from around the world.', 'https://goodwork.network/', 0, NULL, '7790000', '4050800', '', '2018-06-15', '2018-12-30', '0:00', '23:30', '', NULL, 'info@goodwork.network', NULL, '', '', 'https://twitter.com/goodworkico', 'https://www.facebook.com/goodworkspaces/', 'https://github.com/goodworkico/tokensale', 'https://t.me/goodworkico', NULL, NULL, '', '8 Marina Boulevard #04-01 Marina Bay Financial Centre Tower 1 Singapore 018981', NULL, NULL, 1, 0, '2018-11-15 22:52:07', '2018-11-15 22:52:07', 0),
(428, 97, 'BOP000428', 2, 'Greenblockcoin', NULL, 'ico_greenblockcoin_20181115_230814.jpeg', 'A cryptocurrency for the cannabis industry.', 'https://greenblockcoin.io/', 0, NULL, '1000000000', '', '', '2018-06-30', '2018-12-30', '0:00', '23:30', '', NULL, 'admin@email.com', NULL, '', '', 'https://twitter.com/GreenblockCoin', 'https://www.facebook.com/GBLKcoin', '', '', NULL, NULL, '', '', NULL, NULL, 1, 0, '2018-11-15 23:08:14', '2018-11-15 23:08:14', 0),
(429, 97, 'BOP000429', 2, 'eLocations', NULL, 'ico_elocations_20181115_233922.jpg', 'A commercial real estate market by having properties up to date on their data and information protected by the blockchain.  Landlords and tenants will be informed about their neighbors and connected.', 'https://www.elocations.io/', 0, NULL, '', '', '', '2018-08-22', '2018-12-30', '0:00', '23:30', '', NULL, 'info@eLocations.com', NULL, '', '', 'https://twitter.com/e_locations', 'https://www.facebook.com/realestateontheblockchain', '', 'https://t.me/eLocationsICO', NULL, NULL, '', 'The eLocations Ltd | Crypto Valley Labs | Dammstrasse 16 | 6300 Zug | Switzerland', NULL, NULL, 1, 0, '2018-11-15 23:39:22', '2018-11-15 23:39:22', 0),
(430, 97, 'BOP000430', 2, 'GID Coin', NULL, 'ico_gid_coin_20181116_000928.jpg', 'A cryptocurrency backed by diamond and gold that is always increasing value.', 'https://gidcoin.io/', 0, NULL, '', '', '', '2018-05-01', '2018-12-31', '0:00', '23:30', '', NULL, 'office@gidcoin.io', NULL, '', '', 'https://twitter.com/gid_coin', 'https://www.facebook.com/gidcoin/', 'https://github.com/GIDCoinICO', 'https://t.me/gidcoin', NULL, NULL, '', 'Zug, Switzerland, 6300\r\nGeneva, Switzerland, 6800', NULL, NULL, 1, 0, '2018-11-16 00:09:29', '2018-11-16 00:09:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bop_company_advisoryteam`
--

CREATE TABLE `bop_company_advisoryteam` (
  `adt_id` int(11) NOT NULL,
  `adt_cmid` int(11) DEFAULT NULL,
  `adt_name` varchar(150) DEFAULT NULL,
  `adt_profile_url` varchar(150) DEFAULT NULL,
  `adt_status` tinyint(4) DEFAULT NULL,
  `adt_modifiedat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_company_advisoryteam`
--

INSERT INTO `bop_company_advisoryteam` (`adt_id`, `adt_cmid`, `adt_name`, `adt_profile_url`, `adt_status`, `adt_modifiedat`) VALUES
(28, 15, 'Anand Babu Periasamy', '', 1, '2017-06-15 20:39:48'),
(29, 15, 'Warren Weber', '', 1, '2017-06-15 20:39:48'),
(71, 53, 'Kimberly Sitz', 'https://www.linkedin.com/in/ksitz', 1, '2017-06-28 04:39:11'),
(74, 54, 'Andrew Keys', '', 1, '2017-06-28 05:08:44'),
(75, 54, 'Ron Simons', '', 1, '2017-06-28 05:08:44'),
(76, 57, 'Jack Lu', 'https://www.linkedin.com/in/jack-lu-57995469', 1, '2017-06-30 23:18:53'),
(77, 57, 'Neo Wang', '', 1, '2017-06-30 23:18:53'),
(78, 57, 'Guillermo Pena Panting', 'https://www.linkedin.com/in/guillermo-pe%C3%B1a-panting-b4932712/en', 1, '2017-06-30 23:18:53'),
(90, 77, 'Barry Smith', '', 1, '2017-07-08 20:28:09'),
(91, 77, 'Amnon H. Eden', 'https://www.linkedin.com/in/amnoneden/', 1, '2017-07-08 20:28:09'),
(92, 77, 'Nick Lynch', 'https://www.linkedin.com/in/nickjlynch/?ppe=1', 1, '2017-07-08 20:28:09'),
(93, 77, 'Richard E. Shute', 'https://www.linkedin.com/in/richardeshute/?ppe=1', 1, '2017-07-08 20:28:09'),
(94, 78, 'Tim Lee', '', 1, '2017-07-08 20:33:17'),
(108, 89, 'Tim Draper', 'https://www.linkedin.com/in/timothydraper/', 1, '2017-07-17 21:12:02'),
(109, 89, 'Yariv Gilat', 'https://www.linkedin.com/in/yariv-gilat-620674/?ppe=1', 1, '2017-07-17 21:12:02'),
(110, 89, 'John Henry Clippinger', 'https://www.linkedin.com/in/john-henry-clippinger-5ab1b/', 1, '2017-07-17 21:12:02'),
(111, 89, 'Brock Pierce', 'https://www.linkedin.com/in/brockpierce', 1, '2017-07-17 21:12:02'),
(112, 89, 'Lee Linden', 'https://www.linkedin.com/in/lclinden/', 1, '2017-07-17 21:12:02'),
(113, 89, 'Justin Rosenstein', 'https://www.linkedin.com/in/justinrosenstein/', 1, '2017-07-17 21:12:02'),
(114, 89, 'Yoni Assia', 'http://www.linkedin.com/in/yassia', 1, '2017-07-17 21:12:02'),
(115, 89, 'Roel Wolfert', 'https://www.linkedin.com/in/roelwolfert', 1, '2017-07-17 21:12:02'),
(116, 89, 'Guy Corem', 'https://www.linkedin.com/in/vcorem/?ppe=1', 1, '2017-07-17 21:12:02'),
(117, 91, 'Bram Cohen', '', 1, '2017-07-17 21:21:35'),
(118, 91, 'Vinny Lingham', '', 1, '2017-07-17 21:21:35'),
(119, 91, 'Juan Llanos', '', 1, '2017-07-17 21:21:35'),
(120, 91, 'Andrew Lee', '', 1, '2017-07-17 21:21:35'),
(121, 91, 'Jason King', '', 1, '2017-07-17 21:21:35'),
(122, 91, 'Matt Fiske', '', 1, '2017-07-17 21:21:35'),
(126, 96, 'Tomas Draksas', '', 1, '2017-07-17 21:37:37'),
(134, 124, 'Alex Tabarrok', '', 1, '2017-07-17 23:28:54'),
(135, 124, 'Ray Carballada', '', 1, '2017-07-17 23:28:54'),
(136, 124, 'Stephan Kinsella', '', 1, '2017-07-17 23:28:54'),
(137, 124, 'Michael Huemer', '', 1, '2017-07-17 23:28:54'),
(146, 141, 'ALEXANDER NOORDELOOS', 'https://www.linkedin.com/in/alexandernoordeloos/', 1, '2017-07-18 00:39:52'),
(147, 141, 'NADAL ANTONIONI', '', 1, '2017-07-18 00:39:52'),
(148, 141, 'MARCO HOUWELING', 'https://nl.linkedin.com/in/marco-houweling-bb60273/nl', 1, '2017-07-18 00:39:52'),
(172, 155, 'Melissa Davies', 'https://www.linkedin.com/in/melissaadavies', 1, '2017-07-18 01:45:50'),
(196, 160, 'ALISON DAVIS', 'https://www.linkedin.com/pub/alison-davis/0/541/339', 1, '2017-07-18 02:13:36'),
(197, 160, 'KATHRYN HUAN', 'https://www.linkedin.com/in/kathryn-haun-0791456/', 1, '2017-07-18 02:13:36'),
(198, 160, 'TERRY SCHWAKOPF', 'https://www.linkedin.com/in/terry-schwakopf-6767a39', 1, '2017-07-18 02:13:36'),
(199, 160, 'BROCK PIERCE', 'https://www.linkedin.com/in/brockpierce', 1, '2017-07-18 02:13:36'),
(200, 160, 'SIMON MCNAMARA', 'https://uk.linkedin.com/in/simcnamara', 1, '2017-07-18 02:13:36'),
(201, 160, 'CHRIS PALLOTTA', 'https://www.linkedin.com/in/christopher-pallotta-bb3b6430', 1, '2017-07-18 02:13:36'),
(202, 160, 'BOBBY LEE', 'https://cn.linkedin.com/in/bobbyclee', 1, '2017-07-18 02:13:36'),
(203, 160, 'WILL O’BRIEN', 'https://www.linkedin.com/in/willobrien', 1, '2017-07-18 02:13:36'),
(204, 160, 'VINNY LINGHAM', 'https://www.linkedin.com/in/vinnylingham', 1, '2017-07-18 02:13:36'),
(205, 160, 'NICCOLO DE MASI ', '', 1, '2017-07-18 02:13:36'),
(206, 160, 'MARY CRANSTON', 'https://www.linkedin.com/in/mary-cranston-9420b3aa', 1, '2017-07-18 02:13:36'),
(207, 160, 'CHARLIE LEE', 'https://www.linkedin.com/in/chocobo', 1, '2017-07-18 02:13:36'),
(208, 160, 'MATT OCKO', 'https://www.linkedin.com/in/mattocko', 1, '2017-07-18 02:13:36'),
(209, 160, 'WAYNE VAUGHN', 'http://linkedin.com/in/wayne', 1, '2017-07-18 02:13:36'),
(210, 160, 'GAVIN WOOD', 'https://www.linkedin.com/in/gavin-wood-88843316/', 1, '2017-07-18 02:13:36'),
(211, 160, 'ERIC SIPPEL', 'https://www.linkedin.com/in/eric-sippel-976770/', 1, '2017-07-18 02:13:36'),
(212, 160, 'MICHAEL MCADAM', 'https://www.linkedin.com/pub/michael-mcadam/20/5b9/7b2', 1, '2017-07-18 02:13:36'),
(213, 163, 'Vitalik Buterin', 'https://www.linkedin.com/in/vitalik-buterin-267a7450', 1, '2017-07-18 02:23:32'),
(214, 163, 'Bo Shen', 'https://www.linkedin.com/in/boshen1011', 1, '2017-07-18 02:23:32'),
(215, 163, 'Brian Hoffman', 'https://www.linkedin.com/in/brianchoffman', 1, '2017-07-18 02:23:32'),
(216, 163, 'Emin Gun Sier', 'https://www.linkedin.com/in/emin-gun-sirer-0a921a4', 1, '2017-07-18 02:23:32'),
(217, 163, 'Michael Casey', 'https://www.linkedin.com/in/michaeljohncasey', 1, '2017-07-18 02:23:32'),
(218, 163, 'Michael Hexner', 'https://www.linkedin.com/in/michael-hexner-a2a3048', 1, '2017-07-18 02:23:32'),
(219, 163, 'Benedict Chan', 'https://www.linkedin.com/in/bencxr', 1, '2017-07-18 02:23:32'),
(229, 166, 'William Mougayar', 'https://www.linkedin.com/in/williammougayar/', 1, '2017-07-24 21:52:55'),
(230, 166, 'Evan Van Ness', 'https://www.linkedin.com/in/evanvanness/', 1, '2017-07-24 21:52:55'),
(231, 166, 'Vincent Eli', 'https://www.linkedin.com/in/vincent-eli-521aa21b/', 1, '2017-07-24 21:52:55'),
(232, 166, 'David Prais', 'https://www.linkedin.com/in/david-prais-a9367a/', 1, '2017-07-24 21:52:55'),
(233, 166, 'Paul Veradittakit', 'https://www.linkedin.com/in/veradittakit/', 1, '2017-07-24 21:52:55'),
(234, 166, 'Tim Zagar', 'https://www.linkedin.com/in/wwwmz/', 1, '2017-07-24 21:52:55'),
(235, 166, 'Lan Filipic', 'https://www.linkedin.com/in/lan-filipic-670420ba/', 1, '2017-07-24 21:52:55'),
(236, 166, 'Nejc Novak', 'https://www.linkedin.com/in/nejc-novak-ll-m-ucl-61272714/', 1, '2017-07-24 21:52:55'),
(248, 183, 'DR GAVIN WOOD', '', 1, '2017-07-25 21:02:03'),
(249, 183, 'JAKE BRUKHMAN', '', 1, '2017-07-25 21:02:03'),
(250, 183, 'JOE SHAPIRA', '', 1, '2017-07-25 21:02:03'),
(251, 183, 'NED SCOTT', '', 1, '2017-07-25 21:02:03'),
(252, 183, 'HERMIONE WAY', '', 1, '2017-07-25 21:02:03'),
(332, 12, 'Pratap', '', 1, '2017-08-08 15:49:56'),
(338, 7, 'Naman Chakraborty', 'http://abc.com', 1, '2017-08-08 16:39:37'),
(365, 204, 'Joachim de Koning', 'https://www.linkedin.com/in/joachim-de-koning-a5874b25', 1, '2017-09-06 20:00:53'),
(413, 215, 'Frenesa Hall, MD', 'https://www.linkedin.com/in/frenesakhallmd/', 1, '2017-09-15 22:22:37'),
(414, 215, 'Shawn Wilkinson', 'https://www.linkedin.com/in/shawn-wilkinson-4b2899b1/', 1, '2017-09-15 22:22:37'),
(415, 215, 'Peter Kung ', 'https://www.linkedin.com/in/kungpeter/', 1, '2017-09-15 22:22:37'),
(416, 215, 'Geetha Rao', 'https://www.linkedin.com/in/geetha-rao/', 1, '2017-09-15 22:22:37'),
(417, 215, 'Nigel Waller', 'https://www.linkedin.com/in/nigelwaller/', 1, '2017-09-15 22:22:37'),
(418, 215, 'Rick Brounstein', 'https://www.linkedin.com/in/rickbrounstein/', 1, '2017-09-15 22:22:37'),
(419, 215, 'Richard DiMonda', 'https://www.linkedin.com/in/richard-dimonda-bb432b9/', 1, '2017-09-15 22:22:37'),
(420, 215, 'Rodney Sampson', 'https://www.linkedin.com/in/rodneysampson/', 1, '2017-09-15 22:22:37'),
(422, 231, 'Steven Nerayoff', '', 1, '2017-09-19 02:10:08'),
(423, 231, 'Charles Hoskinson', '', 1, '2017-09-19 02:10:08'),
(441, 253, 'Tony Tiyou', 'https://www.linkedin.com/in/tony-tiyou/', 1, '2018-03-09 01:48:56'),
(442, 253, 'Gareth Dauley', 'https://uk.linkedin.com/in/gareth-dauley-20092a7', 1, '2018-03-09 01:48:56'),
(443, 253, 'Brian Colwell', 'https://www.linkedin.com/in/colwellbrian/', 1, '2018-03-09 01:48:56'),
(449, 259, 'Igor Karavaev', 'https://www.linkedin.com/in/igor-karavaev-80a0674', 1, '2018-03-09 10:14:49'),
(450, 259, 'Nathan Christian', 'https://www.linkedin.com/in/nathan-christian-90365414a', 1, '2018-03-09 10:14:49'),
(451, 260, 'Hannes Van Rensburg', '', 1, '2018-03-12 05:06:16'),
(452, 260, 'Perry Leardi', '', 1, '2018-03-12 05:06:16'),
(453, 260, 'Sarel de Witt', '', 1, '2018-03-12 05:06:16'),
(454, 260, 'Carpenter Cui', '', 1, '2018-03-12 05:06:16'),
(523, 14, 'Pablo Yabo', '', 1, '2018-03-22 05:26:49'),
(524, 14, 'Mikko Ohtamaa', '', 1, '2018-03-22 05:26:49'),
(531, 181, 'Max Kordek', '', 1, '2018-03-22 05:28:57'),
(532, 181, 'Jaron Lukasiewicz', 'https://www.linkedin.com/in/jaronlukasiewicz/', 1, '2018-03-22 05:28:57'),
(533, 181, 'Simone Giacomelli', 'https://www.linkedin.com/in/simone-giacomelli-a8458197/', 1, '2018-03-22 05:28:57'),
(534, 181, ' Emmanuel Abiodun', 'https://www.linkedin.com/in/emmanuel-abiodun-6a84377', 1, '2018-03-22 05:28:57'),
(653, 17, 'Julian Kossinov', '', 1, '2018-04-20 11:34:16'),
(654, 17, 'Christian Kossinov', '', 1, '2018-04-20 11:34:16'),
(655, 252, 'Higinio Guillamon Duch', 'https://www.linkedin.com/in/higinio-guillamon-111aa47/', 1, '2018-04-20 11:38:04'),
(656, 252, 'Nicolas De Narvaez', 'https://www.linkedin.com/in/nicolas-de-narvaez-aa649426/', 1, '2018-04-20 11:38:04'),
(657, 252, 'Jaime Pascual', 'https://www.linkedin.com/in/jaime-pascual-7b849743/', 1, '2018-04-20 11:38:04'),
(748, 100, 'Bill Peters', '', 1, '2018-10-18 08:30:58'),
(749, 100, 'Xu Jianfeng', '', 1, '2018-10-18 08:30:58'),
(754, 129, 'Tim Ruffing', '', 1, '2018-10-18 08:52:05'),
(755, 69, 'Jake Brukhman', 'https://twitter.com/jbrukh', 1, '2018-10-18 09:03:28'),
(756, 69, 'Kenny Rowe', 'https://twitter.com/kennyrowe', 1, '2018-10-18 09:03:28'),
(757, 69, 'Brayton Williams', 'https://twitter.com/BraytonKey', 1, '2018-10-18 09:03:28'),
(758, 237, 'Micah Spruill', 'https://linkedin.com/in/micahspruill ', 1, '2018-10-18 09:04:29'),
(759, 237, 'Yann Alleman', 'https://linkedin.com/in/yann-allemann-330bb727', 1, '2018-10-18 09:04:29'),
(760, 237, 'Joe Fisher', '', 1, '2018-10-18 09:04:29'),
(761, 92, 'Alan Soucy', 'https://www.linkedin.com/in/alansoucy/', 1, '2018-10-18 09:10:59'),
(762, 92, 'Donna Burke', 'https://www.linkedin.com/in/donnasokolsky', 1, '2018-10-18 09:10:59'),
(763, 92, 'Eric Doyle', 'https://www.linkedin.com/in/therealericdoyle/', 1, '2018-10-18 09:10:59'),
(768, 381, 'Jihan Wu', 'https://www.linkedin.com/in/wu-jihan-31972417/', 1, '2018-10-18 09:25:54'),
(769, 381, 'Hongfei Da', 'https://cn.linkedin.com/in/dahongfei', 1, '2018-10-18 09:25:54'),
(770, 381, 'Xueyong Gu', '', 1, '2018-10-18 09:25:54'),
(771, 381, 'Dr. Lei Xing', 'https://www.linkedin.com/in/lei-xing-9aa8527', 1, '2018-10-18 09:25:54'),
(772, 381, 'Ziheng Zhou', 'https://www.linkedin.com/in/josephziheng', 1, '2018-10-18 09:25:54'),
(773, 381, 'Joey Lee', 'https://www.linkedin.com/in/joeylee', 1, '2018-10-18 09:25:54'),
(774, 381, 'Luis Llovera', 'https://www.linkedin.com/in/luis-llovera-9618a210', 1, '2018-10-18 09:25:54'),
(775, 381, 'Runde Wang', '', 1, '2018-10-18 09:25:54'),
(776, 381, 'Lee Wilson', '', 1, '2018-10-18 09:25:54'),
(777, 152, 'Frank Gadea', '', 1, '2018-10-18 09:40:31'),
(783, 105, 'Andy Bailey', '', 1, '2018-10-18 09:46:33'),
(784, 246, 'Greg Colvin', 'https://www.linkedin.com/in/gregcolvin', 1, '2018-10-18 09:55:18'),
(785, 246, 'Alex Leverington', 'https://www.linkedin.com/in/alexleverington', 1, '2018-10-18 09:55:18'),
(786, 111, 'Dr Gavin Wood', 'https://uk.linkedin.com/in/gavin-wood-88843316', 1, '2018-10-18 09:56:55'),
(787, 111, 'Dr. Andreas Glarner', 'https://www.linkedin.com/in/andreas-glarner-49b78b16', 1, '2018-10-18 09:56:55'),
(788, 111, 'Jehan Chu', 'https://www.linkedin.com/in/jehan-chu-637101', 1, '2018-10-18 09:56:55'),
(789, 153, 'Mike Costache', 'https://www.linkedin.com/in/mikecostache/', 1, '2018-10-18 10:04:52'),
(790, 153, 'John Wong', '', 1, '2018-10-18 10:04:52'),
(791, 153, 'Arnold Spencer', 'https://www.linkedin.com/in/arnold-spencer-963777/', 1, '2018-10-18 10:04:52'),
(792, 153, 'Andrii Zamovsky', 'https://www.linkedin.com/in/nixoid', 1, '2018-10-18 10:04:52'),
(793, 153, 'Oleksii Matiiasevych', 'https://www.linkedin.com/in/nixoid', 1, '2018-10-18 10:04:52'),
(794, 153, 'Oleh Vasylenko', 'https://www.linkedin.com/in/aldekein/', 1, '2018-10-18 10:04:52'),
(795, 153, 'David Wachsman', '', 1, '2018-10-18 10:04:52'),
(796, 153, 'Patrick Salm', 'https://www.linkedin.com/in/patrick-salm-8b5abb55/', 1, '2018-10-18 10:04:52'),
(797, 153, 'Marshall Swatt', 'https://www.linkedin.com/in/marshallswatt/', 1, '2018-10-18 10:04:52'),
(798, 153, 'Sergey Rabenko', 'https://www.linkedin.com/in/sergey-rabenko-5800b84', 1, '2018-10-18 10:04:52'),
(799, 153, 'Pascal M. Bommeli', 'https://www.linkedin.com/in/pascal-bommeli', 1, '2018-10-18 10:04:52'),
(800, 153, 'Nazar Polyvka', 'https://www.linkedin.com/in/nazar-polyvka-6133037', 1, '2018-10-18 10:04:52'),
(801, 153, 'Alexander Rugaev', 'https://www.linkedin.com/in/alexrugaev/', 1, '2018-10-18 10:04:52'),
(802, 136, 'Paul Puey', 'https://www.linkedin.com/in/paulpuey', 1, '2018-10-19 03:45:07'),
(803, 136, 'Dmitry Buterin', 'https://ca.linkedin.com/in/chiefapricot', 1, '2018-10-19 03:45:07'),
(804, 136, 'Olivier Rikken', 'https://nl.linkedin.com/in/olivierrikken', 1, '2018-10-19 03:45:07'),
(805, 136, 'Antoine Verdon', 'https://ch.linkedin.com/in/antoineverdon', 1, '2018-10-19 03:45:07'),
(806, 157, 'Ugo Bechis', 'https://it.linkedin.com/in/ugo-bechis-0581348', 1, '2018-10-19 03:51:13'),
(807, 157, 'Daniel Haudenschild', 'https://www.linkedin.com/in/daniel-haudenschild-8462526/', 1, '2018-10-19 03:51:13'),
(808, 157, 'Lewis Cohen', 'https://www.linkedin.com/in/lewis-cohen-a3211410/', 1, '2018-10-19 03:51:13'),
(809, 157, 'George Basiladze', 'https://uk.linkedin.com/in/georgebasiladze', 1, '2018-10-19 03:51:13'),
(810, 157, 'Ivan Zahharenko', 'https://lv.linkedin.com/in/ivan-zahharenko-64425422', 1, '2018-10-19 03:51:13'),
(811, 157, 'Dmitry Gunyashov', 'https://uk.linkedin.com/in/dgunyashov', 1, '2018-10-19 03:51:13'),
(812, 157, 'Oleg Khovayko', 'https://www.linkedin.com/in/oleg-khovayko-78a2165', 1, '2018-10-19 03:51:13'),
(813, 157, 'Andreas Ioannou', 'https://cy.linkedin.com/in/andreas-ioannou-aa3585a8', 1, '2018-10-19 03:51:13'),
(814, 157, 'Andrius Bogdanovicius', 'https://lt.linkedin.com/in/andrius-bogdanovicius-93125a1', 1, '2018-10-19 03:51:13'),
(815, 157, 'Dmitri Laush', 'https://www.linkedin.com/in/dmitrilaush/', 1, '2018-10-19 03:51:13'),
(816, 157, ' Andrey Zamovskiy', 'https://www.linkedin.com/in/nixoid', 1, '2018-10-19 03:51:13'),
(817, 157, 'Oleksii Matiiasevych', 'https://ua.linkedin.com/in/lastperson', 1, '2018-10-19 03:51:13'),
(818, 157, 'Kseniia Raietska', 'https://ua.linkedin.com/in/ksyai/en', 1, '2018-10-19 03:51:13'),
(819, 174, 'Dhimas Pambudi', '', 1, '2018-10-19 03:55:45'),
(820, 174, 'Ray Meeks', '', 1, '2018-10-19 03:55:45'),
(821, 174, 'Dene Collett', '', 1, '2018-10-19 03:55:45'),
(822, 174, 'Robert Stone', '', 1, '2018-10-19 03:55:45'),
(831, 383, 'Prof. Whitfield Diffie', '', 1, '2018-10-19 04:31:16'),
(832, 383, 'Vincent Zhou', '', 1, '2018-10-19 04:31:16'),
(833, 383, 'Kris Singh', '', 1, '2018-10-19 04:31:16'),
(834, 383, 'Heting Shen', '', 1, '2018-10-19 04:31:16'),
(835, 68, 'Mikko Ohtamaa', '', 1, '2018-10-19 04:40:40'),
(836, 149, 'Ahmad Siddiqi', '', 1, '2018-10-19 05:27:01'),
(837, 149, 'Timothy Suggs', '', 1, '2018-10-19 05:27:01'),
(838, 149, 'Maurice Beutnagel', '', 1, '2018-10-19 05:27:01'),
(839, 218, 'Alexander Alexandrov', 'https://www.linkedin.com/in/ervichov/', 1, '2018-10-19 05:34:38'),
(840, 34, 'Susan Athey', 'https://www.linkedin.com/in/susanathey', 1, '2018-10-24 04:50:56'),
(841, 34, 'Donald Donahue', 'https://www.linkedin.com/in/donald-donahue-b3332b17', 1, '2018-10-24 04:50:56'),
(842, 34, 'Karl-theodor zu guttenberg', 'https://www.linkedin.com/in/karl-theodor-zu-guttenberg-22594b68', 1, '2018-10-24 04:50:56'),
(843, 34, 'Anja Manuel ', 'https://www.linkedin.com/in/anja-manuel-26805023', 1, '2018-10-24 04:50:56'),
(844, 42, 'Patrick Collison', '', 1, '2018-10-24 09:55:47'),
(845, 42, 'Greg Stein', '', 1, '2018-10-24 09:55:47'),
(846, 42, 'Matt Mullenweg', '', 1, '2018-10-24 09:55:47'),
(847, 42, 'Naval Ravikant', '', 1, '2018-10-24 09:55:47'),
(848, 42, 'Ronaldo Lemos', '', 1, '2018-10-24 09:55:47'),
(850, 42, 'Dan Kaminsky', '', 1, '2018-10-24 09:55:47'),
(851, 42, 'Bhagwan Chowdhry', '', 1, '2018-10-24 09:55:47'),
(864, 143, 'Raleigh Harbour', 'https://www.linkedin.com/in/raleighharbour', 1, '2018-10-24 13:18:44'),
(865, 143, 'Toby Gabriner', 'https://www.linkedin.com/in/tobygabriner', 1, '2018-10-24 13:18:44'),
(866, 143, 'Mike Goldin', 'https://www.linkedin.com/in/skmgoldin', 1, '2018-10-24 13:18:44'),
(867, 143, 'Ameen Soleimani', 'https://www.linkedin.com/in/ameen-soleimani-97181942/', 1, '2018-10-24 13:18:44'),
(868, 143, 'Mark D’Agostino', 'https://www.linkedin.com/in/markdagostinocpa', 1, '2018-10-24 13:18:44'),
(869, 143, 'Shailin Dhar', 'https://www.linkedin.com/in/shailindhar', 1, '2018-10-24 13:18:44'),
(870, 36, 'Perry Woodin', 'https://www.linkedin.com/in/perry-woodin-83276', 1, '2018-10-24 20:23:08'),
(883, 378, 'Nikolai Mushegian', 'https://www.linkedin.com/in/nikolai-mushegian-a8276423/', 1, '2018-10-24 20:32:59'),
(884, 378, 'Chris Padovano', 'https://www.linkedin.com/in/christopherpadovano', 1, '2018-10-24 20:32:59'),
(885, 378, 'Qijun', '', 1, '2018-10-24 20:32:59'),
(886, 159, 'Joseph Poon', '', 1, '2018-10-24 20:39:33'),
(887, 159, 'Vitalik Buterin', 'https://ca.linkedin.com/in/vitalik-buterin-267a7450', 1, '2018-10-24 20:39:33'),
(888, 159, 'Dr. Gavin Wood', '', 1, '2018-10-24 20:39:33'),
(889, 159, 'Jae Kwon', 'https://www.linkedin.com/in/yjkwon', 1, '2018-10-24 20:39:33'),
(890, 159, 'Vlad Zamfir', '', 1, '2018-10-24 20:39:33'),
(891, 159, 'Martin Becze', '', 1, '2018-10-24 20:39:33'),
(892, 159, 'Julian Zawistowski', 'https://www.linkedin.com/in/julian-zawistowski-352478/', 1, '2018-10-24 20:39:33'),
(893, 159, 'Prof. David Lee Kuo Chuen', '', 1, '2018-10-24 20:39:33'),
(894, 159, 'Pandia Jiang', '', 1, '2018-10-24 20:39:33'),
(895, 159, 'Roger Ver', '', 1, '2018-10-24 20:39:33'),
(897, 379, 'Alessandro De Carli', '', 1, '2018-10-24 20:47:03'),
(898, 379, 'Vincent Zhou', '', 1, '2018-10-24 20:47:03'),
(899, 379, 'Steve Dakh', '', 1, '2018-10-24 20:47:03'),
(900, 379, 'John Tromp', '', 1, '2018-10-24 20:47:03'),
(901, 380, 'Evan Cheng', 'https://www.linkedin.com/in/chengevan/', 1, '2018-10-24 20:49:40'),
(902, 380, 'Aquinas Hobor', 'https://www.linkedin.com/in/aquinas-hobor-574b862/', 1, '2018-10-24 20:49:40'),
(903, 380, 'Alexander Lipton', 'https://www.linkedin.com/in/alexander-lipton-aa2256bb/', 1, '2018-10-24 20:49:40'),
(904, 380, 'Loi Luu', 'https://www.linkedin.com/in/loiluu/', 1, '2018-10-24 20:49:40'),
(905, 380, 'Nicolai Oster', 'https://www.linkedin.com/in/nicolaioster/', 1, '2018-10-24 20:49:40'),
(906, 380, 'Stuart Prior', 'https://www.linkedin.com/in/stuart-prior-13294456/', 1, '2018-10-24 20:49:40'),
(907, 380, 'Christel Quek', 'https://www.linkedin.com/in/christelquek/', 1, '2018-10-24 20:49:40'),
(908, 380, 'Vincent Zhou', 'https://www.linkedin.com/in/shuojizhou/', 1, '2018-10-24 20:49:40'),
(909, 87, 'Ankur Nandwani', '', 1, '2018-10-24 20:52:55'),
(910, 87, 'Ben Livshits', '', 1, '2018-10-24 20:52:55'),
(911, 87, 'Zooko Wilcox', '', 1, '2018-10-24 20:52:55'),
(912, 87, 'Greg Badros', '', 1, '2018-10-24 20:52:55'),
(913, 87, 'Jon Bond', '', 1, '2018-10-24 20:52:55'),
(923, 71, 'TwinWinNerD', '', 1, '2018-10-24 21:02:52'),
(924, 71, 'Coin Guide', '', 1, '2018-10-24 21:02:52'),
(930, 40, 'Alex Leverington', 'https://ch.linkedin.com/in/alexleverington', 1, '2018-10-25 10:04:45'),
(931, 41, 'Vitalik Buterin', '', 1, '2018-10-25 10:06:52'),
(932, 41, 'Ron Bernstein', '', 1, '2018-10-25 10:06:52'),
(933, 41, 'Dr. Robin Hanson', '', 1, '2018-10-25 10:06:52'),
(934, 41, 'Joe Costello', '', 1, '2018-10-25 10:06:52'),
(935, 41, 'Houman Shadab', '', 1, '2018-10-25 10:06:52'),
(936, 41, 'Elizabeth Stark', '', 1, '2018-10-25 10:06:52'),
(937, 47, 'Cesar Castro', 'https://www.linkedin.com/in/castrocesar', 1, '2018-10-25 10:25:17'),
(938, 47, 'Mahesh Chand', 'https://www.linkedin.com/in/mchand/', 1, '2018-10-25 10:25:17'),
(939, 48, 'Gavin Andresen', 'https://twitter.com/gavinandresen', 1, '2018-10-25 10:25:35'),
(940, 48, 'Vitalik Buterin', 'https://twitter.com/vitalikbuterin', 1, '2018-10-25 10:25:35'),
(941, 48, 'Andrew Miller', 'https://twitter.com/socrates1024', 1, '2018-10-25 10:25:35'),
(942, 48, 'Arthur Breitman', 'https://twitter.com/arthurb', 1, '2018-10-25 10:25:35'),
(943, 48, 'Joseph Bonneau', 'https://twitter.com/josephbonneau', 1, '2018-10-25 10:25:35'),
(944, 48, 'Gordon Mohr', 'https://twitter.com/gojomo', 1, '2018-10-25 10:25:35'),
(945, 48, 'Brian Warner', 'https://twitter.com/lotharrr', 1, '2018-10-25 10:25:35'),
(946, 49, 'JASON TROST', 'https://twitter.com/jasontrost', 1, '2018-10-25 10:25:54'),
(947, 49, 'VITALIK BUTERIN', 'https://twitter.com/VitalikButerin', 1, '2018-10-25 10:25:54'),
(948, 49, 'JAMES SLAZAS', '', 1, '2018-10-25 10:25:54'),
(949, 49, 'ROBIN HANSON', 'https://twitter.com/robinhanson', 1, '2018-10-25 10:25:54'),
(950, 49, 'PAOLO REBUFFO', '', 1, '2018-10-25 10:25:54'),
(951, 76, 'Bruce Winans', 'https://www.linkedin.com/in/bruce-winans-5b06b0/', 1, '2018-10-25 10:26:59'),
(952, 76, 'Stuart Bentham', 'https://www.linkedin.com/in/stuart-bentham-4151799/', 1, '2018-10-25 10:26:59'),
(953, 79, 'Eric Benz', 'https://www.linkedin.com/in/ericbenz84/', 1, '2018-10-25 10:28:02'),
(954, 79, 'George Basiladze', 'https://www.facebook.com/george.basiladze', 1, '2018-10-25 10:28:02'),
(955, 79, 'Richard Kastelein', 'https://www.linkedin.com/in/expathos/', 1, '2018-10-25 10:28:02'),
(956, 79, 'Jason Cassidy', 'https://www.facebook.com/jason.cassidy.10048', 1, '2018-10-25 10:28:02'),
(957, 79, 'Pavel Kinchikov', 'https://www.linkedin.com/in/pavel-kinchikov-b7399717/', 1, '2018-10-25 10:28:02'),
(958, 79, 'Jon Matonis', 'https://uk.linkedin.com/in/jonmatonis', 1, '2018-10-25 10:28:02'),
(959, 98, 'BO SHEN', '', 1, '2018-10-25 10:31:03'),
(960, 197, 'TwinWinNerD', '', 1, '2018-10-25 10:43:25'),
(961, 197, 'PondSea', '', 1, '2018-10-25 10:43:25'),
(962, 197, 'mx', '', 1, '2018-10-25 10:43:25'),
(966, 236, 'SETH SHAPIRO', 'https://www.linkedin.com/in/sethshapiro ', 1, '2018-10-25 10:54:19'),
(967, 236, 'SRIRAM DURVASULA', 'https://www.linkedin.com/in/sriramdurvasula/', 1, '2018-10-25 10:54:19'),
(968, 236, 'SIMON BARRY', 'https://www.linkedin.com/in/simonbarry', 1, '2018-10-25 10:54:19'),
(974, 386, 'Don Tapscott', 'https://www.linkedin.com/in/dontapscott', 1, '2018-10-26 03:17:48'),
(975, 386, 'Paul Veradittakit', 'https://www.linkedin.com/in/veradittakit', 1, '2018-10-26 03:17:48'),
(976, 386, 'JEHAN CHU', 'https://www.linkedin.com/in/jehan-chu-637101/', 1, '2018-10-26 03:17:48'),
(977, 386, 'Jason Best', 'https://www.linkedin.com/in/jasonwbest', 1, '2018-10-26 03:17:48'),
(978, 386, 'Yiseul Cho', 'https://www.linkedin.com/in/yiseulcho', 1, '2018-10-26 03:17:48'),
(979, 386, 'Simon Seojoon Kim', 'https://www.linkedin.com/in/seojoonkim/', 1, '2018-10-26 03:17:48'),
(980, 386, 'Eddy Travia', 'https://uk.linkedin.com/in/startupeddy', 1, '2018-10-26 03:17:48'),
(981, 386, 'Ismail Malik', 'https://www.linkedin.com/in/blockchain/', 1, '2018-10-26 03:17:48'),
(982, 389, 'Ari Paul', 'https://www.linkedin.com/in/ari-paul-8895a57/', 1, '2018-10-26 04:34:47'),
(983, 389, 'John Piotrowski', 'https://www.linkedin.com/in/johnpiotrowskiuva/', 1, '2018-10-26 04:34:47'),
(984, 389, 'Bill Wolf', 'https://www.linkedin.com/in/bill-wolf-5015a343/', 1, '2018-10-26 04:34:47'),
(985, 389, 'Tom Shields', 'https://www.linkedin.com/in/tomshields/', 1, '2018-10-26 04:34:47'),
(986, 389, 'Matt Mochary', 'https://www.linkedin.com/in/matt-mochary-34bb4/', 1, '2018-10-26 04:34:47'),
(987, 389, 'Tom Ding', 'https://www.linkedin.com/in/tomding/', 1, '2018-10-26 04:34:47'),
(988, 392, 'Mark Robinson', 'https://www.linkedin.com/in/mark-robinson-8105391/', 1, '2018-10-26 05:02:55'),
(989, 392, 'Andy Denton', 'https://www.linkedin.com/in/andrewdenton/', 1, '2018-10-26 05:02:55'),
(990, 37, 'DR. AVTAR SEHRA', 'https://twitter.com/avtarsehra', 1, '2018-10-26 10:24:12'),
(991, 37, 'Ar Vicco', 'https://twitter.com/arvicco', 1, '2018-10-26 10:24:12'),
(992, 37, 'ELAINE OU', 'https://twitter.com/eiaine', 1, '2018-10-26 10:24:12'),
(993, 37, 'CODY BURNS', 'https://twitter.com/DontPanicBurns', 1, '2018-10-26 10:24:12'),
(994, 37, 'YATES RANDALL', '', 1, '2018-10-26 10:24:12'),
(1071, 412, 'Anders Larsson', 'https://www.linkedin.com/in/anders-larsson/', 1, '2018-10-31 03:06:58'),
(1072, 412, 'Rennie Sng', 'https://www.linkedin.com/in/rainmanasia/', 1, '2018-10-31 03:06:58'),
(1073, 412, 'Chintan Thakkar', 'https://www.linkedin.com/in/chintan7/', 1, '2018-10-31 03:06:58'),
(1074, 412, 'Joakim Holmer', 'https://www.linkedin.com/in/joakimholmer/', 1, '2018-10-31 03:06:58'),
(1102, 400, 'Stefan Mueller', 'https://www.linkedin.com/in/stefan-mueller-cfa-caia-b5ba1827/', 1, '2018-11-01 00:53:32'),
(1103, 400, 'Jehan Chu', 'https://www.linkedin.com/in/jehan-chu-637101/', 1, '2018-11-01 00:53:32'),
(1104, 400, 'Pavel Bains', 'https://www.linkedin.com/in/pavelbains/', 1, '2018-11-01 00:53:32'),
(1105, 400, 'Thomas Olsen', 'https://www.linkedin.com/in/thomas-olsen-1456ab/', 1, '2018-11-01 00:53:32'),
(1106, 400, 'Brian Lio', 'https://www.linkedin.com/in/brianlio/', 1, '2018-11-01 00:53:32'),
(1107, 400, 'Alykhan Kurji', 'https://www.linkedin.com/in/alykhan-kurji-6ba96526/', 1, '2018-11-01 00:53:32'),
(1108, 400, 'Anirudh Rastogi', 'https://www.linkedin.com/in/anirudhrastogi/', 1, '2018-11-01 00:53:32'),
(1109, 400, 'Min H. Kim', 'https://www.linkedin.com/in/minkimd14/', 1, '2018-11-01 00:53:32'),
(1110, 400, 'Milo Sprague', 'https://www.linkedin.com/in/milo-sprague-7a4840/', 1, '2018-11-01 00:53:32'),
(1111, 395, 'André Beckers', '', 1, '2018-11-01 01:02:17'),
(1112, 395, 'Miguel Torres', '', 1, '2018-11-01 01:02:17'),
(1113, 395, 'Willem-Jan Smits', 'https://nl.linkedin.com/in/willem-jan-smits-32509510', 1, '2018-11-01 01:02:17'),
(1114, 395, 'Camiel Vermeulen', 'https://nl.linkedin.com/in/vermeulencamiel', 1, '2018-11-01 01:02:17'),
(1115, 397, 'Phillip Hall', '', 1, '2018-11-01 01:07:29'),
(1116, 397, 'Alessandro Bianchinni', '', 1, '2018-11-01 01:07:29'),
(1117, 397, 'Elizabeth Rowe', '', 1, '2018-11-01 01:07:29'),
(1118, 397, 'Charles Waldegrave', '', 1, '2018-11-01 01:07:29'),
(1119, 411, 'Dr Phavie Leang, PhD.', 'https://www.linkedin.com/in/phavie-leang-79016/', 1, '2018-11-01 01:11:33'),
(1120, 411, 'Jean-Laurent Wotton', 'https://www.linkedin.com/in/jlwotton/', 1, '2018-11-01 01:11:33'),
(1121, 411, 'Nozomu Nakazato', 'https://www.linkedin.com/in/nozomu-nakazato-905b85155/', 1, '2018-11-01 01:11:33'),
(1122, 411, 'Andreas Hauser', 'https://www.linkedin.com/in/andreas-hauser-/', 1, '2018-11-01 01:11:33'),
(1123, 411, 'Toni Hilti', 'https://www.linkedin.com/in/tonihilti/', 1, '2018-11-01 01:11:33'),
(1124, 411, 'Lex Sokolin', 'https://www.linkedin.com/in/alexeysokolin/', 1, '2018-11-01 01:11:33'),
(1125, 399, 'Frank Pira', 'https://www.linkedin.com/in/frankpira/', 1, '2018-11-01 01:15:14'),
(1126, 399, ' Ed Zynda', 'https://www.linkedin.com/in/edzynda/', 1, '2018-11-01 01:15:14'),
(1127, 399, 'Lewis Buckley', 'https://www.linkedin.com/in/lewis-buckley-9b09b417/', 1, '2018-11-01 01:15:14'),
(1128, 399, 'Christopher Griffin', 'https://www.linkedin.com/in/chris-griffin-38932a5a/', 1, '2018-11-01 01:15:14'),
(1129, 399, 'Michael Miglio', 'https://www.linkedin.com/in/michaelmiglio/', 1, '2018-11-01 01:15:14'),
(1130, 399, 'Gordon Gilchrist', 'https://www.linkedin.com/in/gordongilchrist/', 1, '2018-11-01 01:15:14'),
(1131, 399, 'Wayne Schmidt', 'https://www.linkedin.com/in/wayneschmidt/', 1, '2018-11-01 01:15:14'),
(1132, 399, ' Paul Dunn', 'https://www.linkedin.com/in/aynsleydamery/', 1, '2018-11-01 01:15:14'),
(1133, 399, 'Steve Pipe', 'https://www.linkedin.com/in/stevepipe/', 1, '2018-11-01 01:15:14'),
(1134, 399, 'Paul Shrimpling', 'https://www.linkedin.com/in/paulshrimpling/', 1, '2018-11-01 01:15:14'),
(1135, 399, 'Amy Hayes', 'https://www.linkedin.com/in/amy-hayes-b6b770b0/', 1, '2018-11-01 01:15:14'),
(1136, 399, 'Nicolle Maltwood', 'https://www.linkedin.com/in/nicolle-maltwood/', 1, '2018-11-01 01:15:14'),
(1137, 410, 'Robert Stone', 'https://www.linkedin.com/in/rostone/', 1, '2018-11-01 01:19:15'),
(1138, 410, 'Shane Rushent', 'https://www.linkedin.com/in/cryptoadvisor/', 1, '2018-11-01 01:19:15'),
(1139, 410, 'Ian Scarffe', 'https://www.linkedin.com/in/ianscarffe/', 1, '2018-11-01 01:19:15'),
(1140, 410, 'Giovanni Casagrande', 'https://www.linkedin.com/in/giovanni-casagrande-crypto/', 1, '2018-11-01 01:19:15'),
(1141, 410, 'Sanem Avcil', 'https://www.linkedin.com/in/sanemavcil/', 1, '2018-11-01 01:19:15'),
(1142, 410, 'Robbert Walstra', 'https://www.linkedin.com/in/robbert-walstra-ll-m-80431431/', 1, '2018-11-01 01:19:15'),
(1143, 410, 'Mauro Andriotto', 'https://www.linkedin.com/in/mauro-andriotto-a2339a12b/', 1, '2018-11-01 01:19:15'),
(1144, 410, 'Alecos Colombo', 'https://www.linkedin.com/in/alecoscolombo/', 1, '2018-11-01 01:19:15'),
(1150, 254, 'Saeed Hareb Al Darmaki', 'https://www.linkedin.com/in/saeed-al-darmaki-175b5485/', 1, '2018-11-01 01:23:07'),
(1151, 254, 'Hartej Sawhney', 'https://www.linkedin.com/in/hartej/', 1, '2018-11-01 01:23:07'),
(1152, 254, 'Luigi Ghilardi II', '', 1, '2018-11-01 01:23:07'),
(1153, 254, 'Oliver Gale', 'https://www.linkedin.com/in/oliverlgale/', 1, '2018-11-01 01:23:07'),
(1154, 254, 'Johnny Dilley', 'https://www.linkedin.com/in/johnnydilley', 1, '2018-11-01 01:23:07'),
(1155, 408, 'Marc P. Bernegger', 'https://www.linkedin.com/in/marcpbernegger/', 1, '2018-11-01 01:25:47'),
(1156, 408, 'Ronald Kleverlaan', 'https://www.linkedin.com/in/kleverlaan/', 1, '2018-11-01 01:25:47'),
(1157, 408, 'Dr. Efi Pylarinou', 'https://www.linkedin.com/in/efipylarinou/', 1, '2018-11-01 01:25:47'),
(1158, 408, 'Tim Simon', 'https://www.linkedin.com/in/tim-simon-148930/', 1, '2018-11-01 01:25:47'),
(1159, 408, 'Donatas Tamelis', 'https://www.linkedin.com/in/donatastamelis/', 1, '2018-11-01 01:25:47'),
(1160, 393, 'Gina Valeria Cruz Lozano', 'https://www.linkedin.com/in/gina-valeria-cruz-lozano-94088366/', 1, '2018-11-01 01:29:36'),
(1161, 393, 'Oscar Aurelio Moreno Olvera', 'https://www.linkedin.com/in/oscar-aurelio-moreno-olvera-8a853651/', 1, '2018-11-01 01:29:36'),
(1162, 413, 'Toni Lane Casserly', 'https://www.linkedin.com/in/tonilanec/', 1, '2018-11-01 01:51:58'),
(1163, 413, 'Renee Airya', 'https://www.linkedin.com/in/renee-airya/', 1, '2018-11-01 01:51:58'),
(1164, 413, 'Virginia Kastilio', 'https://www.linkedin.com/in/virginiasalaskastilio/', 1, '2018-11-01 01:51:58'),
(1165, 413, 'Hans Koning', 'https://www.linkedin.com/in/hanskoningttim/', 1, '2018-11-01 01:51:58'),
(1166, 413, 'Nicolas Levy', 'https://www.linkedin.com/in/niclevy/', 1, '2018-11-01 01:51:58'),
(1167, 413, 'Amateo Ra', 'https://www.linkedin.com/in/amateora/', 1, '2018-11-01 01:51:58'),
(1168, 413, 'Ihor Pidruchny', 'https://www.linkedin.com/in/ihorpidruchny/', 1, '2018-11-01 01:51:58'),
(1169, 413, 'Sunny Bates', 'https://www.linkedin.com/in/sunnybates/', 1, '2018-11-01 01:51:58'),
(1170, 413, 'Yanik Silver', 'https://www.linkedin.com/in/yaniksilver/', 1, '2018-11-01 01:51:58'),
(1171, 413, 'Zach Fitzner', 'https://www.linkedin.com/in/zfitzner/', 1, '2018-11-01 01:51:58'),
(1172, 413, 'Nanu Berks', 'https://www.linkedin.com/in/nanuberks/', 1, '2018-11-01 01:51:58'),
(1173, 413, 'Justin Snyder', 'https://www.linkedin.com/in/jus10snyder/', 1, '2018-11-01 01:51:58'),
(1174, 413, 'Christine Hassler', 'https://www.linkedin.com/in/christinehassler/', 1, '2018-11-01 01:51:58'),
(1175, 413, 'Jeremy Khoo', 'https://www.linkedin.com/in/jeremy-khoo/', 1, '2018-11-01 01:51:58'),
(1176, 413, 'Zak Garcia', 'https://www.linkedin.com/in/zak-garcia-62177311/', 1, '2018-11-01 01:51:58'),
(1177, 413, 'Erwin Valencia', 'https://www.linkedin.com/in/erwinbvalencia/', 1, '2018-11-01 01:51:58'),
(1178, 413, 'Justin Whiting', 'https://www.linkedin.com/in/juwhiting/', 1, '2018-11-01 01:51:58'),
(1179, 413, 'Zachary Reese', 'https://www.linkedin.com/in/zacharyreece/', 1, '2018-11-01 01:51:58'),
(1180, 413, 'Mick Shaheen', 'https://www.linkedin.com/in/mick-shaheen-4a61ba11b/', 1, '2018-11-01 01:51:58'),
(1181, 413, 'Patryk Pawlowski', 'https://www.linkedin.com/in/patryk-pawlowski-aa973152/', 1, '2018-11-01 01:51:58'),
(1182, 404, 'JOHN MCAFEE', '', 1, '2018-11-01 02:01:20'),
(1183, 403, 'NAVIIN KAPOOR', 'https://www.linkedin.com/in/naviinkapoor/', 1, '2018-11-01 02:09:05'),
(1184, 403, 'PETR MYACHIN', 'https://www.linkedin.com/in/mypetr/', 1, '2018-11-01 02:09:05'),
(1185, 403, 'KAMAL MUSTAFA', 'https://www.linkedin.com/in/kamal-mustafa-7b604b15/', 1, '2018-11-01 02:09:05'),
(1186, 403, 'RIYADUL ISLAM', 'https://www.linkedin.com/in/riyadul-islam-50b96015a', 1, '2018-11-01 02:09:05'),
(1187, 403, 'JUDITH IMAFIDON', 'https://www.linkedin.com/in/judith-imafidon/', 1, '2018-11-01 02:09:05'),
(1188, 403, 'JANE IYAMAH-MKPA', 'https://www.linkedin.com/in/jane-iyamah-mkpa-090527147/', 1, '2018-11-01 02:09:05'),
(1189, 398, 'Igor Matsanyuk', 'https://ru.linkedin.com/in/igormatsanyuk', 1, '2018-11-01 02:11:52'),
(1190, 407, 'Daniel Mester', '', 1, '2018-11-01 02:16:06'),
(1191, 407, 'Sasha Tabak', 'https://www.linkedin.com/in/sashatabak/', 1, '2018-11-01 02:16:06'),
(1192, 407, 'Dmitry Pshenin ', 'https://www.linkedin.com/in/dmitrypshenin/', 1, '2018-11-01 02:16:06'),
(1193, 407, 'Richard Trummer', 'https://www.linkedin.com/in/richard-trummer-8419b014/', 1, '2018-11-01 02:16:06'),
(1194, 407, 'Egor Buravtsov', '', 1, '2018-11-01 02:16:06'),
(1195, 407, 'Ira Dolgin', 'https://www.linkedin.com/in/iradolgin', 1, '2018-11-01 02:16:06'),
(1196, 407, 'Gary Baiton', 'https://www.linkedin.com/in/garybaiton/', 1, '2018-11-01 02:16:06'),
(1197, 405, 'Sergiy Khandogin', 'https://www.linkedin.com/in/sergeykhandogin/', 1, '2018-11-01 02:39:10'),
(1198, 405, 'Phillipe Erwin', 'http://linkedin.com/in/philippeerwin', 1, '2018-11-01 02:39:10'),
(1199, 405, 'Willson Lee', 'https://www.linkedin.com/in/lee-willson-778413113/', 1, '2018-11-01 02:39:10'),
(1207, 401, 'VERED ITZHAKI', 'https://www.linkedin.com/in/vered-itzhaki-113735100/', 1, '2018-11-01 02:56:04'),
(1208, 401, 'ALEX AVERBUCH', 'https://www.linkedin.com/in/alex-averbuch-9431071/', 1, '2018-11-01 02:56:04'),
(1209, 401, 'JARED POLITES', 'https://www.linkedin.com/in/jaredpolites/', 1, '2018-11-01 02:56:04'),
(1210, 401, 'TUMENNAST ERDENEBOLD', 'https://www.linkedin.com/in/tumennast/', 1, '2018-11-01 02:56:04'),
(1211, 401, 'ISMAIL MALIK', 'https://www.linkedin.com/in/blockchain/', 1, '2018-11-01 02:56:04'),
(1212, 401, 'STAS MANEVICH', 'https://www.linkedin.com/in/stasmanevich73/', 1, '2018-11-01 02:56:04'),
(1213, 401, 'ARIEL EZRACHI', '', 1, '2018-11-01 02:56:04'),
(1214, 384, 'Fred Ehrsam', 'https://www.linkedin.com/in/fredehrsam/', 1, '2018-11-08 20:16:43'),
(1215, 384, 'Olaf Carlson-Wee', 'https://www.linkedin.com/in/olafcw/', 1, '2018-11-08 20:16:43'),
(1216, 384, 'Joey Krug', 'https://www.linkedin.com/in/joeykrug/', 1, '2018-11-08 20:16:43'),
(1217, 384, 'Linda Xie', 'https://www.linkedin.com/in/lindaxie/', 1, '2018-11-08 20:16:43'),
(1218, 384, 'David Sacks', 'https://www.linkedin.com/in/davidoliversacks/', 1, '2018-11-08 20:16:43'),
(1219, 414, 'Vladimir Nikitin', 'https://www.linkedin.com/in/icoadv/', 1, '2018-11-09 08:41:58'),
(1220, 414, 'Phillip Nunn', 'https://www.linkedin.com/in/phillip-nunn/', 1, '2018-11-09 08:41:58'),
(1221, 414, 'Simon Cocking', 'https://www.linkedin.com/in/simon-cocking-20540135/', 1, '2018-11-09 08:41:58'),
(1222, 414, 'Amarpreet Singh', 'https://www.linkedin.com/in/amarpreetsingh2/', 1, '2018-11-09 08:41:58'),
(1223, 414, 'Nikolay Shkilev', 'https://www.linkedin.com/in/icoadvisor/', 1, '2018-11-09 08:41:58'),
(1224, 414, 'Naviin Kapoor', 'https://www.linkedin.com/in/naviinkapoor/', 1, '2018-11-09 08:41:58'),
(1225, 414, 'Marc Ortaliz', 'https://www.linkedin.com/in/marcortaliz/', 1, '2018-11-09 08:41:58'),
(1226, 415, 'Mikael Olofsson', 'https://www.linkedin.com/in/mikael-olofsson-9a865135/', 1, '2018-11-15 03:25:12'),
(1227, 415, 'Alberto Robbiani', 'https://www.linkedin.com/in/alberto-robbiani-86a55ab5/', 1, '2018-11-15 03:25:12'),
(1228, 415, 'Primoz Kordez', 'https://www.linkedin.com/in/primoz-kordez-frm-9878b463/', 1, '2018-11-15 03:25:12'),
(1229, 415, 'Santosh Pandey', 'https://www.linkedin.com/in/thesantoshpandey/', 1, '2018-11-15 03:25:12'),
(1230, 415, 'Riccardo Pittis', 'https://www.linkedin.com/in/riccardopittis/', 1, '2018-11-15 03:25:12'),
(1231, 416, 'Kwanho Choi', '', 1, '2018-11-15 03:38:04'),
(1232, 416, 'Gangseok Kim', '', 1, '2018-11-15 03:38:04'),
(1233, 416, 'Will O’Brien', '', 1, '2018-11-15 03:38:04'),
(1234, 416, 'Akihiro Kin', '', 1, '2018-11-15 03:38:04'),
(1235, 416, 'Changsu Lee', '', 1, '2018-11-15 03:38:04'),
(1236, 416, 'Sean Lim', '', 1, '2018-11-15 03:38:04'),
(1237, 416, 'James Jung', '', 1, '2018-11-15 03:38:04'),
(1238, 416, 'Doyon Kim', '', 1, '2018-11-15 03:38:04'),
(1239, 416, 'Mary Min', '', 1, '2018-11-15 03:38:04'),
(1240, 416, 'Dooil Kim', '', 1, '2018-11-15 03:38:04'),
(1241, 416, 'Gongjin Lim', '', 1, '2018-11-15 03:38:04'),
(1242, 416, 'WonJae Lee', '', 1, '2018-11-15 03:38:04'),
(1243, 416, 'Yongsoo Lee', '', 1, '2018-11-15 03:38:04'),
(1244, 416, 'Chulhwan Kim', '', 1, '2018-11-15 03:38:04'),
(1245, 416, 'Jongho Kim', '', 1, '2018-11-15 03:38:04'),
(1246, 416, 'Yongwon Moon', '', 1, '2018-11-15 03:38:04'),
(1247, 416, 'Jemin Choi', '', 1, '2018-11-15 03:38:04'),
(1248, 417, 'Alex Maier', '', 1, '2018-11-15 03:47:53'),
(1249, 417, 'Jim Jin', '', 1, '2018-11-15 03:47:53'),
(1250, 417, 'Todd Burgess', '', 1, '2018-11-15 03:47:53'),
(1251, 417, 'Craig Baldner', '', 1, '2018-11-15 03:47:53'),
(1252, 417, 'Tommy Shin', '', 1, '2018-11-15 03:47:53'),
(1253, 419, 'Mr. Michael Gord', 'https://www.linkedin.com/in/mgord/', 1, '2018-11-15 21:22:03'),
(1254, 419, 'Mr. Samer Obeidat', 'https://www.linkedin.com/in/samerobeidat/', 1, '2018-11-15 21:22:03'),
(1255, 419, 'Mr. Shameer Thaha', 'https://www.linkedin.com/in/shameerthaha/', 1, '2018-11-15 21:22:03'),
(1256, 419, 'Mr. Manish Mittal', 'https://www.linkedin.com/in/manish-mittal-6b12666/', 1, '2018-11-15 21:22:03'),
(1257, 419, 'Mr. Michael Gong', '', 1, '2018-11-15 21:22:03'),
(1258, 419, 'Mr. Sanjay Chandel', 'https://www.linkedin.com/in/sanjaychandel/', 1, '2018-11-15 21:22:03'),
(1259, 419, 'Mr. Kunal Kothari', '', 1, '2018-11-15 21:22:03'),
(1260, 419, 'Mr. Ismail EL Sakka', '', 1, '2018-11-15 21:22:03'),
(1261, 419, 'Mr. Lorenzo Giombini', 'https://www.linkedin.com/in/lorenzo-giombini-8329b6104/', 1, '2018-11-15 21:22:03'),
(1262, 419, 'Mr. Tuong Bach Luu', '', 1, '2018-11-15 21:22:03'),
(1263, 419, 'Mr. The Hien Dinh', '', 1, '2018-11-15 21:22:03'),
(1264, 420, 'Alex Liu', '', 1, '2018-11-15 21:30:39'),
(1265, 420, 'Leo Cheng', '', 1, '2018-11-15 21:30:39'),
(1266, 420, 'Paul Veradittakit', '', 1, '2018-11-15 21:30:39'),
(1267, 420, 'Jason Fang', '', 1, '2018-11-15 21:30:39'),
(1268, 420, 'Stella Kung', '', 1, '2018-11-15 21:30:39'),
(1269, 420, 'Kevin Li', '', 1, '2018-11-15 21:30:39'),
(1270, 421, 'Alex Bertlin', 'https://www.linkedin.com/in/alexbertlin/', 1, '2018-11-15 21:45:52'),
(1271, 421, 'Lisa Calkins', 'https://www.linkedin.com/in/lisacalkins/', 1, '2018-11-15 21:45:52'),
(1272, 421, 'Jayper Sanchez', 'https://www.linkedin.com/in/jaypersanchez/', 1, '2018-11-15 21:45:52'),
(1273, 421, 'Ahmed Hamdhan', 'https://www.linkedin.com/in/ahmed-hamdhan-9a3a031/', 1, '2018-11-15 21:45:52'),
(1274, 421, 'Shahmeer Amir', 'https://www.linkedin.com/in/m-shahmeer-amir-743a5bb7/', 1, '2018-11-15 21:45:52'),
(1275, 422, 'VI?d?s Sk?k?usk?s', '', 1, '2018-11-15 21:52:40'),
(1276, 423, 'Chris Wozniak', 'https://www.linkedin.com/in/chris-wozniak-417730b3/', 1, '2018-11-15 22:00:19'),
(1277, 423, 'Steve Lee', 'https://www.linkedin.com/in/steve-lee-54202a29/', 1, '2018-11-15 22:00:19'),
(1278, 423, 'Kajenthran AM', 'https://www.linkedin.com/in/kajeni24/', 1, '2018-11-15 22:00:19'),
(1279, 424, 'Alex Mathai', 'https://genuinefashiontoken.com/', 1, '2018-11-15 22:10:09'),
(1280, 424, 'Frank Wijnen', 'https://genuinefashiontoken.com/', 1, '2018-11-15 22:10:09'),
(1281, 425, 'SangWook Jung', '', 1, '2018-11-15 22:19:15'),
(1282, 425, 'KwanMoo Hu', '', 1, '2018-11-15 22:19:15'),
(1283, 425, 'Amang, Sanchez', 'https://www.linkedin.com/in/amang-sanchez-25308935/', 1, '2018-11-15 22:19:15'),
(1284, 425, 'SeYoung In', '', 1, '2018-11-15 22:19:15'),
(1285, 425, 'Michael Jang', 'http://www.linkedin.com/in/michael-jang-s-j-065975a0', 1, '2018-11-15 22:19:15'),
(1286, 426, 'Andrei Terentiev', 'https://www.linkedin.com/in/andrei-terentiev-635988119/', 1, '2018-11-15 22:39:38'),
(1287, 426, 'Apisit Toompakdee', '', 1, '2018-11-15 22:39:38'),
(1288, 426, 'Arco Oliemans', '', 1, '2018-11-15 22:39:38'),
(1289, 426, 'Alex Knight', '', 1, '2018-11-15 22:39:38'),
(1290, 426, 'Nick Fujita', 'https://www.linkedin.com/in/nickfujita/', 1, '2018-11-15 22:39:38'),
(1291, 427, 'Mohammed Thoufiq', 'https://www.linkedin.com/in/mohammed-thoufiq-ba843778/', 1, '2018-11-15 22:52:07'),
(1292, 427, 'Laurent Garcia', 'https://www.linkedin.com/in/laurent-garcia-9b987a/', 1, '2018-11-15 22:52:07'),
(1293, 427, 'Ignas Januška', 'https://www.linkedin.com/in/ignas-janu%C5%A1ka-b1a265162/', 1, '2018-11-15 22:52:07'),
(1294, 428, 'Francois Pellegrin', 'https://www.linkedin.com/in/fran%C3%A7ois-pellegrin-b5b139b4/', 1, '2018-11-15 23:08:15'),
(1295, 429, 'Dr. Kilian Kämpfen', 'https://www.linkedin.com/in/kiliankaempfen/', 1, '2018-11-15 23:39:22'),
(1296, 429, 'Daria Arefieva', 'https://www.linkedin.com/in/daria-arefieva-b79566116/', 1, '2018-11-15 23:39:22'),
(1297, 429, 'Eric Benz', 'https://www.linkedin.com/in/ericbenz84/', 1, '2018-11-15 23:39:22'),
(1298, 430, 'Roderich Hess', 'https://www.linkedin.com/in/roderich-hess-93000b2/', 1, '2018-11-16 00:09:29'),
(1299, 430, 'Carlos Moreira', 'https://www.linkedin.com/in/carloscreusmoreira/', 1, '2018-11-16 00:09:29'),
(1300, 430, 'Greg Van Den Bergh', 'https://www.linkedin.com/in/gregoryvandenbergh/', 1, '2018-11-16 00:09:29'),
(1301, 430, 'Barnaby Andersun', 'https://www.linkedin.com/in/barnabyandersun', 1, '2018-11-16 00:09:29'),
(1302, 430, 'Miikka Saloseutu', 'https://www.linkedin.com/in/miikka-saloseutu-72141a131/', 1, '2018-11-16 00:09:29'),
(1303, 430, 'Javor Ninov', 'https://www.linkedin.com/in/javor-ninov/', 1, '2018-11-16 00:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `bop_company_coreteam`
--

CREATE TABLE `bop_company_coreteam` (
  `cot_id` int(11) NOT NULL,
  `cot_cmid` int(11) DEFAULT NULL,
  `cot_profile_url` varchar(150) DEFAULT NULL,
  `cot_name` varchar(150) DEFAULT NULL,
  `cot_status` tinyint(4) DEFAULT NULL,
  `cot_modifiedat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_company_coreteam`
--

INSERT INTO `bop_company_coreteam` (`cot_id`, `cot_cmid`, `cot_profile_url`, `cot_name`, `cot_status`, `cot_modifiedat`) VALUES
(36, 15, 'https://www.linkedin.com/in/shawn-wilkinson-4b2899b1', 'Shawn Wilkinson', 1, '2017-06-15 20:39:48'),
(37, 15, 'https://www.linkedin.com/in/tomeboshevski', 'Tome Boshevski', 1, '2017-06-15 20:39:48'),
(38, 15, 'https://www.linkedin.com/in/prestwich ', 'James Prestwich', 1, '2017-06-15 20:39:48'),
(39, 15, 'https://www.linkedin.com/in/johnquinntech', 'John Quinn', 1, '2017-06-15 20:39:48'),
(46, 19, '', 'Vitaliy Merzlyakov', 1, '2017-06-15 22:11:42'),
(68, 44, 'https://www.linkedin.com/in/jacksonpalmer', 'Jackson Palmer', 1, '2017-06-17 07:30:01'),
(69, 44, 'https://twitter.com/BillyM2k', 'Shibetoshi Nakamoto', 1, '2017-06-17 07:30:01'),
(77, 53, 'https://www.linkedin.com/in/ivica-simatovic-2a31335', ' Ivica Simatovic', 1, '2017-06-28 04:39:11'),
(78, 53, '', 'Jon Comer', 1, '2017-06-28 04:39:11'),
(83, 54, 'https://www.linkedin.com/in/zach-lebeau-39aa34111', 'ZACH LEBEAU', 1, '2017-06-28 05:08:44'),
(84, 54, 'https://www.linkedin.com/in/kim-jackson-5361b412', 'KIM JACKSON', 1, '2017-06-28 05:08:44'),
(85, 54, '', 'JOSEPH LUBIN', 1, '2017-06-28 05:08:44'),
(86, 54, '', 'ARIE LEVY-COHEN', 1, '2017-06-28 05:08:44'),
(87, 57, 'https://www.linkedin.com/in/peter-kirby-50034a6', 'Peter Kirby', 1, '2017-06-30 23:18:53'),
(88, 60, 'https://www.linkedin.com/in/wwwmz', 'Tim M. Zagar', 1, '2017-06-30 23:38:44'),
(89, 60, 'https://www.linkedin.com/in/janivaljavec', 'Jani Valjavec', 1, '2017-06-30 23:38:44'),
(102, 73, '', 'Eugene Shumilov', 1, '2017-07-07 01:49:05'),
(104, 75, 'https://www.linkedin.com/in/shingo-lavine', 'Shingo Lavine', 1, '2017-07-08 20:10:56'),
(106, 77, 'https://www.linkedin.com/in/david-koepsell-8a1aa413a/', 'David Koepsell', 1, '2017-07-08 20:28:09'),
(107, 77, 'https://www.linkedin.com/in/vanessa-gonzalez-covarrubias-21405a10/ ', 'VANESSA GONZALEZ COVARRUBIAS', 1, '2017-07-08 20:28:09'),
(108, 78, '', 'Capinvest 21 venture fund', 1, '2017-07-08 20:33:17'),
(122, 89, '', 'Bernard Lietaer', 1, '2017-07-17 21:12:02'),
(123, 89, '', 'Guido Schmitz-Krummacher', 1, '2017-07-17 21:12:02'),
(124, 89, 'https://www.linkedin.com/in/hertzog/', 'Eyal Hertzog', 1, '2017-07-17 21:12:02'),
(125, 89, 'https://www.linkedin.com/in/guy-benartzi-734613146/', 'Guy Benartzi', 1, '2017-07-17 21:12:02'),
(130, 91, '', 'Marshall Hayner', 1, '2017-07-17 21:21:35'),
(131, 91, '', 'Andy Goldstein', 1, '2017-07-17 21:21:35'),
(135, 94, 'https://uk.linkedin.com/pub/dan-andersson/13/1a2/9a8', 'Dan Anderson', 1, '2017-07-17 21:32:01'),
(137, 96, '', 'Ignas Mangevicius', 1, '2017-07-17 21:37:37'),
(138, 96, '', 'Tomas Lukosaitis', 1, '2017-07-17 21:37:37'),
(139, 97, '', 'Richard Olsen', 1, '2017-07-17 21:40:23'),
(144, 102, 'https://www.linkedin.com/in/richardcraib', 'Richard Craib', 1, '2017-07-17 21:59:07'),
(145, 103, '', 'JULIAN YAP', 1, '2017-07-17 22:03:06'),
(146, 103, '', 'LUKE WILLIAMS', 1, '2017-07-17 22:03:06'),
(147, 103, 'https://www.linkedin.com/in/krishansen', 'KRIS HANSEN', 1, '2017-07-17 22:03:06'),
(150, 107, '', 'Daniel Kraft', 1, '2017-07-17 22:14:09'),
(160, 123, '', 'Dr Peter Waterland', 1, '2017-07-17 23:20:54'),
(161, 123, '', 'Leon Groot Bruinderink', 1, '2017-07-17 23:20:54'),
(162, 124, 'https://www.linkedin.com/in/kauffj', 'Jeremy Kauffman', 1, '2017-07-17 23:28:54'),
(163, 124, 'https://www.linkedin.com/in/lyoshenka', 'Alex Grintsvayg', 1, '2017-07-17 23:28:54'),
(164, 124, 'https://www.linkedin.com/in/joshfiner', 'Josh Finer', 1, '2017-07-17 23:28:54'),
(165, 124, 'https://www.linkedin.com/in/jack-robison-07118972', 'Jack Robison', 1, '2017-07-17 23:28:54'),
(168, 130, '', 'J.E. Taylor', 1, '2017-07-17 23:48:53'),
(173, 141, 'https://www.linkedin.com/in/joel-a-bosh-86063827/', 'JOEL BOSH', 1, '2017-07-18 00:39:52'),
(174, 141, 'https://nl.linkedin.com/in/richardgroen', 'RICHARD GROEN', 1, '2017-07-18 00:39:52'),
(175, 141, '', 'DEREK HATTON', 1, '2017-07-18 00:39:52'),
(189, 154, '', 'Dima Starodubtsev', 1, '2017-07-18 01:43:09'),
(190, 154, '', 'Valery Litvin', 1, '2017-07-18 01:43:09'),
(191, 154, 'https://fr.linkedin.com/in/marina-guryeva-1390a03b', 'Marina Gurev', 1, '2017-07-18 01:43:09'),
(192, 154, '', 'Aleksey Frumin', 1, '2017-07-18 01:43:09'),
(193, 154, '', 'Vitaly Lviv', 1, '2017-07-18 01:43:09'),
(194, 154, 'https://ru.linkedin.com/in/lomashuk', 'Konstantin Lomashuk', 1, '2017-07-18 01:43:09'),
(195, 154, 'https://www.linkedin.com/in/valentine', 'Valentin Zavgorodnev', 1, '2017-07-18 01:43:09'),
(201, 160, 'https://www.linkedin.com/in/pbartstephens', 'P. Bart Stephens', 1, '2017-07-18 02:13:36'),
(202, 160, 'https://www.linkedin.com/in/wbradfordstephens', 'W. Bradford Stephens', 1, '2017-07-18 02:13:36'),
(203, 161, '', 'E-COIN GROUP', 1, '2017-07-18 02:16:17'),
(204, 163, 'https://www.linkedin.com/in/ligeorge', 'George Li', 1, '2017-07-18 02:23:32'),
(205, 163, 'https://www.linkedin.com/in/patrick-long-cpa', 'Patrick Long', 1, '2017-07-18 02:23:32'),
(218, 166, 'https://www.linkedin.com/in/janisakovic/', 'Jan Isakovic', 1, '2017-07-24 21:52:55'),
(219, 166, 'https://www.linkedin.com/in/danielzakrisson/', 'Daniel Zakrisson', 1, '2017-07-24 21:52:55'),
(233, 172, '', 'Halsey Minor', 1, '2017-07-24 22:31:10'),
(234, 172, '', 'Martín Repetto', 1, '2017-07-24 22:31:10'),
(235, 172, '', 'Máximo Radice', 1, '2017-07-24 22:31:10'),
(240, 175, '', 'C4', 1, '2017-07-24 22:40:46'),
(241, 175, '', 'Johans', 1, '2017-07-24 22:40:46'),
(242, 175, '', 'BizzyB', 1, '2017-07-24 22:40:46'),
(243, 175, '', 'Pjctld', 1, '2017-07-24 22:40:46'),
(244, 175, '', 'Bbobb', 1, '2017-07-24 22:40:46'),
(245, 175, '', 'Mike.N', 1, '2017-07-24 22:40:46'),
(246, 175, '', 'Roslinpl', 1, '2017-07-24 22:40:46'),
(247, 175, '', 'Swtrse', 1, '2017-07-24 22:40:46'),
(248, 175, '', 'Theboccet', 1, '2017-07-24 22:40:46'),
(249, 175, '', 'Sojuz88', 1, '2017-07-24 22:40:46'),
(250, 175, '', 'SotirisBlad', 1, '2017-07-24 22:40:46'),
(251, 176, 'https://www.linkedin.com/in/maksim-balashevich-640a8948/', 'Maksim Balashevich', 1, '2017-07-24 22:42:44'),
(261, 180, '', 'Sergey Ponomarev', 1, '2017-07-24 22:58:34'),
(262, 180, '', 'Max Kordek', 1, '2017-07-24 22:58:34'),
(263, 180, 'https://www.linkedin.com/in/jaronlukasiewicz/', 'Jaron Lukasiewicz', 1, '2017-07-24 22:58:34'),
(264, 180, 'https://www.linkedin.com/in/simone-giacomelli-a8458197/', 'Simone Giacomelli', 1, '2017-07-24 22:58:34'),
(265, 180, 'https://www.linkedin.com/in/emmanuel-abiodun-6a84377', 'Emmanuel Abiodun', 1, '2017-07-24 22:58:34'),
(271, 183, '', 'YONATAN BEN SHIMON', 1, '2017-07-25 21:02:03'),
(272, 183, '', 'MAX RICHARDSON', 1, '2017-07-25 21:02:03'),
(273, 184, '', 'Justin Jacobeen', 1, '2017-07-25 21:04:21'),
(274, 184, '', 'Timothy Mesker', 1, '2017-07-25 21:04:21'),
(374, 16, '', 'Sergey Sholom', 1, '2017-08-08 14:32:46'),
(388, 7, 'http://abc.com', ' Panshak Solomon', 1, '2017-08-08 16:39:37'),
(421, 200, '', 'jan', 1, '2017-09-06 19:19:04'),
(422, 200, '', 'ralfs', 1, '2017-09-06 19:19:04'),
(423, 200, '', 'goldeneye', 1, '2017-09-06 19:19:04'),
(424, 200, '', 'seatrips', 1, '2017-09-06 19:19:04'),
(425, 200, '', 'maverick69', 1, '2017-09-06 19:19:04'),
(427, 203, '', 'BitcoinPlusBus', 1, '2017-09-06 19:56:32'),
(428, 203, '', 'Rushmybitcoin', 1, '2017-09-06 19:56:32'),
(429, 203, '', 'BitcoinPlusMagic', 1, '2017-09-06 19:56:32'),
(430, 203, '', 'Mammix2', 1, '2017-09-06 19:56:32'),
(431, 203, '', 'Bushstar', 1, '2017-09-06 19:56:32'),
(432, 204, 'https://nl.linkedin.com/in/brianmmulder', 'Brian Mulder', 1, '2017-09-06 20:00:53'),
(482, 211, 'https://uk.linkedin.com/in/danial-daychopan-480a94a0', 'Danial Daychopan', 1, '2017-09-15 01:58:19'),
(483, 211, 'https://www.linkedin.com/profile/view?id=AAkAAABsta8BVcvQ29M40XuIG2nSLYuNG_hoDL8', 'JASPER TAY', 1, '2017-09-15 01:58:19'),
(485, 215, 'https://www.linkedin.com/in/chrissamcfarlane/', 'Chrissa McFarlane', 1, '2017-09-15 22:22:37'),
(490, 223, 'https://www.linkedin.com/in/alan-yong-9b2707a5/', 'Alan Yong', 1, '2017-09-19 01:40:35'),
(491, 224, 'https://www.linkedin.com/in/joseph-fiscella-7a299059', 'Joseph Fiscella', 1, '2017-09-19 01:44:08'),
(492, 227, '', 'Patrick Nosker', 1, '2017-09-19 01:53:53'),
(493, 227, '', 'Douglas Pike', 1, '2017-09-19 01:53:53'),
(494, 227, '', 'Steve Woods', 1, '2017-09-19 01:53:53'),
(495, 227, '', 'David Boehm', 1, '2017-09-19 01:53:53'),
(496, 227, '', 'Benjamin Mahala', 1, '2017-09-19 01:53:53'),
(500, 231, '', 'Rob Viglione', 1, '2017-09-19 02:10:08'),
(501, 231, '', 'Rolf Versluis', 1, '2017-09-19 02:10:08'),
(502, 231, '', 'Jane Lippencott', 1, '2017-09-19 02:10:08'),
(503, 231, '', 'Carlo Vicari', 1, '2017-09-19 02:10:08'),
(517, 206, 'http://aapthitech.com', 'Testcore1', 1, '2017-09-20 12:47:00'),
(528, 253, 'https://www.linkedin.com/in/girard-newkirk-21137b70', 'Girard Newkirk', 1, '2018-03-09 01:48:56'),
(530, 256, 'https://www.linkedin.com/in/michail-gabov-6752a1159/', 'Michail Gabov', 1, '2018-03-09 04:33:02'),
(531, 256, 'https://www.linkedin.com/in/andrew-grishchenko-22929b159/', 'Andrew Grishchenko', 1, '2018-03-09 04:33:02'),
(538, 259, 'https://www.linkedin.com/in/alexey-aslezov-21530a105', 'Alexey Aslezov', 1, '2018-03-09 10:14:49'),
(539, 259, 'https://www.linkedin.com/in/zerostate', 'Pavel Petrov', 1, '2018-03-09 10:14:49'),
(541, 260, 'https://za.linkedin.com/in/anguspohl', 'Angus Pohl', 1, '2018-03-12 05:06:16'),
(552, 11, '', 'Satoshi Nakamato', 1, '2018-03-21 07:22:07'),
(623, 14, 'https://www.linkedin.com/in/krismarszalek/', 'CEO Kris Marszalek', 1, '2018-03-22 05:26:49'),
(625, 181, '', 'Sergey Ponomarev', 1, '2018-03-22 05:28:57'),
(824, 17, '', ' Andrew Zimine ', 1, '2018-04-20 11:34:16'),
(825, 17, '', 'Alex Sitnikov', 1, '2018-04-20 11:34:16'),
(826, 257, '', 'ALEXANDR KOLOKHMATOV  ', 1, '2018-04-20 11:37:19'),
(827, 257, 'https://www.linkedin.com/in/alexandr-ozerov-66888389/', 'ALEXANDR OZEROV  ', 1, '2018-04-20 11:37:19'),
(828, 257, 'https://www.linkedin.com/in/galiya-akhmetzhanova-5b50a8156/', 'GALIYA AKHMETZHANOVA  ', 1, '2018-04-20 11:37:19'),
(829, 257, '', 'KUANYSH OMAROV  ', 1, '2018-04-20 11:37:19'),
(830, 251, 'https://www.linkedin.com/in/stanislav-vaneev/', 'Stanislav Vaneev', 1, '2018-04-20 11:37:32'),
(831, 251, 'https://www.linkedin.com/in/anton-vasin-b4659a36/', 'Anton Vasin', 1, '2018-04-20 11:37:32'),
(832, 251, 'https://www.linkedin.com/in/sergey-kozlovsky-676797150/', 'Sergey Kozlovsky', 1, '2018-04-20 11:37:32'),
(833, 258, 'https://www.linkedin.com/in/georgerozos/', 'George Rozos', 1, '2018-04-20 11:37:50'),
(834, 258, 'https://www.linkedin.com/in/james-rozos-172511117/', 'James Rozos', 1, '2018-04-20 11:37:50'),
(835, 252, 'https://www.linkedin.com/in/juan-pablo-vazquez-sampere/', 'Dr. Juan Pablo Vazquez Sampere', 1, '2018-04-20 11:38:04'),
(836, 252, 'https://co.linkedin.com/in/danielortizuribe', 'Daniel Ortiz Uribe', 1, '2018-04-20 11:38:04'),
(847, 369, '', 'Satoshi Nakamato', 1, '2018-05-15 09:23:24'),
(848, 370, '', 'Satoshi Nakamato', 1, '2018-05-15 09:23:35'),
(849, 371, '', 'Satoshi Nakamato', 1, '2018-05-15 09:26:45'),
(850, 372, '', 'Satoshi Nakamato', 1, '2018-05-15 09:29:27'),
(851, 373, '', 'Satoshi Nakamato', 1, '2018-05-15 09:32:55'),
(858, 377, 'https://www.linkedin.com/in/jun-li-58950069/', 'Jun Li', 1, '2018-09-21 03:48:04'),
(920, 74, 'https://www.linkedin.com/in/herbertwilliamhoover', 'Herbert W. Hoover', 1, '2018-10-12 01:55:58'),
(921, 45, 'https://uk.linkedin.com/in/dirvine', 'David Irvine', 1, '2018-10-12 02:01:44'),
(927, 18, 'https://twitter.com/realrimlin', 'Roman Nekrasov', 1, '2018-10-18 05:03:09'),
(928, 18, 'https://twitter.com/alekseykuz', 'Aleksey Kuznetsov', 1, '2018-10-18 05:03:09'),
(929, 18, 'https://twitter.com/IgorbISka', ' Igor Bityutskih', 1, '2018-10-18 05:03:09'),
(940, 120, 'https://www.linkedin.com/in/steve-nico-williams', 'Stephen Williams', 1, '2018-10-18 08:23:10'),
(950, 100, 'https://fr.linkedin.com/in/thoorens', 'François-Xavier Thoorens', 1, '2018-10-18 08:30:58'),
(953, 112, '', 'Mr. Watanabe', 1, '2018-10-18 08:41:44'),
(956, 85, 'https://www.linkedin.com/in/reggiemiddleton/', 'Reggie Middleton', 1, '2018-10-18 08:51:35'),
(957, 129, '', 'Poramin Insom', 1, '2018-10-18 08:52:05'),
(958, 88, '', 'Carl', 1, '2018-10-18 08:53:34'),
(959, 88, '', 'Jarrad', 1, '2018-10-18 08:53:34'),
(960, 95, 'https://www.linkedin.com/in/colin-cantrell-7b22b6118', 'Colin Cantrell', 1, '2018-10-18 08:58:57'),
(961, 167, '', 'Vinny Lingham', 1, '2018-10-18 08:59:26'),
(962, 167, '', 'Jonathan Smith', 1, '2018-10-18 08:59:26'),
(963, 148, '', 'Susanne Tempelholf', 1, '2018-10-18 09:01:33'),
(964, 148, 'https://www.linkedin.com/in/dan-metcalf-b821a812', 'Dan Metcalf', 1, '2018-10-18 09:01:33'),
(965, 69, 'https://twitter.com/licuende', ' Luis Cuende', 1, '2018-10-18 09:03:28'),
(966, 69, 'https://twitter.com/izqui9', 'Jorge Izquierdo', 1, '2018-10-18 09:03:28'),
(967, 237, 'https://linkedin.com/in/rmathee', 'Ryno Mathee', 1, '2018-10-18 09:04:29'),
(968, 158, '', 'jk_14    ', 1, '2018-10-18 09:07:58'),
(969, 92, 'https://www.linkedin.com/in/jezsan', 'Jez San OBE', 1, '2018-10-18 09:10:59'),
(970, 92, 'https://www.linkedin.com/in/jeremy-longley-16827b', 'Jeremy Longley', 1, '2018-10-18 09:10:59'),
(971, 92, 'https://www.linkedin.com/in/oliver-hopton-0387a61', 'Oliver Hopton', 1, '2018-10-18 09:10:59'),
(972, 135, '', 'Gruve_P – Igor from Latvia', 1, '2018-10-18 09:14:55'),
(989, 366, 'https://www.linkedin.com/in/dahongfei/', 'Da Hongfei', 1, '2018-10-18 09:20:13'),
(991, 382, 'https://www.linkedin.com/in/j0j0r0', 'Joe Roets', 1, '2018-10-18 09:23:41'),
(992, 381, 'https://www.linkedin.com/in/rong-chen-5071a6135', 'Rong Chen', 1, '2018-10-18 09:25:54'),
(993, 381, 'https://www.linkedin.com/in/sunny-feng-han-2477a780', 'Feng Han', 1, '2018-10-18 09:25:54'),
(994, 119, 'https://twitter.com/c4shm3n', 'cashmen', 1, '2018-10-18 09:30:14'),
(995, 235, '', 'Djnocide', 1, '2018-10-18 09:32:03'),
(996, 235, '', 'Varvarin', 1, '2018-10-18 09:32:03'),
(997, 152, 'https://www.linkedin.com/in/david-mah', 'David Mah', 1, '2018-10-18 09:40:31'),
(998, 178, 'https://www.linkedin.com/in/adam-matlack-54053268', 'Adam Matlack', 1, '2018-10-18 09:42:37'),
(999, 178, 'https://www.linkedin.com/in/richard-nelson-5728aabb', 'Richard Nelson', 1, '2018-10-18 09:42:37'),
(1000, 178, 'https://www.linkedin.com/in/colinadley', 'Colin Adley', 1, '2018-10-18 09:42:37'),
(1001, 178, 'https://www.linkedin.com/in/thomas-le-0b3b4818/', 'Thomas Le linkedin', 1, '2018-10-18 09:42:37'),
(1002, 178, 'https://www.linkedin.com/in/jordan-smith-60073810a/', ' Jordan Smith', 1, '2018-10-18 09:42:37'),
(1003, 178, 'https://www.linkedin.com/in/mitchcash', 'Mitchell Cash', 1, '2018-10-18 09:42:37'),
(1006, 105, '', 'Seth Lim', 1, '2018-10-18 09:46:33'),
(1007, 105, 'https://sg.linkedin.com/in/neo-wenyuan-1ab809140', 'Neo WenYuan', 1, '2018-10-18 09:46:33'),
(1008, 144, 'https://www.linkedin.com/in/mel-gelderman-a7596a10b/', 'Mel Gelderman', 1, '2018-10-18 09:48:56'),
(1009, 144, '', 'David Hoggard', 1, '2018-10-18 09:48:56'),
(1010, 99, '', 'Matej Michalko', 1, '2018-10-18 09:51:55'),
(1011, 99, 'https://sk.linkedin.com/in/matej-boda-53515096', 'Matej Boda', 1, '2018-10-18 09:51:55'),
(1012, 246, 'https://www.linkedin.com/in/arnoldpham', 'Arnold Pham', 1, '2018-10-18 09:55:18'),
(1013, 246, 'https://www.linkedin.com/in/tranandrew', 'Andrew Tran', 1, '2018-10-18 09:55:18'),
(1014, 246, 'https://www.linkedin.com/in/christophersmith1024', 'Christopher Smith', 1, '2018-10-18 09:55:18'),
(1015, 111, 'https://ch.linkedin.com/in/reto-trinkler-170a78106/en', 'Reto Trinkler', 1, '2018-10-18 09:56:55'),
(1016, 111, 'https://ch.linkedin.com/in/mona-el-isa-3a653526', 'Mona El Isa', 1, '2018-10-18 09:56:55'),
(1018, 153, 'https://www.linkedin.com/in/ruslan-gavrilyuk', 'Ruslan Gavrilyuk', 1, '2018-10-18 10:04:52'),
(1019, 153, 'https://ua.linkedin.com/in/konstantin-pysarenko-b1a40b51', 'Konstantin Pysarenko', 1, '2018-10-18 10:04:52'),
(1020, 153, 'https://www.linkedin.com/in/dchupryna', 'Dimitri Chupryna', 1, '2018-10-18 10:04:52'),
(1021, 153, 'https://www.linkedin.com/in/maksym-muratov-6a0925130/en', 'Maksym Muratov', 1, '2018-10-18 10:04:52'),
(1024, 110, '', 'Gilles Fedak', 1, '2018-10-19 03:37:22'),
(1025, 110, '', 'Haiwu He', 1, '2018-10-19 03:37:22'),
(1027, 157, 'https://ee.linkedin.com/in/ivan-turygin-b6698171', 'Ivan Turygin', 1, '2018-10-19 03:51:13'),
(1028, 157, 'https://ee.linkedin.com/in/sergei-potapenko-81998853', 'Sergei Potapenko', 1, '2018-10-19 03:51:13'),
(1029, 174, '', 'Jeremy T. Smith', 1, '2018-10-19 03:55:45'),
(1033, 214, '', 'Mario Blacutt', 1, '2018-10-19 04:07:56'),
(1034, 216, '', 'SHABAN', 1, '2018-10-19 04:08:49'),
(1040, 90, 'https://www.linkedin.com/in/tobyai/', 'Toby Hoenisch', 1, '2018-10-19 04:27:31'),
(1041, 90, 'https://www.linkedin.com/in/michael-sperk-15b0b0ba/', 'Michael Sperk', 1, '2018-10-19 04:27:31'),
(1042, 90, 'https://www.linkedin.com/in/paulkitti/', 'Paul Kitti.', 1, '2018-10-19 04:27:31'),
(1043, 90, 'https://www.linkedin.com/in/julianhosp/', 'Julian Hosp', 1, '2018-10-19 04:27:31'),
(1060, 383, 'https://www.linkedin.com/in/ziqichen/', 'Ziqi Chen', 1, '2018-10-19 04:31:16'),
(1061, 383, 'https://www.linkedin.com/in/weiyang-wang-a6134325/', 'Weiyang Wang', 1, '2018-10-19 04:31:16'),
(1062, 383, 'https://www.linkedin.com/in/jitian/', 'Jia Tian', 1, '2018-10-19 04:31:16'),
(1063, 383, 'https://www.linkedin.com/in/yang-yang-56882615a/', 'Yang Yang', 1, '2018-10-19 04:31:16'),
(1064, 383, 'https://www.linkedin.com/in/xiao-yan-5bb08079/', 'Xiao Yan', 1, '2018-10-19 04:31:16'),
(1065, 383, 'https://www.linkedin.com/in/chenyamy', 'Amy Chen', 1, '2018-10-19 04:31:16'),
(1066, 383, 'https://www.linkedin.com/in/truman-tian-1b249624/', 'Wentao Tian', 1, '2018-10-19 04:31:16'),
(1067, 383, 'https://www.linkedin.com/in/yongze-wang-22a075101/', 'Yongze Wang', 1, '2018-10-19 04:31:16'),
(1068, 383, 'https://www.linkedin.com/in/oscarwei/', 'Oscar Wei', 1, '2018-10-19 04:31:16'),
(1069, 383, 'https://www.linkedin.com/in/liqing-wang-0ba152a7/', 'Liqing Wang', 1, '2018-10-19 04:31:16'),
(1070, 383, 'https://www.linkedin.com/in/longtao-wang-a7911a107/', 'Longtao Wang', 1, '2018-10-19 04:31:16'),
(1071, 383, 'https://www.linkedin.com/in/zhen-li-241158ab/', 'Zhen Li', 1, '2018-10-19 04:31:16'),
(1072, 383, 'https://www.linkedin.com/in/%E5%87%AF%E5%84%92-%E6%9D%8E-bba892b6/', 'Kairu Li', 1, '2018-10-19 04:31:16'),
(1073, 383, 'https://www.linkedin.com/in/wu-yuxiang-440a7116a/', 'Yuxiang Wu', 1, '2018-10-19 04:31:16'),
(1074, 383, 'https://www.linkedin.com/in/%E6%B0%B8%E5%AE%87-%E5%90%B4-60a481b3/', 'Yongyu Wu', 1, '2018-10-19 04:31:16'),
(1075, 383, 'https://www.linkedin.com/in/ypwhs/', 'Peiwen Yang', 1, '2018-10-19 04:31:16'),
(1076, 202, '', 'Blazr2', 1, '2018-10-19 04:34:29'),
(1077, 68, '', 'Joe Zhou', 1, '2018-10-19 04:40:40'),
(1078, 68, '', 'Zack Coburn', 1, '2018-10-19 04:40:40'),
(1079, 68, '', 'Anik Dang', 1, '2018-10-19 04:40:40'),
(1080, 68, '', 'Marco Cuesta', 1, '2018-10-19 04:40:40'),
(1081, 185, '', 'Edway Group', 1, '2018-10-19 05:18:07'),
(1082, 125, '', 'Jochen Heussner', 1, '2018-10-19 05:23:35'),
(1083, 149, 'https://www.linkedin.com/in/christopherfranko', 'Christopher Franko', 1, '2018-10-19 05:27:01'),
(1084, 149, 'https://www.linkedin.com/in/james-clayton-96682686', 'James Clayton', 1, '2018-10-19 05:27:01'),
(1085, 149, '', 'Dan Conway', 1, '2018-10-19 05:27:01'),
(1086, 233, 'https://www.linkedin.com/in/rafaelgroswirt', 'Rafael Groswirt', 1, '2018-10-19 05:28:29'),
(1087, 170, 'https://www.linkedin.com/in/leon-kocjancic-4719267a/', 'Leon Kocjancic', 1, '2018-10-19 05:30:53'),
(1088, 170, 'https://www.linkedin.com/in/valentingjorgjioski/', 'Valentin Gjorgjioski', 1, '2018-10-19 05:30:53'),
(1089, 170, 'https://si.linkedin.com/in/ledche/', 'Vladimir Kuzmanovski', 1, '2018-10-19 05:30:53'),
(1090, 170, 'https://www.linkedin.com/in/gjoreski/', 'Hristijan Gjoreski', 1, '2018-10-19 05:30:53'),
(1091, 170, 'https://www.linkedin.com/in/darkocerepnalkoski/', 'Darko Cerepnalkoski', 1, '2018-10-19 05:30:53'),
(1092, 170, 'https://www.linkedin.com/in/vitohrzenjak/', 'Vito Martin Hrzenjak', 1, '2018-10-19 05:30:53'),
(1093, 170, 'https://www.linkedin.com/in/uros-stoisavljevic-86b772143/', 'Uros Stoisavljevic', 1, '2018-10-19 05:30:53'),
(1094, 170, 'https://www.linkedin.com/in/patricijajukic/', 'Patricija Jukic', 1, '2018-10-19 05:30:53'),
(1095, 228, '', 'Robert Ross', 1, '2018-10-19 05:33:08'),
(1096, 228, '', 'Jona Derks', 1, '2018-10-19 05:33:08'),
(1097, 228, '', 'Helene Unland', 1, '2018-10-19 05:33:08'),
(1098, 218, 'https://www.linkedin.com/in/ton-bi-828934129/', 'Ton Bi', 1, '2018-10-19 05:34:38'),
(1099, 218, '', 'Yanni Bragui ', 1, '2018-10-19 05:34:38'),
(1100, 218, '', 'Imed Boudali', 1, '2018-10-19 05:34:38'),
(1103, 34, 'https://twitter.com/bgarlinghouse?lang=en', 'Brad Garlinghouse', 1, '2018-10-24 04:50:56'),
(1104, 42, 'https://pl.linkedin.com/in/bartlomiejnowotarski', 'Bartek Nowotarski', 1, '2018-10-24 09:55:47'),
(1106, 39, '', 'Riccardo ', 1, '2018-10-24 10:01:33'),
(1107, 39, '', 'Francisco ', 1, '2018-10-24 10:01:33'),
(1108, 39, '', 'Smooth', 1, '2018-10-24 10:01:33'),
(1109, 39, '', 'Othe', 1, '2018-10-24 10:01:33'),
(1110, 39, '', 'luigi1111', 1, '2018-10-24 10:01:33'),
(1111, 39, '', 'tacotime', 1, '2018-10-24 10:01:33'),
(1112, 39, '', 'NoodleDoodle', 1, '2018-10-24 10:01:33'),
(1114, 35, 'https://twitter.com/satoshilite?lang=en', 'Charlie Lee', 1, '2018-10-24 10:04:13'),
(1116, 367, 'https://www.linkedin.com/in/sunyuchen', 'Justin Sun', 1, '2018-10-24 10:09:18'),
(1119, 143, 'https://www.linkedin.com/in/kenbrook', 'Ken Brook', 1, '2018-10-24 13:18:44'),
(1122, 36, 'https://www.linkedin.com/in/ryan-taylor-764b3b', 'Ryan Taylor', 1, '2018-10-24 20:23:08'),
(1123, 84, 'https://cn.linkedin.com/in/dahongfei', 'Da HongFei ', 1, '2018-10-24 20:24:29'),
(1125, 364, 'https://www.linkedin.com/in/cpzhao', 'Changpeng Zhao', 1, '2018-10-24 20:29:00'),
(1126, 375, '', 'Arthur Breitman', 1, '2018-10-24 20:29:38'),
(1127, 375, '', 'Kathleen Breitman', 1, '2018-10-24 20:29:38'),
(1129, 378, 'https://www.linkedin.com/in/rune-christensen-5b5220ab/', 'Rune Christensen', 1, '2018-10-24 20:32:59'),
(1130, 378, 'https://www.linkedin.com/in/andy-milenius-919922123', 'Andy Milenius', 1, '2018-10-24 20:32:59'),
(1131, 378, 'https://www.linkedin.com/in/steven-becker', 'Steven Becker', 1, '2018-10-24 20:32:59'),
(1132, 159, 'https://www.linkedin.com/in/junhase', 'Jun Hasegawa', 1, '2018-10-24 20:39:33'),
(1133, 159, '', 'Donnie Harinsut', 1, '2018-10-24 20:39:33'),
(1134, 368, 'https://www.linkedin.com/in/bitcoingold/', 'Jack Liao', 1, '2018-10-24 20:42:11'),
(1135, 368, '', 'Robert Kuhne', 1, '2018-10-24 20:42:11'),
(1136, 368, '', 'Alejandro Regojo', 1, '2018-10-24 20:42:11'),
(1137, 368, 'https://www.linkedin.com/in/martin-kuvandzhiev-061615a2/', 'Martin Kuvandzhiev', 1, '2018-10-24 20:42:11'),
(1138, 368, 'https://www.linkedin.com/in/franconiebles/', 'Franco Niebles', 1, '2018-10-24 20:42:11'),
(1141, 365, 'https://cn.linkedin.com/in/jun-li-58950069', 'Jun Li', 1, '2018-10-24 20:44:34'),
(1142, 62, 'https://www.linkedin.com/in/maxkordek?locale=en_US', 'Max Kordek', 1, '2018-10-24 20:45:21'),
(1143, 62, 'https://www.linkedin.com/in/oliver-beddows-19aa09107 ', 'Oliver Beddows', 1, '2018-10-24 20:45:21'),
(1144, 379, '', 'Yanislav Malahov', 1, '2018-10-24 20:47:03'),
(1145, 379, '', 'Sergei Evdokimov', 1, '2018-10-24 20:47:03'),
(1146, 376, 'https://www.linkedin.com/in/clemahieu', 'Colin LeMahieu ', 1, '2018-10-24 20:47:47'),
(1147, 380, 'https://www.linkedin.com/in/tjunhao/', 'Jun Hao Tan', 1, '2018-10-24 20:49:40'),
(1148, 380, 'https://www.linkedin.com/in/edisonljh/', 'Sheng Guang Xiao', 1, '2018-10-24 20:49:40'),
(1149, 380, 'https://www.linkedin.com/in/yangck/', 'Clark Yang', 1, '2018-10-24 20:49:40'),
(1151, 87, 'https://twitter.com/BrendanEich', 'Brendan Eich', 1, '2018-10-24 20:52:55'),
(1152, 87, 'https://twitter.com/brianbondy', 'Brian Bondy', 1, '2018-10-24 20:52:55'),
(1153, 67, 'http://www.linkedin.com/pub/jared-tate/90/9aa/257', 'Jared Tate', 1, '2018-10-24 20:54:25'),
(1156, 50, 'https://www.linkedin.com/in/sasha35625', 'SASHA IVANOV', 1, '2018-10-24 20:57:50'),
(1164, 71, '', 'jl777', 1, '2018-10-24 21:02:52'),
(1166, 40, 'https://pl.linkedin.com/in/julian-zawistowski-352478', 'Julian Zawistowski', 1, '2018-10-25 10:04:45'),
(1167, 40, 'http://pl.linkedin.com/in/viggith', 'Piotr ‘Viggith’ Janiuk', 1, '2018-10-25 10:04:45'),
(1168, 40, 'https://www.linkedin.com/pub/andrzej-regulski/18/8a8/529', 'Andrzej Regulski', 1, '2018-10-25 10:04:45'),
(1169, 40, 'https://www.linkedin.com/pub/aleksandra-skrzypczak/8a/16a/570  ', 'Aleksandra Skrzypczak', 1, '2018-10-25 10:04:45'),
(1170, 41, 'https://twitter.com/tensorjack', 'Jack Peterson', 1, '2018-10-25 10:06:52'),
(1171, 41, 'http://www.linkedin.com/in/joeykrug/en', 'Joey krug', 1, '2018-10-25 10:06:52'),
(1172, 43, 'https://www.linkedin.com/in/nedscott', 'Ned Scott', 1, '2018-10-25 10:24:17'),
(1173, 43, 'https://www.linkedin.com/in/daniel-larimer-0a367089', 'Dan Larimer', 1, '2018-10-25 10:24:17'),
(1174, 46, 'https://www.linkedin.com/in/daniel-larimer-0a367089', 'Daniel Larimer', 1, '2018-10-25 10:24:41'),
(1175, 47, '', 'Chris Trew', 1, '2018-10-25 10:25:17'),
(1176, 48, 'https://twitter.com/zooko', 'Zooko Wilcox', 1, '2018-10-25 10:25:35'),
(1177, 49, 'https://twitter.com/koeppelmann', 'MARTIN KÖPPELMANN', 1, '2018-10-25 10:25:54'),
(1178, 49, 'https://twitter.com/StefanDGeorge', 'STEFAN GEORGE', 1, '2018-10-25 10:25:54'),
(1179, 76, 'https://www.linkedin.com/in/alejandra-de-la-cerda-de-g-ba00b035', 'ALEJANDRA DE GAUSTAD', 1, '2018-10-25 10:26:59'),
(1180, 79, 'https://www.linkedin.com/in/expathos/', 'Richard Kastelein', 1, '2018-10-25 10:28:02'),
(1181, 79, 'https://www.facebook.com/george.basiladze', 'George Basiladze', 1, '2018-10-25 10:28:02'),
(1182, 79, 'https://www.linkedin.com/in/nipar', 'Nikita Parhomenko', 1, '2018-10-25 10:28:02'),
(1183, 83, '', 'David Sønstebø', 1, '2018-10-25 10:28:23'),
(1184, 98, '', 'PATRICK DAI', 1, '2018-10-25 10:31:03'),
(1185, 117, '', 'MOHAMMED ALSEHLI', 1, '2018-10-25 10:33:58'),
(1186, 117, '', 'MUSTAFA ALSULAMI', 1, '2018-10-25 10:33:58'),
(1187, 171, '', 'Robertas Visinskis', 1, '2018-10-25 10:37:36'),
(1188, 171, 'https://www.linkedin.com/in/paulius-mozuras-82b0027/', 'Paulius Mozuras', 1, '2018-10-25 10:37:36'),
(1189, 171, 'https://lt.linkedin.com/in/valdaspetrulis', 'Valdas Petrulis', 1, '2018-10-25 10:37:36'),
(1190, 177, '', 'Vinny Lingham', 1, '2018-10-25 10:41:20'),
(1191, 177, '', 'Llew Claasen', 1, '2018-10-25 10:41:20'),
(1192, 177, '', 'Gil Oved', 1, '2018-10-25 10:41:20'),
(1193, 197, '', 'jl777', 1, '2018-10-25 10:43:25'),
(1194, 199, '', 'Svante Lehtinen', 1, '2018-10-25 10:45:54'),
(1195, 199, '', 'Dennis de Klerk', 1, '2018-10-25 10:45:54'),
(1199, 236, 'https://www.linkedin.com/in/dmhco/', 'DANIEL M. HARRISON', 1, '2018-10-25 10:54:19'),
(1200, 236, 'https://www.linkedin.com/in/mcasil/', 'MARCELO GARCIA-CASIL', 1, '2018-10-25 10:54:19'),
(1201, 236, 'https://www.linkedin.com/in/darshan-vyas-02316426/', 'DARSHAN VYAS', 1, '2018-10-25 10:54:19'),
(1204, 387, '', 'Chang Jia', 1, '2018-10-26 03:24:13'),
(1205, 387, 'https://cn.linkedin.com/in/duan-xinxing-a6482a11', 'Duan Xinxing', 1, '2018-10-26 03:24:13'),
(1206, 388, 'https://www.linkedin.com/in/zibin', 'Zac Cheah', 1, '2018-10-26 03:32:36'),
(1207, 388, 'https://www.linkedin.com/in/pitt-huang-086591b/', 'Pitt Huang', 1, '2018-10-26 03:32:36'),
(1208, 389, 'https://www.linkedin.com/in/djan92/', 'Danny An', 1, '2018-10-26 04:34:47'),
(1209, 389, 'https://www.linkedin.com/in/rafaelcosman/', 'Rafael Cosman', 1, '2018-10-26 04:34:47'),
(1210, 389, 'https://www.linkedin.com/in/stephenkade/', 'Stephen Kade', 1, '2018-10-26 04:34:47'),
(1211, 389, 'https://www.linkedin.com/in/toryreiss/', 'Tory Reiss', 1, '2018-10-26 04:34:47'),
(1212, 390, 'https://www.linkedin.com/in/dmeister/', 'David Meister', 1, '2018-10-26 04:41:33'),
(1213, 390, 'https://www.linkedin.com/in/nicolas-luck-b424b89a/', 'Nicolas Luck', 1, '2018-10-26 04:41:33'),
(1214, 391, 'https://www.linkedin.com/in/theericgu/', 'Eric Gu', 1, '2018-10-26 04:47:41'),
(1215, 391, 'https://www.linkedin.com/in/betachen/', 'Chen Hao', 1, '2018-10-26 04:47:41'),
(1216, 392, 'https://www.linkedin.com/in/richard-ells-8b0615b/', 'Richard Ells', 1, '2018-10-26 05:02:55'),
(1217, 374, '', 'Satoshi Nakamato', 1, '2018-10-26 10:22:42'),
(1218, 37, 'https://twitter.com/splix', 'IGOR ARTAMONOV', 1, '2018-10-26 10:24:12'),
(1260, 412, 'http://www.linkedin.com/in/olegsharpatiy', 'Oleg Sharpatyy', 1, '2018-10-31 03:06:58'),
(1261, 412, 'https://www.linkedin.com/in/andrey-granovskiy-75253b161/', 'Andrey Granovskiy', 1, '2018-10-31 03:06:58'),
(1266, 400, 'https://www.linkedin.com/in/akashaggarwal009', 'Akash Aggarwal', 1, '2018-11-01 00:53:32'),
(1267, 395, '', 'Boy Ramsahai', 1, '2018-11-01 01:02:17'),
(1268, 397, 'https://www.linkedin.com/in/walter-g%C3%B3mez-061b0b156', 'Walter Gomez', 1, '2018-11-01 01:07:29'),
(1269, 411, 'https://www.linkedin.com/in/djcward/', 'David Ward', 1, '2018-11-01 01:11:33'),
(1270, 399, 'https://www.linkedin.com/in/aynsleydamery/', 'Aynsley Damery', 1, '2018-11-01 01:15:14'),
(1271, 410, 'https://www.linkedin.com/in/j-mohan-subedi-919b2b15b/', 'J.Mohan Subedi', 1, '2018-11-01 01:19:15'),
(1272, 410, 'https://www.linkedin.com/in/labu-ghimire-305794159/', 'Labu K. Ghimire', 1, '2018-11-01 01:19:15'),
(1273, 409, '', 'Oliver Preikschat', 1, '2018-11-01 01:21:54'),
(1275, 254, 'https://www.linkedin.com/in/craig-sproule-194907156', 'Craig Sproule', 1, '2018-11-01 01:23:07'),
(1276, 408, 'https://www.linkedin.com/in/laimonasnoreika/', 'Laimonas Noreika', 1, '2018-11-01 01:25:47'),
(1277, 408, 'https://www.linkedin.com/in/agriskevicius/', 'Audrius Griškevi?ius', 1, '2018-11-01 01:25:47'),
(1278, 408, 'https://www.linkedin.com/in/povilas-lau%C4%8Dius-a6561461/', 'Povilas Lau?ius', 1, '2018-11-01 01:25:47'),
(1279, 408, 'https://www.linkedin.com/in/darius-noreika/', 'Darius Noreika', 1, '2018-11-01 01:25:47'),
(1280, 408, 'https://www.linkedin.com/in/ethanpierse/', 'Ethan Pierse', 1, '2018-11-01 01:25:47'),
(1281, 408, 'https://www.linkedin.com/in/vsenavicius/', 'Dr. Vytautas Šenavi?ius', 1, '2018-11-01 01:25:47'),
(1282, 408, 'https://www.linkedin.com/in/vytautasm/', 'Vytautas Matulevi?ius', 1, '2018-11-01 01:25:47'),
(1283, 408, 'https://www.linkedin.com/in/nicomuro/', 'Nico Muro', 1, '2018-11-01 01:25:47'),
(1284, 408, 'https://www.linkedin.com/in/irmantas-kanopa', 'Irmantas Kanopa', 1, '2018-11-01 01:25:47'),
(1285, 408, 'https://www.linkedin.com/in/deividas-nork%C5%ABnas-9038b5144/', 'Deividas Nork?nas', 1, '2018-11-01 01:25:47'),
(1286, 408, 'https://www.linkedin.com/in/george-east-26507514a/', 'George East', 1, '2018-11-01 01:25:47'),
(1287, 408, 'https://www.linkedin.com/in/ingrida-willems-9b251925/', 'Ingrida Willems', 1, '2018-11-01 01:25:47'),
(1288, 408, 'https://www.linkedin.com/in/greta-jonaityt%C4%97-47b06a118/', 'Greta Jonaityt?', 1, '2018-11-01 01:25:47'),
(1289, 408, 'https://www.linkedin.com/in/augustinaskosys/', 'Augustinas Košys', 1, '2018-11-01 01:25:47'),
(1290, 408, 'https://www.linkedin.com/in/paleicikas/', 'Art?ras Palei?ikas', 1, '2018-11-01 01:25:47'),
(1291, 408, 'https://www.linkedin.com/in/raimondas-reinikis-5757651/', 'Raimondas Reinikis', 1, '2018-11-01 01:25:47'),
(1292, 408, 'https://www.linkedin.com/in/vitalijus-misikovas-bb56aaa7/', 'Vitalijus Misikovas', 1, '2018-11-01 01:25:47'),
(1293, 408, 'https://www.linkedin.com/in/marius-luko%C5%A1i%C5%ABnas-9a79357b/', 'Marius Lukoši?nas', 1, '2018-11-01 01:25:47'),
(1294, 393, 'https://www.linkedin.com/in/andresavilatorres', 'Andrés Ávila Torres', 1, '2018-11-01 01:29:36'),
(1295, 406, '', 'Mazlan Ahmad', 1, '2018-11-01 01:46:11'),
(1296, 406, 'https://www.linkedin.com/in/hamid-rashid-64576aaa/', 'Hamid Rashid', 1, '2018-11-01 01:46:11'),
(1297, 406, 'https://www.linkedin.com/in/satesh-khemlani-07a4a8b8/', 'Satesh Khemlani', 1, '2018-11-01 01:46:11'),
(1298, 413, 'https://www.linkedin.com/in/faiznazarali/', 'Faiz Nazarali', 1, '2018-11-01 01:51:58'),
(1299, 413, 'https://www.linkedin.com/in/johndavy1/', 'John Davy', 1, '2018-11-01 01:51:58'),
(1300, 402, 'https://www.linkedin.com/in/mahmut-ekici-79a15332/', 'MAHMUT EKICI', 1, '2018-11-01 01:54:01'),
(1301, 404, 'https://www.linkedin.com/in/adamkrzak/', 'ADAM KRZAK', 1, '2018-11-01 02:01:20'),
(1302, 404, 'https://www.linkedin.com/in/hubertkawicki/', 'HUBERT KAWICKI', 1, '2018-11-01 02:01:20'),
(1303, 403, 'https://www.linkedin.com/in/manuel-sparer-60492a168/', 'MANUEL SPARER', 1, '2018-11-01 02:09:05'),
(1304, 398, 'https://lt.linkedin.com/in/gadji-makhtiev-65355114b', 'Gadji Makhtiev', 1, '2018-11-01 02:11:52'),
(1305, 407, 'https://www.linkedin.com/in/artur-andonis-089203162/', 'Artur Andonis', 1, '2018-11-01 02:16:06'),
(1306, 407, 'https://www.linkedin.com/in/semion-tsitkilov-7ba413158/', 'Semion Tsitkilov', 1, '2018-11-01 02:16:06'),
(1307, 405, 'https://www.linkedin.com/in/garybracey/', 'Gary Bracey', 1, '2018-11-01 02:39:10'),
(1308, 405, 'https://www.linkedin.com/in/jawad-ashraf-7532315a/', 'Jawad Ashraf', 1, '2018-11-01 02:39:10'),
(1311, 401, 'https://www.linkedin.com/in/emilguberman/', 'EMIL GUBERMAN', 1, '2018-11-01 02:56:04'),
(1312, 384, 'https://www.linkedin.com/in/will-warren-92aab62b/', 'Will Warren', 1, '2018-11-08 20:16:43'),
(1313, 384, 'https://www.linkedin.com/in/abandeali1/', 'Amir Bandeali', 1, '2018-11-08 20:16:43'),
(1314, 33, 'https://twitter.com/vitalikbuterin', 'Vitalik Buterin', 1, '2018-11-09 08:41:04'),
(1315, 414, 'https://www.linkedin.com/in/asiannapoleon', 'Luong Hoang Anh', 1, '2018-11-09 08:41:58'),
(1316, 414, 'https://www.linkedin.com/in/toan-nguyen-trong-75677a117/', 'Tommy Lee', 1, '2018-11-09 08:41:58'),
(1317, 415, 'https://www.linkedin.com/in/gabrielerigo/', 'Gabriele Rigo', 1, '2018-11-15 03:25:12'),
(1318, 416, 'https://www.linkedin.com/in/kai-kim-55065584/', 'Kai Kim', 1, '2018-11-15 03:38:04'),
(1319, 417, 'https://www.linkedin.com/in/amir-farhand-77a10190/', 'Amir Farhand', 1, '2018-11-15 03:47:53'),
(1320, 418, 'https://www.linkedin.com/in/gabriel-young-19b05b139/', 'Gabriel Young', 1, '2018-11-15 04:53:57'),
(1321, 418, 'https://www.linkedin.com/in/jwstanton/', 'John Stanton', 1, '2018-11-15 04:53:57'),
(1322, 419, 'https://www.linkedin.com/in/sultan-ali-rashed-lootah-a3087824/', 'Mr. Sultan Ali Lootah', 1, '2018-11-15 21:22:03'),
(1323, 419, 'https://vn.linkedin.com/in/nguyen-phuong-82510a16', 'Mr. Duy Phuong Nguyen', 1, '2018-11-15 21:22:03'),
(1324, 419, 'https://www.linkedin.com/in/abdulla-lootah-16a16849/', 'Mr. Abdulla Ali Lootah', 1, '2018-11-15 21:22:03'),
(1325, 419, 'https://www.linkedin.com/in/dohongphuc-david/', 'Mr. Hong Phuc Do', 1, '2018-11-15 21:22:03'),
(1326, 419, 'https://www.linkedin.com/in/mohammad-ahli-3ab39932', 'Mr. Mohammad Ahli', 1, '2018-11-15 21:22:03'),
(1327, 419, 'https://www.linkedin.com/in/ali-juma-alajme-0a29a91a/', 'Mr. Ali Juma Alajme', 1, '2018-11-15 21:22:03'),
(1328, 419, '', 'Mr. Rajesh Gunani', 1, '2018-11-15 21:22:03'),
(1329, 419, 'https://www.linkedin.com/in/nagesh-prabhu-9317ba9/', 'Mr. Nagesh Ananth Prabhu', 1, '2018-11-15 21:22:03'),
(1330, 419, 'https://www.linkedin.com/in/abdullah-al-dabbous-1621b514/', 'Mr. Abdullah Al Dabbous', 1, '2018-11-15 21:22:03'),
(1331, 419, 'https://www.linkedin.com/in/mohammed-alnakhi-a2137b25/', 'Mr. Mohammed AlNakhi', 1, '2018-11-15 21:22:03'),
(1332, 419, 'https://www.linkedin.com/in/norman-khan-54748852/', 'Mr. Norman Khan', 1, '2018-11-15 21:22:03'),
(1333, 420, 'https://www.linkedin.com/in/jeffrey-huang-33b711157/', 'Jeffrey Huang', 1, '2018-11-15 21:30:39'),
(1334, 421, '', 'Muhammad Ahsan Khan', 1, '2018-11-15 21:45:52'),
(1335, 421, 'https://www.linkedin.com/in/atifmfarid/', 'Dr. Atif Farid (Ph.D)', 1, '2018-11-15 21:45:52'),
(1336, 421, 'https://www.linkedin.com/in/malikmudassir/', 'Malik Mudassir', 1, '2018-11-15 21:45:52'),
(1337, 421, 'https://www.linkedin.com/in/sharoze-kashif-10b1a5111/', 'Shahroze Kashif', 1, '2018-11-15 21:45:52'),
(1338, 422, 'https://www.linkedin.com/in/andrius-skakauskas-60354016a/', 'Andrius Skakauskas', 1, '2018-11-15 21:52:40'),
(1339, 423, 'https://www.linkedin.com/in/charlie-barton-59722315b/', 'Charlie Barton', 1, '2018-11-15 22:00:19'),
(1340, 423, 'https://www.linkedin.com/in/william-roberts-18299415b/', 'William Roberts', 1, '2018-11-15 22:00:19'),
(1341, 424, 'https://genuinefashiontoken.com/', 'Sam Wijnen', 1, '2018-11-15 22:10:09'),
(1342, 425, 'https://www.linkedin.com/in/ferrypilot/', 'June Lee', 1, '2018-11-15 22:19:15'),
(1343, 426, '', 'Ronaldinho', 1, '2018-11-15 22:39:38'),
(1344, 427, '', 'Aleksan Oganesyan', 1, '2018-11-15 22:52:07'),
(1345, 428, 'https://www.linkedin.com/in/fabrice-l-007698166/', 'Fabrice Lassala', 1, '2018-11-15 23:08:15'),
(1346, 428, 'https://www.linkedin.com/in/jeremy-carmona-177886133/', 'Jeremy Carmona', 1, '2018-11-15 23:08:15'),
(1347, 429, 'https://www.linkedin.com/in/marccriebe/', 'Marc C. Riebe-Roethlisberger', 1, '2018-11-15 23:39:22'),
(1348, 429, 'https://www.linkedin.com/in/daninnesinnesco/', 'Dan Innes', 1, '2018-11-15 23:39:22'),
(1349, 430, 'https://www.linkedin.com/in/oleg-tkachev-6a473182', 'Oleg Tkachev', 1, '2018-11-16 00:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `bop_company_milestones`
--

CREATE TABLE `bop_company_milestones` (
  `ms_id` int(11) NOT NULL,
  `ms_cmid` int(11) DEFAULT NULL,
  `ms_title` varchar(250) DEFAULT NULL,
  `ms_mss_id` tinyint(4) DEFAULT NULL,
  `ms_status` tinyint(4) DEFAULT NULL,
  `ms_createdat` datetime DEFAULT NULL,
  `ms_modifiedat` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_company_milestones`
--

INSERT INTO `bop_company_milestones` (`ms_id`, `ms_cmid`, `ms_title`, `ms_mss_id`, `ms_status`, `ms_createdat`, `ms_modifiedat`) VALUES
(409, 14, '150,000 total sale target ETH.  The first 999 users get Monaco Black card.', 2, 1, '2018-03-22 05:26:49', '2018-03-22 05:26:49'),
(28, 15, 'Some accomplishments are: partners with microsoft azure and heroku.  First signed service agreement with a Fortune 500 company.  Free software and a rapid growing network.', 2, 1, '2017-06-15 20:39:48', '2017-06-15 20:39:48'),
(182, 16, 'Starting with over 300 games up to 1000s games in 2017.', 2, 1, '2017-08-08 14:32:46', '2017-08-08 14:32:46'),
(594, 17, '2014: developed proprietary blockchain platform    2015: renewed core of the exchange    2016:exchange functions expansion    2017: chat wallet app launch    2018: full trading terminals launch', 2, 1, '2018-04-20 11:34:16', '2018-04-20 11:34:16'),
(32, 19, 'May 13,2017 ZrCoin opens a new office in China.  Idea March 2014, Study March 2014-July 2015, $1million invested in research and development, technology development July 2015-december 2016, website launch March 2017', 0, 1, '2017-06-15 22:11:42', '2017-06-15 22:11:42'),
(646, 37, 'July, 30 2015 Ethereum launches\r\nApril 5,2016 Slock.it creates the DAO\r\nApril 30,2016 TheDAO crowdsale begins\r\nMay 26,2016  Security proposal\r\nMay 27, 2016 Moratorium called\r\nMay 27,2016 The DAO crowdsale ends\r\nJune 9,2016 Recursive call bug discover', 2, 1, '2018-10-26 10:24:12', '2018-10-26 10:24:12'),
(628, 65, '$61,738,875  31,745 BTC\r\n', 0, 1, '2018-10-24 09:59:05', '2018-10-24 09:59:05'),
(35, 75, 'Minimum goal 5000 Ethereum token sale progress\r\n', 2, 1, '2017-07-08 20:10:56', '2017-07-08 20:10:56'),
(637, 76, 'June 2017=:Orocrypt built and now an ICO.  Contracts secured with bullion suppliers.  September 2017:  Launch of gold based tokens.  Each gold token represents 30g of LBMA gold.  October 2017:  Silver token launches.  December 2017:  Token reprsentin', 2, 1, '2018-10-25 10:26:59', '2018-10-25 10:26:59'),
(37, 77, 'May 2017: blockchain demo at bio-it Boston  July 2017: Token sale ends.  Distribute wallets with DNA tokens.  Finalize contract for purchase of nodes.   August 2017:  DNA tokens listed on crypto exchanges.  Expand sales and PR team, expand developer ', 2, 1, '2017-07-08 20:28:09', '2017-07-08 20:28:09'),
(638, 79, '\"Concept + MVP\r\nStage 0\r\n3 month\r\ndevelopment  Beta start\r\nStage 1\r\n100 000 tickets\r\nplayed  Presale\r\nStage 2\r\n180 BTC attracted   Token sale\r\nStage 3\r\nTarget 6125 BTC  Development\r\nand marketing\r\nStage 4\r\n3 additional lotteries \r\n10 000 000 tickets ', 2, 1, '2018-10-25 10:28:02', '2018-10-25 10:28:02'),
(621, 92, '2016\r\nQ3 2016\r\nDevelopment of slot prototype begins\r\n\r\n2017\r\nQ1 2017\r\nV0.1\r\n\r\nSlot using blockchain & smart contract\r\nMulti-spin & Free Spin features\r\n\r\nFebruary 2017\r\nSlot V.01 demo’d at EdCon 2017\r\n\r\nQ2 2017\r\nV0.2\r\n\r\nProvably fair slot using Fate C', 0, 1, '2018-10-18 09:10:59', '2018-10-18 09:10:59'),
(639, 117, '2017: formation March, automated swap April, manual swaps, June API, July smart builder, August Thuraya  June-dec developments', 2, 1, '2018-10-25 10:33:58', '2018-10-25 10:33:58'),
(45, 118, '\"MAY 2016 Peerplays team launches Seed Crowdfund - US$500,000 in bitcoin raised, JUNE 2016 PEERPLAYS UIA tokens begin trading on the BitShares decentralized exchange,JULY 2016 Peerplays team releases software code for the world\'s first on-chain profi', 2, 1, '2017-07-17 23:05:38', '2017-07-17 23:05:38'),
(619, 126, '\"Q32017\r\nLaunch of the first downloadable network node, users will be able to earn coins for powering the network.\r\nQ32017\r\nThe launch of our first applications on the Skywire Network: a decentralised, Redditesque, social media platform and VPN servi', 2, 1, '2018-10-18 08:39:13', '2018-10-18 08:39:13'),
(620, 129, '2017: MTP, Znodes, sigma protocol.  2018: sigma protocol, decentralized marketplace.  2019: zcoin labs, zcoin foundation blind auction system, decentralized voting system, inter blockchain transactions, implementation of blockchain scalability soluti', 2, 1, '2018-10-18 08:52:05', '2018-10-18 08:52:05'),
(50, 141, 'IOC released in early 2014.\r\n', 0, 1, '2017-07-18 00:39:52', '2017-07-18 00:39:52'),
(626, 157, '\"$1.5 million:Authorized Payment Institution  $3 million:Electronic Money Institution $6 million:Commercial Bank  $10 million:Digital Pass $25 million:SME Financial Marketplace  $50 million:Venture Capital,\r\nCrowdfunding  $100 million:\r\nCrowdfunding\r', 2, 1, '2018-10-19 03:51:13', '2018-10-19 03:51:13'),
(52, 161, '\"Idea creation\r\nMarch 2016\r\n \r\n\r\nConcept development\r\nAugust 2016\r\n \r\n\r\nWebsite launch\r\nFebruary 2017\r\n \r\n\r\nICO\r\nFebruary 2017\r\n \r\n\r\nE-coin Launch\r\nMarch 2017\r\n \r\n\r\nE-coinX\r\nApril 2017\"\r\n', 0, 1, '2017-07-18 02:16:17', '2017-07-18 02:16:17'),
(53, 163, '\"2016 November: Whitepaper Published, December:website launched, 2017: Quarter 1\r\nROSCA MVP with basic functions    Quarter 2\r\nIntermediate ROSCA (additional tokens, dashboard)    Quarter 4\r\nAdvanced ROSCA and Credit Profile\"\r\n', 2, 1, '2017-07-18 02:23:32', '2017-07-18 02:23:32'),
(640, 171, 'Founded and presale 2016 Tokensale 2017, Tokensale 2 2019', 0, 1, '2018-10-25 10:37:36', '2018-10-25 10:37:36'),
(69, 183, 'September 2016: Concept, October 2016: research, november 2016: whitepaper, december 2016: hiring, march 2017: crowdfunding, Q3 2017 public beta, Q4 2017 matchpool developer platform  Q1 2018 launch and dev\r\n', 2, 1, '2017-07-25 21:02:03', '2017-07-25 21:02:03'),
(597, 252, 'une 2017\r\n\r\nThe idea of a UTEMIS ecosystem was born. We researched what licenses, programmers, legal requirements, and financial and IT engineers would have to be acquired to create the UTEMIS Ecosystem. A 10-year business plan was created for the ec', 0, 1, '2018-04-20 11:38:04', '2018-04-20 11:38:04'),
(327, 256, 'Q3 2017\r\nIDEA,\r\nMARKET ANALYSIS,\r\nDEMO APP DEVELOPMENT\r\nQ4 2017\r\nWHITE PAPER\r\nAND SMART CONTRACT\r\nDEVELOPMENT\r\nQ1 2018\r\nCOMPANY REGISTRATION,\r\nVQF MEMBERSHIP AGREEMENT,\r\nPRE ICO\r\nQ2 2018\r\nTEAM DEVELOPMENT,\r\nPRODUCTION READY APP,\r\nICO\r\nQ3 2018\r\nTOKEN ', 0, 1, '2018-03-09 04:33:02', '2018-03-09 04:33:02'),
(595, 257, 'August An idea to create a blockchain project was born. 2016 SUMMER - Cooperation with TechGarden, IoT, FinTech, BlockChain. FALL - Researching new blockchain-based solutions; Searching for solutions to make users interested in working in the predict', 0, 1, '2018-04-20 11:37:19', '2018-04-20 11:37:19'),
(596, 258, 'Nov, 17\r\nCompany Inception\r\nDec, 17\r\nMarket research into the aviation and tourism industry. Acquired domain knowledge of real-time cryptocurrency transactions.\r\nJan, 18\r\nAcquired institutional investors. Agency partnership consolidations. Acquisitio', 0, 1, '2018-04-20 11:37:50', '2018-04-20 11:37:50'),
(331, 260, '2018/05/01\r\nICO Pre-sale\r\n \r\n2018/07/02\r\nICO Main-sale\r\n \r\n2018/08/01\r\nFinal MVP Development\r\n \r\n2018/10/01\r\nStart 3rd Party Participant Sign-ups\r\n \r\n2019/01/01\r\nStart Piloting Period\r\n \r\n2019/06/03\r\n1st Commercial Launch\r\n \r\n2020/01/01\r\nGlobal Marke', 0, 1, '2018-03-12 05:06:16', '2018-03-12 05:06:16'),
(630, 367, 'March 2014\r\nRaybo, the predecessor of Tron Foundation, established in Beijing, is China’s first Internet technology company in blockchain industry. \r\nMay 2014\r\nReceived investments from IDG Capital, Chris Larsen, Executive Chairman of Ripple\'s board ', 2, 1, '2018-10-24 10:09:18', '2018-10-24 10:09:18'),
(632, 368, 'https://bitcoingold.org/roadmap-2018/', 0, 1, '2018-10-24 20:42:11', '2018-10-24 20:42:11'),
(634, 376, 'https://developers.nano.org/roadmap', 2, 1, '2018-10-24 20:47:47', '2018-10-24 20:47:47'),
(633, 379, 'æternity Developer Conference\r\nTBA\r\nAirdrop\r\nTBA\r\nMainnet Launch\r\nLIVE TRACKER\r\n?\r\nSecurity Audit\r\nSTARTED\r\nQ2 2018\r\nStarfleet\r\nLAUNCHED\r\n?\r\nQ2 2018\r\næpps\r\nLAUNCHED\r\nQ3 2017\r\nSTARTED\r\nCore Development\r\nQ2 2017\r\nBacking Campaign\r\nQ2 2017\r\nProject\r\nSTA', 2, 1, '2018-10-24 20:47:03', '2018-10-24 20:47:03'),
(623, 381, 'May 2000\r\nChen Rong, a senior alumnus of Tsinghua University’s Computer Science department, returns to China from Microsoft USA and begins research and development for the first-generation Elastos network operating system.\r\n\r\nFebruary 2003\r\nChen Rong', 2, 1, '2018-10-18 09:25:54', '2018-10-18 09:25:54'),
(622, 382, 'September 2018\r\n\r\nCommercialized Dashboard & Marketplace\r\nBTC Interchain Library Smart Contract\r\nL4 Nodes (Community Provisioned)\r\nDecentralized L1 Capabilities (NEO)\r\nOctober 2018\r\n\r\nETH Proof of Existence (L5)\r\nETC Proof of Existence (L5)\r\nNEO Proo', 2, 1, '2018-10-18 09:23:41', '2018-10-18 09:23:41'),
(641, 385, 'ROADMAP\r\nFORKED AT BLOCK HEIGHT 495866\r\n\r\nNOVEMBER 2017\r\n\r\n1\r\nBitcoin Diamond is created as a hard fork of the Bitcoin (BTC) blockchain. Teams EVEY and 007 partnered to develop the necessary upgrades to improve upon Bitcoin’s original framework.\r\n\r\nM', 2, 1, '2018-10-26 03:06:03', '2018-10-26 03:06:03'),
(645, 392, 'July 2017\r\nElectroneum Ltd is formed and officially takes control of the Electroneum project.\r\n\r\n14th September 2017\r\nICO opens and is set to run until 1st November 2017. ETN Priced at $0.01c (USD)\r\n\r\n20th October 2017\r\nICO closes early due to reachi', 2, 1, '2018-10-26 05:02:55', '2018-10-26 05:02:55'),
(661, 393, '2016June\r\nCONCEPT\r\nApplying our beliefs about movie industry in a fair business model.\r\n\r\nConcept\r\n2017March\r\nBLOCKCHAIN TECHNOLOGY\r\nAdapting and enhancing Filmgrid to Blockchain Technology.\r\n\r\nBlockchain Technology\r\nNovember\r\nBUILDING THE PROJECT\r\nT', 2, 1, '2018-11-01 01:29:36', '2018-11-01 01:29:36'),
(664, 394, '2011\r\nThe BCI idea appeared. Training program development begun.\r\nadd_circle\r\n2012\r\nThe first program. The idea of operator training without using the recording and Classifier implemented. Brain patterns registry study and formation.\r\nadd_circle\r\n201', 2, 1, '2018-11-01 02:04:47', '2018-11-01 02:04:47'),
(658, 395, '2017\r\nResearch market & opportunities.\r\nQ2\r\n2017\r\nBusiness case studies and solution brainstorming.\r\nQ3\r\n2017\r\nFirst meetup with the founder, core team, and development team.\r\nBitCanna project launch.\r\nAdvisory board formed.\r\nQ4\r\n2017\r\nOutline the Bi', 2, 1, '2018-11-01 01:02:17', '2018-11-01 01:02:17'),
(659, 397, '2017 Creation of Mi Wall Street Beta\r\n2018 Incorporation  of Borser S.A. \r\nQ2 Private Sale\r\nQ4 ERC20 Token Creation\r\nDevelopment of Borsers platform based on Ethereum\r\nIncorporation of Mi Wall Street, Crowdingfunds and X-Change\r\nLicensing of Crowding', 2, 1, '2018-11-01 01:07:29', '2018-11-01 01:07:29'),
(660, 399, '2nd Quarter - 2017\r\nProject Concept\r\nJune 2017 the team meet at a B1G1 conference and come up with the basic idea of what would become the Clarity project.\r\n4th Quarter - 2017\r\nMeet Token Sale Advisors\r\nDecember 2017 the team meet with Token Sale adv', 2, 1, '2018-11-01 01:15:14', '2018-11-01 01:15:14'),
(665, 403, 'https://pantercon.com/en/roadmap.html', 2, 1, '2018-11-01 02:09:05', '2018-11-01 02:09:05'),
(663, 404, '2016 Moozicore concept created\r\n2017 Market research, Trademark registration, Moozicore on angellist, in best startup logos, team expansion. \r\n2018 Moozicore conduct token presale, service development finished, beacon technology integration,  service', 2, 1, '2018-11-01 02:01:20', '2018-11-01 02:01:20'),
(666, 405, 'https://www.terravirtua.io/#roadmap', 2, 1, '2018-11-01 02:39:10', '2018-11-01 02:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `bop_company_milestone_status`
--

CREATE TABLE `bop_company_milestone_status` (
  `mss_id` int(11) NOT NULL,
  `mss_status` varchar(50) DEFAULT NULL,
  `mss_createdat` datetime DEFAULT NULL,
  `mss_modifiedat` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_company_milestone_status`
--

INSERT INTO `bop_company_milestone_status` (`mss_id`, `mss_status`, `mss_createdat`, `mss_modifiedat`) VALUES
(1, 'Completed', '2017-05-18 11:55:31', '2017-05-18 11:55:35'),
(2, 'In Progress', '2017-05-18 11:55:51', '2017-05-18 11:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `bop_company_portfolio`
--

CREATE TABLE `bop_company_portfolio` (
  `cp_id` int(11) NOT NULL,
  `cp_cmid` int(11) DEFAULT NULL,
  `cp_picture` varchar(100) DEFAULT NULL,
  `cp_status` tinyint(4) DEFAULT NULL,
  `cp_modifiedat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_company_portfolio`
--

INSERT INTO `bop_company_portfolio` (`cp_id`, `cp_cmid`, `cp_picture`, `cp_status`, `cp_modifiedat`) VALUES
(6, 10, '_20170609_120908.', 1, '2017-06-09 12:09:08'),
(20, 15, '_20170615_203948.', 1, '2017-06-15 20:39:48'),
(24, 19, '_20170615_221142.', 1, '2017-06-15 22:11:42'),
(27, 22, '_20170616_114053.', 1, '2017-06-16 11:40:53'),
(28, 23, '_20170616_114630.', 1, '2017-06-16 11:46:30'),
(29, 24, '_20170616_114730.', 1, '2017-06-16 11:47:30'),
(30, 25, '_20170616_115015.', 1, '2017-06-16 11:50:15'),
(35, 30, '_20170616_141131.', 1, '2017-06-16 14:11:31'),
(36, 31, '_20170616_145023.', 1, '2017-06-16 14:50:23'),
(37, 32, '_20170616_145224.', 1, '2017-06-16 14:52:24'),
(49, 44, '_20170617_073001.', 1, '2017-06-17 07:30:01'),
(59, 53, '_20170628_043911.', 1, '2017-06-28 04:39:11'),
(61, 54, '_20170628_050552.', 1, '2017-06-28 05:08:44'),
(65, 57, '_20170630_040722.', 1, '2017-06-30 23:18:53'),
(68, 60, '_20170630_233844.', 1, '2017-06-30 23:38:44'),
(72, 64, '_20170707_002902.', 1, '2017-07-07 00:29:02'),
(81, 72, '_20170707_012046.', 1, '2017-07-07 01:20:46'),
(82, 73, '_20170707_014905.', 1, '2017-07-07 01:49:05'),
(84, 75, '_20170708_201056.', 1, '2017-07-08 20:10:56'),
(86, 77, '_20170708_202809.', 1, '2017-07-08 20:28:09'),
(87, 78, '_20170708_203317.', 1, '2017-07-08 20:33:17'),
(90, 81, 'decred tech paper_20170717_063703.pdf', 1, '2017-07-17 06:37:03'),
(91, 82, 'decred tech paper_20170717_074029.pdf', 1, '2017-07-17 07:40:29'),
(98, 89, '_20170717_211202.', 1, '2017-07-17 21:12:02'),
(100, 91, '_20170717_212135.', 1, '2017-07-17 21:21:35'),
(102, 93, '_20170717_212924.', 1, '2017-07-17 21:29:24'),
(103, 94, '_20170717_213201.', 1, '2017-07-17 21:32:01'),
(105, 96, '_20170717_213737.', 1, '2017-07-17 21:37:37'),
(106, 97, '_20170717_214023.', 1, '2017-07-17 21:40:23'),
(111, 102, '_20170717_215907.', 1, '2017-07-17 21:59:07'),
(112, 103, '_20170717_220306.', 1, '2017-07-17 22:03:06'),
(115, 106, '_20170717_221214.', 1, '2017-07-17 22:12:14'),
(116, 107, '_20170717_221409.', 1, '2017-07-17 22:14:09'),
(125, 116, '_20170717_225723.', 1, '2017-07-17 22:57:23'),
(127, 118, '_20170717_230538.', 1, '2017-07-17 23:05:38'),
(130, 121, '_20170717_231529.', 1, '2017-07-17 23:15:29'),
(131, 122, '_20170717_231738.', 1, '2017-07-17 23:17:38'),
(132, 123, '_20170717_232054.', 1, '2017-07-17 23:20:54'),
(133, 124, '_20170717_232854.', 1, '2017-07-17 23:28:54'),
(136, 127, '_20170717_234055.', 1, '2017-07-17 23:40:55'),
(137, 128, '_20170717_234249.', 1, '2017-07-17 23:42:49'),
(139, 130, '_20170717_234853.', 1, '2017-07-17 23:48:53'),
(140, 131, '_20170717_235325.', 1, '2017-07-17 23:53:25'),
(142, 133, '_20170717_235843.', 1, '2017-07-17 23:58:43'),
(143, 134, '_20170718_000019.', 1, '2017-07-18 00:00:19'),
(148, 139, '_20170718_001612.', 1, '2017-07-18 00:16:12'),
(149, 140, '_20170718_001747.', 1, '2017-07-18 00:17:47'),
(152, 141, '_20170718_002411.', 1, '2017-07-18 00:39:52'),
(160, 150, '_20170718_011738.', 1, '2017-07-18 01:17:38'),
(164, 154, '_20170718_014309.', 1, '2017-07-18 01:43:09'),
(165, 155, '_20170718_014550.', 1, '2017-07-18 01:45:50'),
(166, 156, '_20170718_014807.', 1, '2017-07-18 01:48:07'),
(170, 160, '_20170718_021336.', 1, '2017-07-18 02:13:36'),
(171, 161, '_20170718_021617.', 1, '2017-07-18 02:16:17'),
(173, 163, '_20170718_022332.', 1, '2017-07-18 02:23:32'),
(185, 166, '_20170724_215255.', 1, '2017-07-24 21:52:55'),
(191, 172, '_20170724_223110.', 1, '2017-07-24 22:31:10'),
(193, 173, '_20170724_223419.', 1, '2017-07-24 22:34:19'),
(195, 175, '_20170724_224046.', 1, '2017-07-24 22:40:46'),
(196, 176, '_20170724_224244.', 1, '2017-07-24 22:42:44'),
(199, 179, '_20170724_225122.', 1, '2017-07-24 22:51:22'),
(200, 180, '_20170724_225834.', 1, '2017-07-24 22:58:34'),
(203, 183, '_20170725_210203.', 1, '2017-07-25 21:02:03'),
(204, 184, '_20170725_210421.', 1, '2017-07-25 21:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `bop_company_resources`
--

CREATE TABLE `bop_company_resources` (
  `cr_id` int(11) NOT NULL,
  `cr_name` varchar(255) DEFAULT NULL,
  `cr_cmid` int(11) DEFAULT NULL,
  `cr_url` varchar(500) DEFAULT NULL,
  `cr_status` int(11) DEFAULT NULL,
  `cr_created_at` datetime DEFAULT NULL,
  `cr_updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_company_resources`
--

INSERT INTO `bop_company_resources` (`cr_id`, `cr_name`, `cr_cmid`, `cr_url`, `cr_status`, `cr_created_at`, `cr_updated_at`) VALUES
(174, 'White paper', 11, 'https://bitcoin.org/bitcoin.pdf', 1, '2018-03-21 07:22:07', '2018-03-21 07:22:07'),
(476, 'White paper', 143, 'https://adtoken.com/uploads/white-paper.pdf', 1, '2018-10-24 13:18:44', '2018-10-24 13:18:44'),
(452, 'White Paper', 369, 'https://bitcoin.org/bitcoin.pdf', 1, '2018-05-15 09:23:24', '2018-05-15 09:23:24'),
(453, 'White Paper', 370, 'https://bitcoin.org/bitcoin.pdf', 1, '2018-05-15 09:23:35', '2018-05-15 09:23:35'),
(454, 'White Paper', 371, 'https://bitcoin.org/bitcoin.pdf', 1, '2018-05-15 09:26:45', '2018-05-15 09:26:45'),
(455, 'White Paper', 372, 'https://bitcoin.org/bitcoin.pdf', 1, '2018-05-15 09:29:27', '2018-05-15 09:29:27'),
(456, 'White Paper', 373, 'https://bitcoin.org/bitcoin.pdf', 1, '2018-05-15 09:32:55', '2018-05-15 09:32:55'),
(477, 'White Paper', 374, 'https://bitcoin.org/bitcoin.pdf', 1, '2018-10-26 10:22:42', '2018-10-26 10:22:42'),
(473, 'Ripple Consensus Protocol', 34, 'https://ripple.com/files/ripple_consensus_whitepaper.pdf', 1, '2018-10-24 04:50:56', '2018-10-24 04:50:56'),
(472, 'Ripple Solutions', 34, 'https://ripple.com/files/ripple_solutions_guide.pdf', 1, '2018-10-24 04:50:56', '2018-10-24 04:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `bop_company_reviews`
--

CREATE TABLE `bop_company_reviews` (
  `re_id` int(11) NOT NULL,
  `re_uid` int(11) DEFAULT NULL,
  `re_cmid` int(11) DEFAULT NULL,
  `re_rating` varchar(50) DEFAULT NULL,
  `re_decript` text,
  `re_agree` tinyint(4) DEFAULT NULL,
  `re_likes_cnt` int(11) DEFAULT NULL,
  `re_dislike_cnt` int(11) DEFAULT NULL,
  `re_reports_cnt` int(11) DEFAULT NULL,
  `re_status` tinyint(4) DEFAULT NULL,
  `re_createdat` datetime DEFAULT NULL,
  `re_modifiedat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_company_reviews`
--

INSERT INTO `bop_company_reviews` (`re_id`, `re_uid`, `re_cmid`, `re_rating`, `re_decript`, `re_agree`, `re_likes_cnt`, `re_dislike_cnt`, `re_reports_cnt`, `re_status`, `re_createdat`, `re_modifiedat`) VALUES
(84, 97, 59, '5', 'The team behind Decred is one of the best ones I have seen in crypto', 1, NULL, NULL, 1, 1, '2018-10-24 23:15:23', NULL),
(85, 97, 18, '5', 'It\'s one of a kind project', 1, 0, 1, 1, 1, '2018-10-25 00:02:05', '2018-12-17 15:37:36'),
(95, 97, 417, '4', 'test', 1, NULL, NULL, NULL, 1, '2018-11-16 09:32:38', NULL),
(96, 103, 18, '5', 'hello ', 1, 1, 0, 1, 1, '2018-12-17 15:31:05', '2018-12-17 18:32:26'),
(97, 103, 18, '3.5', 'Very Good', 1, NULL, NULL, NULL, 1, '2018-12-21 02:27:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bop_company_review_replies`
--

CREATE TABLE `bop_company_review_replies` (
  `crr_id` int(11) NOT NULL,
  `crr_uid` int(11) DEFAULT NULL,
  `crr_reid` int(11) DEFAULT NULL,
  `crr_rating` int(11) DEFAULT NULL,
  `crr_decript` text,
  `crr_agree` tinyint(4) DEFAULT NULL,
  `crr_likes_cnt` int(11) DEFAULT NULL,
  `crr_dislike_cnt` int(11) DEFAULT NULL,
  `crr_reports_cnt` int(11) DEFAULT NULL,
  `crr_status` tinyint(4) DEFAULT NULL,
  `crr_createdat` datetime DEFAULT NULL,
  `crr_modifiedat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_company_review_replies`
--

INSERT INTO `bop_company_review_replies` (`crr_id`, `crr_uid`, `crr_reid`, `crr_rating`, `crr_decript`, `crr_agree`, `crr_likes_cnt`, `crr_dislike_cnt`, `crr_reports_cnt`, `crr_status`, `crr_createdat`, `crr_modifiedat`) VALUES
(1, 103, 85, NULL, 'Hello', NULL, 0, 0, NULL, 1, '2018-12-17 16:11:15', NULL),
(2, 103, 85, NULL, 'helo\n', NULL, 0, 0, NULL, 1, '2018-12-17 16:35:34', NULL),
(3, 103, 96, NULL, 'My name is Vibhor Upreti and I am one of the best coders in the world. Even though i am just starting out, there will be no one like me.', NULL, 0, 0, NULL, 1, '2018-12-17 17:38:08', NULL),
(4, 103, 96, NULL, 'Ethereum is an open-source 1.', NULL, 0, 0, NULL, 1, '2018-12-17 17:39:15', '2018-12-17 19:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `bop_company_tradingexchanges`
--

CREATE TABLE `bop_company_tradingexchanges` (
  `te_id` int(11) NOT NULL,
  `te_cmid` int(11) DEFAULT NULL,
  `te_title` varchar(150) DEFAULT NULL,
  `te_url` varchar(500) DEFAULT NULL,
  `te_status` tinyint(4) DEFAULT NULL,
  `te_createdat` datetime DEFAULT NULL,
  `te_modifiedat` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_company_tradingexchanges`
--

INSERT INTO `bop_company_tradingexchanges` (`te_id`, `te_cmid`, `te_title`, `te_url`, `te_status`, `te_createdat`, `te_modifiedat`) VALUES
(553, 369, 'Bitfinex', 'https://www.bitfinex.com/', 1, '2018-05-15 09:23:24', '2018-05-15 09:23:24'),
(554, 369, 'OKEx', 'https://www.okex.com', 1, '2018-05-15 09:23:24', '2018-05-15 09:23:24'),
(555, 369, 'Binance', 'https://www.binance.com/', 1, '2018-05-15 09:23:24', '2018-05-15 09:23:24'),
(556, 369, 'bitFlyer', 'https://bitflyer.com', 1, '2018-05-15 09:23:24', '2018-05-15 09:23:24'),
(557, 369, 'Huobi', 'https://www.huobi.com/', 1, '2018-05-15 09:23:24', '2018-05-15 09:23:24'),
(558, 369, 'Bitstamp', 'https://www.bitstamp.com/', 1, '2018-05-15 09:23:24', '2018-05-15 09:23:24'),
(559, 369, 'GDAX', 'https://www.gdax.com/', 1, '2018-05-15 09:23:24', '2018-05-15 09:23:24'),
(560, 369, 'Upbit', 'https://upbit.com/', 1, '2018-05-15 09:23:24', '2018-05-15 09:23:24'),
(561, 369, 'Bithumb', 'https://www.bithumb.com/', 1, '2018-05-15 09:23:24', '2018-05-15 09:23:24'),
(562, 369, 'Kraken', 'https://www.kraken.com/', 1, '2018-05-15 09:23:24', '2018-05-15 09:23:24'),
(563, 369, 'Gemini', 'https://gemini.com/', 1, '2018-05-15 09:23:24', '2018-05-15 09:23:24'),
(564, 369, 'Bittrex', 'https://bittrex.com/', 1, '2018-05-15 09:23:24', '2018-05-15 09:23:24'),
(565, 370, 'Bitfinex', 'https://www.bitfinex.com/', 1, '2018-05-15 09:23:35', '2018-05-15 09:23:35'),
(566, 370, 'OKEx', 'https://www.okex.com', 1, '2018-05-15 09:23:35', '2018-05-15 09:23:35'),
(567, 370, 'Binance', 'https://www.binance.com/', 1, '2018-05-15 09:23:36', '2018-05-15 09:23:36'),
(568, 370, 'bitFlyer', 'https://bitflyer.com', 1, '2018-05-15 09:23:36', '2018-05-15 09:23:36'),
(569, 370, 'Huobi', 'https://www.huobi.com/', 1, '2018-05-15 09:23:36', '2018-05-15 09:23:36'),
(570, 370, 'Bitstamp', 'https://www.bitstamp.com/', 1, '2018-05-15 09:23:36', '2018-05-15 09:23:36'),
(571, 370, 'GDAX', 'https://www.gdax.com/', 1, '2018-05-15 09:23:36', '2018-05-15 09:23:36'),
(572, 370, 'Upbit', 'https://upbit.com/', 1, '2018-05-15 09:23:36', '2018-05-15 09:23:36'),
(573, 370, 'Bithumb', 'https://www.bithumb.com/', 1, '2018-05-15 09:23:36', '2018-05-15 09:23:36'),
(574, 370, 'Kraken', 'https://www.kraken.com/', 1, '2018-05-15 09:23:36', '2018-05-15 09:23:36'),
(575, 370, 'Gemini', 'https://gemini.com/', 1, '2018-05-15 09:23:36', '2018-05-15 09:23:36'),
(576, 370, 'Bittrex', 'https://bittrex.com/', 1, '2018-05-15 09:23:36', '2018-05-15 09:23:36'),
(577, 371, 'Bitfinex', 'https://www.bitfinex.com/', 1, '2018-05-15 09:26:45', '2018-05-15 09:26:45'),
(578, 371, 'OKEx', 'https://www.okex.com', 1, '2018-05-15 09:26:45', '2018-05-15 09:26:45'),
(579, 371, 'Binance', 'https://www.binance.com/', 1, '2018-05-15 09:26:45', '2018-05-15 09:26:45'),
(580, 371, 'bitFlyer', 'https://bitflyer.com', 1, '2018-05-15 09:26:45', '2018-05-15 09:26:45'),
(581, 371, 'Huobi', 'https://www.huobi.com/', 1, '2018-05-15 09:26:45', '2018-05-15 09:26:45'),
(582, 371, 'Bitstamp', 'https://www.bitstamp.com/', 1, '2018-05-15 09:26:45', '2018-05-15 09:26:45'),
(583, 371, 'GDAX', 'https://www.gdax.com/', 1, '2018-05-15 09:26:45', '2018-05-15 09:26:45'),
(584, 371, 'Upbit', 'https://upbit.com/', 1, '2018-05-15 09:26:45', '2018-05-15 09:26:45'),
(585, 371, 'Bithumb', 'https://www.bithumb.com/', 1, '2018-05-15 09:26:45', '2018-05-15 09:26:45'),
(586, 371, 'Kraken', 'https://www.kraken.com/', 1, '2018-05-15 09:26:45', '2018-05-15 09:26:45'),
(587, 371, 'Gemini', 'https://gemini.com/', 1, '2018-05-15 09:26:45', '2018-05-15 09:26:45'),
(588, 371, 'Bittrex', 'https://bittrex.com/', 1, '2018-05-15 09:26:45', '2018-05-15 09:26:45'),
(589, 372, 'Bitfinex', 'https://www.bitfinex.com/', 1, '2018-05-15 09:29:27', '2018-05-15 09:29:27'),
(590, 372, 'OKEx', 'https://www.okex.com', 1, '2018-05-15 09:29:27', '2018-05-15 09:29:27'),
(591, 372, 'Binance', 'https://www.binance.com/', 1, '2018-05-15 09:29:27', '2018-05-15 09:29:27'),
(592, 372, 'bitFlyer', 'https://bitflyer.com', 1, '2018-05-15 09:29:27', '2018-05-15 09:29:27'),
(593, 372, 'Huobi', 'https://www.huobi.com/', 1, '2018-05-15 09:29:27', '2018-05-15 09:29:27'),
(594, 372, 'Bitstamp', 'https://www.bitstamp.com/', 1, '2018-05-15 09:29:27', '2018-05-15 09:29:27'),
(595, 372, 'GDAX', 'https://www.gdax.com/', 1, '2018-05-15 09:29:27', '2018-05-15 09:29:27'),
(596, 372, 'Upbit', 'https://upbit.com/', 1, '2018-05-15 09:29:27', '2018-05-15 09:29:27'),
(597, 372, 'Bithumb', 'https://www.bithumb.com/', 1, '2018-05-15 09:29:27', '2018-05-15 09:29:27'),
(598, 372, 'Kraken', 'https://www.kraken.com/', 1, '2018-05-15 09:29:27', '2018-05-15 09:29:27'),
(599, 372, 'Gemini', 'https://gemini.com/', 1, '2018-05-15 09:29:27', '2018-05-15 09:29:27'),
(600, 372, 'Bittrex', 'https://bittrex.com/', 1, '2018-05-15 09:29:27', '2018-05-15 09:29:27'),
(601, 373, 'Bitfinex', 'https://www.bitfinex.com/', 1, '2018-05-15 09:32:55', '2018-05-15 09:32:55'),
(602, 373, 'OKEx', 'https://www.okex.com', 1, '2018-05-15 09:32:55', '2018-05-15 09:32:55'),
(603, 373, 'Binance', 'https://www.binance.com/', 1, '2018-05-15 09:32:55', '2018-05-15 09:32:55'),
(604, 373, 'bitFlyer', 'https://bitflyer.com', 1, '2018-05-15 09:32:55', '2018-05-15 09:32:55'),
(605, 373, 'Huobi', 'https://www.huobi.com/', 1, '2018-05-15 09:32:55', '2018-05-15 09:32:55'),
(606, 373, 'Bitstamp', 'https://www.bitstamp.com/', 1, '2018-05-15 09:32:55', '2018-05-15 09:32:55'),
(607, 373, 'GDAX', 'https://www.gdax.com/', 1, '2018-05-15 09:32:55', '2018-05-15 09:32:55'),
(608, 373, 'Upbit', 'https://upbit.com/', 1, '2018-05-15 09:32:55', '2018-05-15 09:32:55'),
(609, 373, 'Bithumb', 'https://www.bithumb.com/', 1, '2018-05-15 09:32:55', '2018-05-15 09:32:55'),
(610, 373, 'Kraken', 'https://www.kraken.com/', 1, '2018-05-15 09:32:55', '2018-05-15 09:32:55'),
(611, 373, 'Gemini', 'https://gemini.com/', 1, '2018-05-15 09:32:55', '2018-05-15 09:32:55'),
(612, 373, 'Bittrex', 'https://bittrex.com/', 1, '2018-05-15 09:32:55', '2018-05-15 09:32:55'),
(732, 374, 'Bittrex', 'https://bittrex.com/', 1, '2018-10-26 10:22:42', '2018-10-26 10:22:42'),
(731, 374, 'Gemini', 'https://gemini.com/', 1, '2018-10-26 10:22:42', '2018-10-26 10:22:42'),
(730, 374, 'Kraken', 'https://www.kraken.com/', 1, '2018-10-26 10:22:42', '2018-10-26 10:22:42'),
(728, 374, 'Upbit', 'https://upbit.com/', 1, '2018-10-26 10:22:42', '2018-10-26 10:22:42'),
(729, 374, 'Bithumb', 'https://www.bithumb.com/', 1, '2018-10-26 10:22:42', '2018-10-26 10:22:42'),
(727, 374, 'GDAX', 'https://www.gdax.com/', 1, '2018-10-26 10:22:42', '2018-10-26 10:22:42'),
(726, 374, 'Bitstamp', 'https://www.bitstamp.com/', 1, '2018-10-26 10:22:42', '2018-10-26 10:22:42'),
(725, 374, 'Huobi', 'https://www.huobi.com/', 1, '2018-10-26 10:22:42', '2018-10-26 10:22:42'),
(724, 374, 'bitFlyer', 'https://bitflyer.com', 1, '2018-10-26 10:22:42', '2018-10-26 10:22:42'),
(723, 374, 'Binance', 'https://www.binance.com/', 1, '2018-10-26 10:22:42', '2018-10-26 10:22:42'),
(722, 374, 'OKEx', 'https://www.okex.com', 1, '2018-10-26 10:22:42', '2018-10-26 10:22:42'),
(721, 374, 'Bitfinex', 'https://www.bitfinex.com/', 1, '2018-10-26 10:22:42', '2018-10-26 10:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `bop_company_type`
--

CREATE TABLE `bop_company_type` (
  `ct_id` int(11) NOT NULL,
  `ct_name` varchar(50) DEFAULT NULL,
  `ct_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_company_type`
--

INSERT INTO `bop_company_type` (`ct_id`, `ct_name`, `ct_status`) VALUES
(1, 'Digital Asset', 1),
(2, 'ICO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bop_company_views`
--

CREATE TABLE `bop_company_views` (
  `cmv_id` int(11) NOT NULL,
  `cmv_cmid` int(11) DEFAULT NULL,
  `cmv_viewerid` varchar(100) DEFAULT NULL,
  `cmv_viewscnt` int(11) DEFAULT NULL,
  `cmv_status` tinyint(4) DEFAULT NULL,
  `cmv_createdat` datetime DEFAULT NULL,
  `cmv_modifiedat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bop_countries`
--

CREATE TABLE `bop_countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bop_countries`
--

INSERT INTO `bop_countries` (`id`, `sortname`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Congo', 242),
(50, 'CD', 'Congo The Democratic Republic Of The', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225),
(54, 'HR', 'Croatia (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 0),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 0),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 0),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 0),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands (British)', 1284),
(240, 'VI', 'Virgin Islands (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `bop_escrow_details`
--

CREATE TABLE `bop_escrow_details` (
  `ed_id` int(11) NOT NULL,
  `ed_cmid` int(11) DEFAULT NULL,
  `ed_name` varchar(255) DEFAULT NULL,
  `ed_url` varchar(500) DEFAULT NULL,
  `ed_status` int(11) DEFAULT NULL,
  `ed_created_at` datetime DEFAULT NULL,
  `ed_updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bop_forgot_tokens`
--

CREATE TABLE `bop_forgot_tokens` (
  `ft_id` int(11) NOT NULL,
  `ft_uid` int(11) DEFAULT NULL,
  `ft_tokencode` varchar(50) DEFAULT NULL,
  `ft_status` tinyint(4) DEFAULT NULL,
  `ft_createdat` datetime DEFAULT NULL,
  `ft_modifiedat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_forgot_tokens`
--

INSERT INTO `bop_forgot_tokens` (`ft_id`, `ft_uid`, `ft_tokencode`, `ft_status`, `ft_createdat`, `ft_modifiedat`) VALUES
(3, 34, '15ac75e33f', 1, '2017-06-14 15:45:10', '2017-06-20 17:01:36'),
(4, 26, '9d643818e4', 1, '2017-06-14 15:53:56', NULL),
(5, 31, 'fa38d68700', 1, '2017-06-19 14:29:18', '2017-06-20 16:31:29'),
(6, 2, '5940327859', 1, '2017-06-19 14:37:59', '2017-06-19 15:47:26'),
(7, 18, '7d033542ab', 1, '2017-06-19 15:59:52', '2017-06-19 16:39:42'),
(9, 44, 'a290f31e3f', 1, '2017-07-17 04:45:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bop_replies_reponses`
--

CREATE TABLE `bop_replies_reponses` (
  `rrr_id` int(11) NOT NULL,
  `rrr_uid` int(11) DEFAULT NULL,
  `rrr_crr_id` int(11) DEFAULT NULL,
  `rrr_likes_dislikes` tinyint(4) DEFAULT NULL,
  `rrr_report` int(11) DEFAULT NULL,
  `rrr_report_reponse` int(11) DEFAULT NULL,
  `rrr_status` tinyint(4) DEFAULT NULL,
  `rrr_createdat` datetime DEFAULT NULL,
  `rrr_modifiedat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_replies_reponses`
--

INSERT INTO `bop_replies_reponses` (`rrr_id`, `rrr_uid`, `rrr_crr_id`, `rrr_likes_dislikes`, `rrr_report`, `rrr_report_reponse`, `rrr_status`, `rrr_createdat`, `rrr_modifiedat`) VALUES
(1, 31, 1, 0, 0, 0, 1, '2017-08-05 12:10:33', '2018-05-01 10:22:36'),
(2, 1, 1, 0, NULL, NULL, 1, '2017-08-11 06:54:45', NULL),
(3, 31, 3, 0, NULL, NULL, 1, '2017-08-17 18:14:51', NULL),
(4, 2, 3, 0, NULL, NULL, 1, '2017-08-29 12:50:05', NULL),
(5, 1, 5, 0, NULL, NULL, 1, '2017-08-30 09:12:22', NULL),
(6, 1, 22, 0, NULL, NULL, 1, '2017-09-08 10:05:34', NULL),
(7, 31, 26, 1, 0, 0, 1, '2017-09-11 16:42:50', '2018-05-01 10:22:34'),
(8, 43, 73, 1, 0, 0, 1, '2018-02-27 10:06:00', '2018-05-01 10:22:32'),
(9, 1, 74, 1, NULL, NULL, 1, '2018-10-19 02:36:31', '2018-10-25 10:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `bop_review_reponses`
--

CREATE TABLE `bop_review_reponses` (
  `rr_id` int(11) NOT NULL,
  `rr_uid` int(11) DEFAULT NULL,
  `rr_reid` int(11) DEFAULT NULL,
  `rr_like_dislike` tinyint(4) DEFAULT NULL,
  `rr_report` tinyint(4) DEFAULT NULL,
  `rr_report_reponse` int(11) DEFAULT NULL,
  `rr_status` tinyint(4) DEFAULT NULL,
  `rr_createdat` datetime DEFAULT NULL,
  `rr_modifiedat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_review_reponses`
--

INSERT INTO `bop_review_reponses` (`rr_id`, `rr_uid`, `rr_reid`, `rr_like_dislike`, `rr_report`, `rr_report_reponse`, `rr_status`, `rr_createdat`, `rr_modifiedat`) VALUES
(1, 31, 12, 1, 0, 0, 1, '2017-08-05 12:09:15', '2018-05-01 10:22:03'),
(2, 31, 10, 1, NULL, NULL, 1, '2017-08-08 12:38:21', NULL),
(3, 1, 4, 0, 0, 0, 1, '2017-08-11 06:38:52', '2018-05-01 10:22:15'),
(4, 1, 5, 0, NULL, NULL, 1, '2017-08-11 06:39:22', '2017-08-11 11:30:37'),
(5, 1, 12, 0, NULL, NULL, 1, '2017-08-11 06:54:42', NULL),
(6, 28, 1, 0, NULL, NULL, 1, '2017-08-11 11:30:21', NULL),
(7, 2, 12, 0, NULL, NULL, 1, '2017-08-11 14:50:36', '2017-08-11 14:50:45'),
(8, 43, 26, 0, 0, 0, 1, '2017-08-13 08:42:08', '2018-05-01 10:22:06'),
(9, 31, 45, 0, NULL, NULL, 1, '2017-08-17 18:14:26', '2017-08-17 18:14:44'),
(10, 31, 30, 0, NULL, NULL, 1, '2017-08-28 15:26:47', '2017-08-28 15:26:52'),
(11, 31, 48, 0, NULL, NULL, 1, '2017-08-28 16:48:48', '2017-08-28 16:49:23'),
(12, 1, 62, 0, 0, 0, 1, '2017-09-08 10:05:16', '2018-05-01 10:22:17'),
(13, 1, 64, 1, 0, 0, 1, '2018-01-19 11:43:18', '2018-05-01 10:22:20'),
(14, 1, 66, NULL, 0, 0, 1, '2018-01-19 11:57:10', '2018-05-01 10:22:22'),
(15, 43, 16, 1, NULL, NULL, 1, '2018-02-27 09:47:08', NULL),
(16, 43, 67, 0, NULL, NULL, 1, '2018-02-27 10:01:55', '2018-02-27 10:05:52'),
(17, 43, 45, 1, NULL, NULL, 1, '2018-03-07 22:58:42', NULL),
(18, 1, 79, 0, 0, 0, 1, '2018-03-21 08:52:20', '2018-05-01 10:22:25'),
(19, 1, 81, 1, NULL, NULL, 1, '2018-10-19 02:36:04', '2018-10-19 02:36:13'),
(20, 1, 80, 1, NULL, NULL, 1, '2018-10-19 20:43:49', NULL),
(21, 1, 82, 1, NULL, NULL, 1, '2018-10-19 21:00:44', NULL),
(22, 103, 85, 0, 1, 3, 1, '2018-12-17 15:10:38', '2018-12-17 16:00:52'),
(23, 103, 96, 1, 1, 1, 1, '2018-12-17 15:37:25', '2018-12-17 15:59:20'),
(24, 103, 84, NULL, 1, 1, 1, '2018-12-20 11:48:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bop_selected_users`
--

CREATE TABLE `bop_selected_users` (
  `bop_sel_id` int(10) NOT NULL,
  `bop_sel_sub_id` int(10) DEFAULT NULL,
  `bop_sel_name` varchar(200) DEFAULT NULL,
  `bop_sel_email` varchar(200) DEFAULT NULL,
  `bop_sel_temp_id` int(5) DEFAULT NULL,
  `bop_sel_status` tinyint(5) DEFAULT NULL,
  `bop_sel_created_at` datetime DEFAULT NULL,
  `bop_sel_updatedat` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bop_settings`
--

CREATE TABLE `bop_settings` (
  `se_id` int(11) NOT NULL,
  `se_email` varchar(120) DEFAULT NULL,
  `se_createdat` datetime DEFAULT NULL,
  `se_modifiedat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_settings`
--

INSERT INTO `bop_settings` (`se_id`, `se_email`, `se_createdat`, `se_modifiedat`) VALUES
(1, 'info@coinenthu.com', '2017-05-18 00:51:54', '2018-02-26 12:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `bop_slider_banners`
--

CREATE TABLE `bop_slider_banners` (
  `sb_id` int(11) NOT NULL,
  `sb_ct_id` int(11) DEFAULT NULL,
  `sb_imagename` varchar(150) DEFAULT NULL,
  `sb_link` varchar(200) DEFAULT NULL,
  `sb_isslider_isbanner` tinyint(3) DEFAULT '1',
  `sb_status` tinyint(2) DEFAULT NULL,
  `sb_createdat` datetime DEFAULT NULL,
  `sb_updadtedat` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_slider_banners`
--

INSERT INTO `bop_slider_banners` (`sb_id`, `sb_ct_id`, `sb_imagename`, `sb_link`, `sb_isslider_isbanner`, `sb_status`, `sb_createdat`, `sb_updadtedat`) VALUES
(1, 1, '20170807_124548.jpg', 'www.facebook.com', 1, 2, '2017-08-07 12:28:15', '2017-08-07 16:53:30'),
(2, 1, '20170807_122841.jpg', 'www.googlecom', 1, 2, '2017-08-07 12:28:41', '2017-08-18 14:53:55'),
(3, 1, '20170807_123002.png', 'www.facebook.com', 1, 2, '2017-08-07 12:30:02', '2017-08-18 14:54:02'),
(4, 2, '20170807_123033.jpg', 'www.facebook.com', 1, 2, '2017-08-07 12:30:33', '2017-08-18 14:54:17'),
(5, 1, '20170807_171136.png', 'www.aapthitech.com', 1, 2, '2017-08-07 12:41:09', '2017-08-18 14:54:06'),
(6, 2, '20170807_124151.png', 'www.google.com', 1, 2, '2017-08-07 12:41:51', '2017-08-18 14:54:29'),
(7, 1, '20170807_151509.jpg', '', 1, 2, '2017-08-07 15:15:09', '2017-08-07 16:52:21'),
(8, 1, '20170807_161926.jpg', 'www.facebook.com', 1, 2, '2017-08-07 16:19:26', '2017-08-07 16:51:36'),
(9, 1, '20170807_162611.png', 'http://aapthitech.com', 1, 2, '2017-08-07 16:26:11', '2017-08-18 14:54:10'),
(10, 2, '20170807_171222.png', 'http://sathyamtechno.com', 1, 2, '2017-08-07 17:12:22', '2017-08-18 14:54:34'),
(11, 2, '20170807_185350.jpg', 'www.google.com', 1, 2, '2017-08-07 18:53:50', '2017-08-18 14:53:50'),
(12, 1, '20170808_110431.png', 'http://sathyam.com', 1, 2, '2017-08-08 11:04:32', '2017-08-08 11:05:52'),
(13, 2, '20170818_145450.jpg', 'google.com', 1, 2, '2017-08-18 14:50:33', '2018-05-01 10:25:36'),
(14, 2, '20170818_145530.jpg', 'google.com', 1, 2, '2017-08-18 14:51:00', '2018-05-01 10:25:41'),
(15, 1, '20170818_145619.jpg', 'http://www.google.com', 1, 2, '2017-08-18 14:56:19', '2018-05-01 10:25:22'),
(16, 1, '20170818_145647.jpg', 'www.google.com', 1, 2, '2017-08-18 14:56:47', '2018-05-01 10:25:26'),
(17, 3, '20170908_101745.jpg', 'www.google.com', 1, 2, '2017-09-08 10:17:45', '2018-05-01 10:25:47'),
(18, 3, '20170908_101809.jpg', 'www.google.com', 1, 2, '2017-09-08 10:18:09', '2018-05-01 10:25:51'),
(19, 1, '20170919_090552.jpg', 'aapthitech.com', 1, 2, '2017-09-19 09:05:52', '2018-05-01 10:25:30'),
(20, 1, '20180420_111155.jpg', 'https://www.bostonblockchainweek.com', 1, 2, '2018-04-20 11:11:55', '2018-10-30 09:45:46'),
(21, 1, '20180420_111247.jpg', 'https://www.coindesk.com/events/consensus-2018/', 1, 2, '2018-04-20 11:12:47', '2018-10-30 09:45:55'),
(22, 1, '20180420_111334.jpg', 'https://www.cryptovalleyconference.com', 1, 2, '2018-04-20 11:13:34', '2018-10-30 09:45:59'),
(23, 2, '20180420_112543.jpg', 'https://www.bostonblockchainweek.com', 1, 2, '2018-04-20 11:25:43', '2018-10-30 09:46:11'),
(24, 2, '20180420_112604.jpg', 'https://www.coindesk.com/events/consensus-2018/', 1, 2, '2018-04-20 11:26:04', '2018-10-30 09:46:17'),
(25, 2, '20180420_112624.jpg', 'https://www.cryptovalleyconference.com', 1, 2, '2018-04-20 11:26:24', '2018-10-30 09:46:22'),
(26, 1, '20180501_103235.jpeg', 'https://www.abcsummit.com/', 1, 2, '2018-05-01 10:32:35', '2018-10-30 09:46:03'),
(27, 2, '20180501_103252.jpeg', 'https://www.abcsummit.com/', 1, 2, '2018-05-01 10:32:52', '2018-10-30 09:46:27'),
(28, 1, '20181030_094257.jpg', 'https://worldcryptocon.com/', 1, 1, '2018-10-30 09:42:57', '2018-10-30 09:42:57'),
(29, 1, '20181030_094322.png', 'https://blockchainventuresummit.com/', 1, 1, '2018-10-30 09:43:22', '2018-10-30 09:43:22'),
(30, 1, '20181030_094340.jpg', 'https://blockchain-expo.com/northamerica/', 1, 1, '2018-10-30 09:43:40', '2018-10-30 09:43:40'),
(31, 2, '20181030_094403.jpg', 'https://worldcryptocon.com/', 1, 1, '2018-10-30 09:44:03', '2018-10-30 09:44:03'),
(32, 2, '20181030_094422.png', 'https://blockchainventuresummit.com/', 1, 1, '2018-10-30 09:44:22', '2018-10-30 09:44:22'),
(33, 2, '20181030_094439.jpg', 'https://blockchain-expo.com/northamerica/', 1, 1, '2018-10-30 09:44:39', '2018-10-30 09:44:39'),
(34, 3, '20181030_094500.jpg', 'https://worldcryptocon.com/', 1, 1, '2018-10-30 09:45:00', '2018-10-30 09:45:00'),
(35, 3, '20181030_094519.png', 'https://blockchainventuresummit.com/', 1, 1, '2018-10-30 09:45:19', '2018-10-30 09:45:19'),
(36, 3, '20181030_094538.jpg', 'https://blockchain-expo.com/northamerica/', 1, 1, '2018-10-30 09:45:38', '2018-10-30 09:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `bop_social_providers`
--

CREATE TABLE `bop_social_providers` (
  `sp_id` int(11) NOT NULL,
  `sp_suid` varchar(200) DEFAULT NULL,
  `sp_uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_social_providers`
--

INSERT INTO `bop_social_providers` (`sp_id`, `sp_suid`, `sp_uid`) VALUES
(9, '108541511052447319432', 51),
(10, '156759378226269', 57),
(15, '105900391794211683810', 73),
(24, '110216179880575166831', 94);

-- --------------------------------------------------------

--
-- Table structure for table `bop_subscribe`
--

CREATE TABLE `bop_subscribe` (
  `bop_sub_id` int(10) NOT NULL,
  `bop_sub_name` varchar(200) DEFAULT NULL,
  `bop_sub_email` varchar(200) DEFAULT NULL,
  `bop_sub_created_at` datetime DEFAULT NULL,
  `bop_sub_updated_at` datetime DEFAULT NULL,
  `bop_sub_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_subscribe`
--

INSERT INTO `bop_subscribe` (`bop_sub_id`, `bop_sub_name`, `bop_sub_email`, `bop_sub_created_at`, `bop_sub_updated_at`, `bop_sub_status`) VALUES
(1, NULL, 'teja4247@gmail.com', '2018-10-19 20:53:28', '2018-10-19 20:53:28', 1),
(2, NULL, 'Coinenthu@gmail.com', '2018-10-26 03:47:09', '2018-10-26 03:47:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bop_templates`
--

CREATE TABLE `bop_templates` (
  `bop_temp_id` int(10) NOT NULL,
  `bop_temp_desc` text,
  `bop_temp_status` tinyint(4) DEFAULT NULL,
  `bop_created_at` datetime DEFAULT NULL,
  `bop_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bop_top_companies`
--

CREATE TABLE `bop_top_companies` (
  `tcm_id` int(11) NOT NULL,
  `tcm_cmid` int(11) DEFAULT NULL,
  `tcm_status` tinyint(4) DEFAULT NULL,
  `tcm_createdat` datetime DEFAULT NULL,
  `tcm_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_top_companies`
--

INSERT INTO `bop_top_companies` (`tcm_id`, `tcm_cmid`, `tcm_status`, `tcm_createdat`, `tcm_modified`) VALUES
(17, 11, 1, '2017-06-13 00:42:44', NULL),
(30, 14, 1, '2017-07-17 03:50:30', NULL),
(31, 15, 1, '2017-07-17 03:51:40', NULL),
(32, 16, 1, '2017-07-17 03:51:44', NULL),
(33, 18, 1, '2017-07-17 03:51:48', NULL),
(34, 76, 1, '2017-07-17 03:51:58', NULL),
(35, 77, 1, '2017-07-17 03:51:58', NULL),
(36, 53, 1, '2017-07-17 03:52:52', NULL),
(37, 52, 1, '2017-07-17 03:52:52', NULL),
(38, 50, 1, '2017-07-17 03:52:52', NULL),
(39, 48, 1, '2017-07-17 03:52:52', NULL),
(41, 56, 1, '2017-07-17 03:53:28', NULL),
(42, 57, 1, '2017-07-17 03:53:28', NULL),
(43, 58, 1, '2017-07-17 03:53:28', NULL),
(44, 59, 1, '2017-07-17 03:53:28', NULL),
(45, 1, 1, '2017-08-08 16:43:19', NULL),
(46, 3, 1, '2017-08-08 16:43:23', NULL),
(47, 4, 1, '2017-08-08 16:43:27', NULL),
(48, 7, 1, '2017-08-08 16:43:31', NULL),
(49, 6, 1, '2017-08-08 16:43:35', NULL),
(50, 17, 1, '2017-08-08 16:43:38', NULL),
(51, 19, 1, '2017-08-08 16:43:43', NULL),
(52, 2, 1, '2017-08-08 16:43:47', NULL),
(53, 5, 1, '2017-08-08 16:43:51', NULL),
(54, 46, 1, '2017-08-13 08:57:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bop_users`
--

CREATE TABLE `bop_users` (
  `u_uid` int(11) NOT NULL,
  `u_ut_id` int(11) DEFAULT NULL,
  `u_firstname` varchar(50) DEFAULT NULL,
  `u_lastname` varchar(50) DEFAULT NULL,
  `u_username` varchar(50) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_password` varchar(150) DEFAULT NULL,
  `u_mobile` varchar(70) DEFAULT NULL,
  `u_picture` varchar(200) DEFAULT NULL,
  `u_social_pic` varchar(250) DEFAULT NULL,
  `u_logged_from` varchar(150) DEFAULT 'Normal',
  `u_status` tinyint(4) DEFAULT NULL,
  `u_createdat` datetime DEFAULT NULL,
  `u_modifiedat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_users`
--

INSERT INTO `bop_users` (`u_uid`, `u_ut_id`, `u_firstname`, `u_lastname`, `u_username`, `u_email`, `u_password`, `u_mobile`, `u_picture`, `u_social_pic`, `u_logged_from`, `u_status`, `u_createdat`, `u_modifiedat`) VALUES
(1, 1, 'Dileep', 'Kumar', 'Dileep', 'info@aapthitech.com', 'b59c67bf196a4758191e42f76670ceba', '8500222765', 'users_20181030_044643.png', NULL, 'Normal', 1, '2017-05-16 20:14:11', '2018-10-30 04:46:46'),
(92, 2, 'poornimasancheti', '', 'poornimasancheti', 'poornimasancheti93@gmail.com', '495cc2c98b484d96d4db31b84243a2c1', NULL, '', NULL, 'Normal', 1, '2018-10-12 22:15:24', '2018-10-28 09:26:18'),
(93, 2, 'teja4247', NULL, 'teja4247', 'teja4247@gmail.com', '816a37c4ef2716fb60ebe5b5f69e7331', NULL, NULL, NULL, 'Normal', 1, '2018-10-16 23:25:21', '2018-11-06 08:44:30'),
(94, 2, 'Teja', 'Mullapudi', NULL, 'teja3333@gmail.com', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/-9kdD2bqkI2U/AAAAAAAAAAI/AAAAAAAAICE/2-JB_cuR60c/photo.jpg', 'gmailLogin', 1, '2018-10-19 02:54:22', '2018-10-19 02:54:22'),
(95, 2, 'sarah', NULL, 'sarah', 'sarahkat2005@yahoo.com', '952f69c9ddb085d834bc9607ce4a8cc2', NULL, NULL, NULL, 'Normal', 0, '2018-10-19 05:12:23', '2018-10-19 05:12:23'),
(96, 2, 'pavanyur', NULL, 'pavanyur', 'pavanyur@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', NULL, NULL, NULL, 'Normal', 1, '2018-10-20 13:14:45', '2018-10-20 13:30:22'),
(97, 1, 'coinenthu', '', 'coinenthu', 'coinenthu@gmail.com', '816a37c4ef2716fb60ebe5b5f69e7331', NULL, '', NULL, 'Normal', 1, '2018-10-24 22:03:52', '2018-11-06 08:42:57'),
(98, 2, 'ABHILASHA_LODHA', NULL, 'ABHILASHA_LODHA', 'abhilashalodha0101@gmail.com', 'ae8ce2744f69a8c8dea2484b51475cdc', NULL, NULL, NULL, 'Normal', 1, '2018-10-29 18:48:07', '2018-10-29 18:49:32'),
(99, 2, 'Coinenthu1', NULL, 'Coinenthu1', 'coinenthu11334@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, 'Normal', 0, '2018-11-10 02:31:30', '2018-11-10 02:31:30'),
(100, 2, 'DecredGuy', NULL, 'DecredGuy', 'teja3333@yahoo.com', '816a37c4ef2716fb60ebe5b5f69e7331', NULL, NULL, NULL, 'Normal', 0, '2018-11-15 02:05:59', '2018-11-15 02:05:59'),
(101, 2, 'Sam', NULL, 'Sam', 'schowdary55@gmail.com', '816a37c4ef2716fb60ebe5b5f69e7331', NULL, NULL, NULL, 'Normal', 0, '2018-11-15 02:17:12', '2018-11-15 02:17:12'),
(102, 2, 'John', NULL, 'John', 'mschowdary55@gmail.com', '816a37c4ef2716fb60ebe5b5f69e7331', NULL, NULL, NULL, 'Normal', 1, '2018-11-15 02:49:01', '2018-11-15 02:49:32'),
(103, 2, 'vibhor08', '', 'vibhor08', 'vibhor.upreti@gmail.com', 'b59c67bf196a4758191e42f76670ceba', NULL, 'users_20181220_195554.png', NULL, 'Normal', 1, '2018-12-17 15:03:24', '2018-12-20 19:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `bop_usertypes`
--

CREATE TABLE `bop_usertypes` (
  `ut_id` int(11) NOT NULL,
  `ut_name` varchar(50) DEFAULT NULL,
  `ut_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bop_usertypes`
--

INSERT INTO `bop_usertypes` (`ut_id`, `ut_name`, `ut_status`) VALUES
(1, 'Admin', 1),
(2, 'User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bop_careers`
--
ALTER TABLE `bop_careers`
  ADD PRIMARY KEY (`bop_job_id`);

--
-- Indexes for table `bop_compaines`
--
ALTER TABLE `bop_compaines`
  ADD PRIMARY KEY (`cm_id`);
ALTER TABLE `bop_compaines` ADD FULLTEXT KEY `cm_name` (`cm_name`,`cm_decript`);

--
-- Indexes for table `bop_company_advisoryteam`
--
ALTER TABLE `bop_company_advisoryteam`
  ADD PRIMARY KEY (`adt_id`);

--
-- Indexes for table `bop_company_coreteam`
--
ALTER TABLE `bop_company_coreteam`
  ADD PRIMARY KEY (`cot_id`);

--
-- Indexes for table `bop_company_milestones`
--
ALTER TABLE `bop_company_milestones`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `bop_company_milestone_status`
--
ALTER TABLE `bop_company_milestone_status`
  ADD PRIMARY KEY (`mss_id`);

--
-- Indexes for table `bop_company_portfolio`
--
ALTER TABLE `bop_company_portfolio`
  ADD PRIMARY KEY (`cp_id`);

--
-- Indexes for table `bop_company_resources`
--
ALTER TABLE `bop_company_resources`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `bop_company_reviews`
--
ALTER TABLE `bop_company_reviews`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `bop_company_review_replies`
--
ALTER TABLE `bop_company_review_replies`
  ADD PRIMARY KEY (`crr_id`);

--
-- Indexes for table `bop_company_tradingexchanges`
--
ALTER TABLE `bop_company_tradingexchanges`
  ADD PRIMARY KEY (`te_id`);

--
-- Indexes for table `bop_company_type`
--
ALTER TABLE `bop_company_type`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `bop_company_views`
--
ALTER TABLE `bop_company_views`
  ADD PRIMARY KEY (`cmv_id`);

--
-- Indexes for table `bop_countries`
--
ALTER TABLE `bop_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bop_escrow_details`
--
ALTER TABLE `bop_escrow_details`
  ADD PRIMARY KEY (`ed_id`);

--
-- Indexes for table `bop_forgot_tokens`
--
ALTER TABLE `bop_forgot_tokens`
  ADD PRIMARY KEY (`ft_id`);

--
-- Indexes for table `bop_replies_reponses`
--
ALTER TABLE `bop_replies_reponses`
  ADD PRIMARY KEY (`rrr_id`);

--
-- Indexes for table `bop_review_reponses`
--
ALTER TABLE `bop_review_reponses`
  ADD PRIMARY KEY (`rr_id`);

--
-- Indexes for table `bop_selected_users`
--
ALTER TABLE `bop_selected_users`
  ADD PRIMARY KEY (`bop_sel_id`);

--
-- Indexes for table `bop_settings`
--
ALTER TABLE `bop_settings`
  ADD PRIMARY KEY (`se_id`);

--
-- Indexes for table `bop_slider_banners`
--
ALTER TABLE `bop_slider_banners`
  ADD PRIMARY KEY (`sb_id`);

--
-- Indexes for table `bop_social_providers`
--
ALTER TABLE `bop_social_providers`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `bop_subscribe`
--
ALTER TABLE `bop_subscribe`
  ADD PRIMARY KEY (`bop_sub_id`);

--
-- Indexes for table `bop_templates`
--
ALTER TABLE `bop_templates`
  ADD PRIMARY KEY (`bop_temp_id`);

--
-- Indexes for table `bop_top_companies`
--
ALTER TABLE `bop_top_companies`
  ADD PRIMARY KEY (`tcm_id`);

--
-- Indexes for table `bop_users`
--
ALTER TABLE `bop_users`
  ADD PRIMARY KEY (`u_uid`);

--
-- Indexes for table `bop_usertypes`
--
ALTER TABLE `bop_usertypes`
  ADD PRIMARY KEY (`ut_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bop_careers`
--
ALTER TABLE `bop_careers`
  MODIFY `bop_job_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bop_compaines`
--
ALTER TABLE `bop_compaines`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;

--
-- AUTO_INCREMENT for table `bop_company_advisoryteam`
--
ALTER TABLE `bop_company_advisoryteam`
  MODIFY `adt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1304;

--
-- AUTO_INCREMENT for table `bop_company_coreteam`
--
ALTER TABLE `bop_company_coreteam`
  MODIFY `cot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1350;

--
-- AUTO_INCREMENT for table `bop_company_milestones`
--
ALTER TABLE `bop_company_milestones`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

--
-- AUTO_INCREMENT for table `bop_company_milestone_status`
--
ALTER TABLE `bop_company_milestone_status`
  MODIFY `mss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bop_company_portfolio`
--
ALTER TABLE `bop_company_portfolio`
  MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `bop_company_resources`
--
ALTER TABLE `bop_company_resources`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=478;

--
-- AUTO_INCREMENT for table `bop_company_reviews`
--
ALTER TABLE `bop_company_reviews`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `bop_company_review_replies`
--
ALTER TABLE `bop_company_review_replies`
  MODIFY `crr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bop_company_tradingexchanges`
--
ALTER TABLE `bop_company_tradingexchanges`
  MODIFY `te_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=733;

--
-- AUTO_INCREMENT for table `bop_company_type`
--
ALTER TABLE `bop_company_type`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bop_company_views`
--
ALTER TABLE `bop_company_views`
  MODIFY `cmv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bop_countries`
--
ALTER TABLE `bop_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `bop_escrow_details`
--
ALTER TABLE `bop_escrow_details`
  MODIFY `ed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `bop_forgot_tokens`
--
ALTER TABLE `bop_forgot_tokens`
  MODIFY `ft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bop_replies_reponses`
--
ALTER TABLE `bop_replies_reponses`
  MODIFY `rrr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bop_review_reponses`
--
ALTER TABLE `bop_review_reponses`
  MODIFY `rr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bop_selected_users`
--
ALTER TABLE `bop_selected_users`
  MODIFY `bop_sel_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bop_settings`
--
ALTER TABLE `bop_settings`
  MODIFY `se_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bop_slider_banners`
--
ALTER TABLE `bop_slider_banners`
  MODIFY `sb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `bop_social_providers`
--
ALTER TABLE `bop_social_providers`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bop_subscribe`
--
ALTER TABLE `bop_subscribe`
  MODIFY `bop_sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bop_templates`
--
ALTER TABLE `bop_templates`
  MODIFY `bop_temp_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bop_top_companies`
--
ALTER TABLE `bop_top_companies`
  MODIFY `tcm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `bop_users`
--
ALTER TABLE `bop_users`
  MODIFY `u_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `bop_usertypes`
--
ALTER TABLE `bop_usertypes`
  MODIFY `ut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
