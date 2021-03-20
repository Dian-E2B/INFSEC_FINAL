

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT -1,
  `product_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL,
  `cart_code` int(11) DEFAULT 0,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=569 DEFAULT CHARSET=utf8mb4;

INSERT INTO cart VALUES("339","-1","1023","1","702001");
INSERT INTO cart VALUES("340","-1","1023","1","702002");
INSERT INTO cart VALUES("341","-1","1023","1","702003");
INSERT INTO cart VALUES("342","-1","1023","1","702004");
INSERT INTO cart VALUES("343","-1","1023","1","702005");
INSERT INTO cart VALUES("344","-1","1011","1","702006");
INSERT INTO cart VALUES("345","100012","1010","1","702007");
INSERT INTO cart VALUES("346","100009","1000","1","702008");
INSERT INTO cart VALUES("347","-1","1012","1","702009");
INSERT INTO cart VALUES("349","-1","1023","1","702010");
INSERT INTO cart VALUES("350","-1","1023","1","702011");
INSERT INTO cart VALUES("351","-1","1023","1","702012");
INSERT INTO cart VALUES("352","-1","1023","1","702013");
INSERT INTO cart VALUES("355","-1","1023","1","702014");
INSERT INTO cart VALUES("356","-1","1023","1","702014");
INSERT INTO cart VALUES("357","100013","1023","1","702015");
INSERT INTO cart VALUES("362","100012","1023","1","702020");
INSERT INTO cart VALUES("363","-1","1011","1","702021");
INSERT INTO cart VALUES("364","-1","1023","1","702022");
INSERT INTO cart VALUES("365","-1","1011","1","702023");
INSERT INTO cart VALUES("367","-1","1023","1","702024");
INSERT INTO cart VALUES("368","100013","1023","1","702025");
INSERT INTO cart VALUES("369","100013","1011","1","702025");
INSERT INTO cart VALUES("370","-1","1023","1","702026");
INSERT INTO cart VALUES("372","-1","1010","1","702027");
INSERT INTO cart VALUES("375","-1","1011","1","702031");
INSERT INTO cart VALUES("383","100013","1011","1","702028");
INSERT INTO cart VALUES("384","100013","1011","1","702029");
INSERT INTO cart VALUES("385","100013","1012","2","702030");
INSERT INTO cart VALUES("415","100011","1023","12","702032");
INSERT INTO cart VALUES("420","-1","1027","2","702033");
INSERT INTO cart VALUES("554","100011","1011","1","702035");
INSERT INTO cart VALUES("557","-1","1023","3","702036");
INSERT INTO cart VALUES("559","-1","1039","5","702034");
INSERT INTO cart VALUES("560","-1","1046","1","702035");
INSERT INTO cart VALUES("561","-1","1038","2","702035");
INSERT INTO cart VALUES("562","100013","1046","3","702036");
INSERT INTO cart VALUES("563","100013","1039","5","702036");
INSERT INTO cart VALUES("567","-1","1043","1","-1");



CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4;

INSERT INTO category VALUES("0","Unclassified item");
INSERT INTO category VALUES("1","Wiring Harnesses");
INSERT INTO category VALUES("2","Sensors");
INSERT INTO category VALUES("13","Gloves");
INSERT INTO category VALUES("14","Helmet");
INSERT INTO category VALUES("15","Tires");
INSERT INTO category VALUES("16","Mirrors");
INSERT INTO category VALUES("20","Cameras");
INSERT INTO category VALUES("67","Windows");
INSERT INTO category VALUES("68","Ignition System");
INSERT INTO category VALUES("69","Gauges and Meters");
INSERT INTO category VALUES("72","Battery");
INSERT INTO category VALUES("74","Audio/video devices");



CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `discount` float(10,2) DEFAULT 0.00,
  `total` float(10,2) NOT NULL,
  `payment_method` varchar(50) DEFAULT 'Cash on Delivery',
  `ordered_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO orders VALUES("702002","-1","","","15.05","60.20","Cash Payment","2020-12-14 13:07:28");
INSERT INTO orders VALUES("702003","-1","","","0.00","75.25","Cash Payment","2020-12-14 13:07:56");
INSERT INTO orders VALUES("702025","100013","","","115.05","529.23","Check Payment","2020-12-14 14:04:19");
INSERT INTO orders VALUES("702026","-1","","","0.00","84.28","Cash Payment","2020-12-14 14:05:23");
INSERT INTO orders VALUES("702027","-1","","","0.00","1450.29","Cash Payment","2020-12-14 14:08:59");
INSERT INTO orders VALUES("702028","100013","+639123789168","Block 1 Lot 4 Talomo Proper, Davao City","0.00","560.00","Cash on Delivery","2020-12-16 00:57:30");
INSERT INTO orders VALUES("702029","100013","+639192791759","Block 1 Lot 4 Talomo Proper, Davao City","0.00","560.00","Cash on Delivery","2020-12-16 01:05:59");
INSERT INTO orders VALUES("702030","100013","+639192791759","Block 12 Lot 12 Matina Aplaya, Davao City","0.00","6289.90","Cash on Delivery","2020-12-16 01:15:26");
INSERT INTO orders VALUES("702033","-1","","","999.37","4597.09","Cash Payment","2020-12-09 01:51:49");
INSERT INTO orders VALUES("702034","-1","","","0.00","252.00","Cash Payment","2021-03-18 22:46:53");
INSERT INTO orders VALUES("702035","100011","","","264.20","1056.80","Cash Payment","2021-03-18 22:52:53");
INSERT INTO orders VALUES("702036","100013","","","0.00","4388.16","Cash Payment","2021-03-18 22:56:39");



CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(65) NOT NULL,
  `description` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(200) NOT NULL,
  `QuantityInStock` int(100) NOT NULL,
  `QuantitySold` int(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `date_added` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1048 DEFAULT CHARSET=utf8mb4;

INSERT INTO products VALUES("1000","Scosche, BTFMA Bluetooth Car Kit, Charging & Aux-I","This Bluetooth FM Transmitter with USB Port for Mobile Devices wirelessly transmits phone calls from your smartphone through your vehicles FM stereo system. It can also be used with non-Bluetooth devices using the included auxiliary cable. You can directly play raw MP3 files by plugging in a SD card or USB drive into the unit. It comes with a convenient remote control to safely switch between radio stations, navigate through MP3 files on a USB/SD card, go to the next or previous track, adjust volume up/down and more. The LCD screen with backlit display permits easy viewing. The unit's flex neck design allows for positioning in multiple viewing angles. A 2.1A USB port allows you to charge your mobile devices while you play music. The unit has 12VDC input and 5V/10 Watt/2.1A output.","2499.12","1987522673.webp","34","2","1","100002","2020-09-16 01:42:02");
INSERT INTO products VALUES("1010","Cup Call Cell Phone Holder Plastic 1 pk","Color: BlueSize: FreeA simple half-helmet.Simple half-helmet with Flames design.Ideal for painted bases.*There is some fading, discoloration, etc. for long-term storage products. Please purchase on a paint basis.*This is a decorative helmet. Please do not wear when riding a motorcycle.","1294.90","1578009472.webp","308","33","1","100003","2020-12-03 01:42:02");
INSERT INTO products VALUES("1011","Warner Brothers Wonder Woman Seat Cover","Officially Licensed Warner Bros. sideless seat cover helps protect seats or disguise old ones. High quality leather-like vinyl. Patented design for the ultimate universal fit. Embroidered logo. Cargo pocket on the back. Head rest cover included. Sold as 1 each.","500.00","373714332.webp","276","72","0","0","2020-04-11 01:42:02");
INSERT INTO products VALUES("1012","Looney Tunes Tweety Steering Wheel CoverTM","Showoff your love for your favorite cartoon with the Looney Tunes Tweety Steering Wheel Cover! This steering wheel cover is designed to fit 14.5â to 15.5â in diameter steering wheels and will fit all cars, trucks and boats. Itâs made of high quality and durable material to ensure comfort and protection against hot and cold extremes while youâre driving. This steering wheel cover can be installed in seconds with no tools required by simply slipping it over your steering wheel. Customize your vehicle with a cartoon classic and pick up the Looney Tunes Tweety Steering Wheel Cover today!","2807.99","557284030.webp","26","25","16","100002","2020-02-22 01:42:02");
INSERT INTO products VALUES("1023","Metra Electronics 70-5520 Wiring Harness for Selec","Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam laborum incidunt voluptatum, reprehenderit molestiae, aspernatur eius error similique vitae temporibus laboriosam unde? Deserunt amet labore eligendi explicabo, possimus fugiat sint?","75.25","280541907.webp","1073","78","2","100003","2020-12-07 07:30:07");
INSERT INTO products VALUES("1027","PAC Audio SNI-1","PAC Audio SNI-1 Signal IsolatorPAC Audio SNI-1
This item ships worldwide.
Please allow up to 7 days for items to ship from our facility.
Electronic appliances may require a converter to work in your country.","2498.42","1038651976.webp","121","2","1","0","2020-12-16 01:21:33");
INSERT INTO products VALUES("1028","Pioneer 20mm 200W Component Dome Tweeter","The Pioneer 20mm 200W Component Dome Tweeter can provide you with the enhanced clarity you want with your stereo system. Because it has high-power handling, it can be used for a wide variety of applications, making it a versatile option. The Pioneer tweeter has an amorphous titanium-coated PPS, giving a durability. It also has a built-in LC network attached at the end of the speaker cable, making it easy to use.","13083.84","966516571.webp","4","0","1","0","2020-12-16 01:37:36");
INSERT INTO products VALUES("1029","Raymarine E22158 SeaTalk 1 to SeaTalk-ng Converter","The SeaTalk 1 to Seatalk-ng converter allows select original SeaTalk 1 devices to interface and communicate on the Raymarine SeaTalk-ng data network. It is compatible with legacy ST40, ST60+, Raystar 125 GPS sensors and LifeTag Wireless Man Overboard Systems. The SeaTalk to SeaTalk-ng Converter kit is a compact solution that connects in-line with the SeaTalk-ng instrument network.","12058.11","1474708327.webp","32","0","14","100004","2020-12-16 01:39:54");
INSERT INTO products VALUES("1030","Garmin 010-11654-06 Marine Mount with Power Cable,","Marine mount, MFG# 010-11654-06, with power cable, for Montana series handheld GPS units.Garmin 010-11654-06 Marine Mount with Power Cable, for Montana Series Handheld GPS","1627.67","2029486873.jpeg","21","0","1","100003","2020-12-16 01:42:02");
INSERT INTO products VALUES("1031","Garmin 010-11078-00 NMEA 2000 - T-Connector","Build or extend your basic NMEA 2000 network on your boat with Garmin's NMEA 2000 T-Connector. Add components to your NMEA 2000 network by installing Garmin's T-connector on your backbone cable. The revised version of this T-connector is offset by 45 degrees compared to the previous version. This product makes plugging devices into your NMEA 2000 network fast and easy.","1627.67","1981118986.webp","233","0","13","100004","2020-12-16 01:43:24");
INSERT INTO products VALUES("1032","Cobra RAD 450 Long Range Radar Detector / Laser De","Cobra Electronics' RAD 450 Radar and Laser Detector keeps drivers aware of their surroundings while protecting them against all radar and laser guns used today. Its Anti-Falsing Circuitry and updateable In-Vehicle Technology filter not only reduces false alerts from blind-spot systems and traffic-flow monitoring devices, but also eliminates erroneous alerts from sources like collision-avoidance systems, so users hear just what they need to hear. The OLED display and VoiceAlert provides intuitive band identification and easy-to-understand alerts for an accurate and informed drive. The RAD 450 comes pre-programmed for both English and Spanish voice and text alerts. Radar detectors are legal in all 50 states except Virginia and Washington, D.C.","2148.64","2089722607.webp","1232","0","2","0","2020-12-16 01:44:28");
INSERT INTO products VALUES("1033","XO Vision X358 7" Single-din In-dash DVD Receiver","The XO Vision 7" Dash Touchscreen DVD Receiver features the latest in car stereo technology. It is DVD/CD/MP3/MP4 compatible for playback of your favorite movies and music on the go. Add up to 30 preset AM/FM stations so you can find exactly the right tunes or talk radio shows to enhance your driving experience. A highly accessible USB port and aux-in on the front panel of this XO Vision DVD player provide a convenient connection for your removable storage devices and MP3 players. Enjoy safer hands-free conversations thanks to the built-in Bluetooth. A subwoofer can be connected to your Bluetooth to further enhance the sound of your calls, music or movies. The viewing window on this 7" touchscreen car DVD receiver is simple to use. It slides out and flips up into a supported position. Reverse camera input is available on the player.","10174.58","1279906803.webp","23","0","2","100002","2020-12-16 01:53:29");
INSERT INTO products VALUES("1034","UNIVERSAL BED X-TENDER AND MOTO X-TENDER, QUICK LA","UNIVERSAL BED X-TENDER AND MOTO X-TENDER, QUICK LATCH BRACKET KIT (UPGRADE)","26442.52","469495505.webp","4","0","1","0","2020-12-16 01:55:05");
INSERT INTO products VALUES("1035","Cerwin Vega 4-Channel Bomber Series Class D Amplif","Cerwin Vega 4-Channel Bomber Series Class D Amplifier 1200W MaxAn ultracompact high-density aluminum alloy chassis keeps the amp light-weight and durable, making it easy to transport to and from the venue.","3080.00","1810567749.webp","12","0","2","100002","2020-12-16 01:56:53");
INSERT INTO products VALUES("1036","CIPA Suction Cup Mirror","This CIPA Suction Cup Mirror is a handy accessory for boats. It's easy to install, requires no tools to use or holes to drill. This boat accessory features a suction cup on the bottom that lets it stick firmly to most non-porous surfaces. Attach it to your marine vehicle so you can see behind you as you pilot it. This CIPA 11050 suction cup marine mirror will not scratch your boat. It features a flexible arm that allows you to fine-tune its placement. The head of this mirror measures 4" x 8". It contains convex glass that allows for viewing at a wide angle. This mirror is printed with the standard message of"Objects in mirror are closer than they appear." It will improve your safety and awareness when going for a ride in your boat. Use this CIPA Suction Cup Mirror for speedboats, fishing boats and more. CIPA Suction Cup Mirror:CIPA Suction Cup Mirror","26233.39","651286615.webp","1","0","0","0","2020-12-16 01:58:10");
INSERT INTO products VALUES("1038","Blaupunkt AMP1504 Car Full-Range Amplifier 1500W 4","The Blaupunkt 1500W 4-Channel, Full-Range Amplifier (AMP1504) embodies over 90 years of innovation and excellence in Blaupunkt products, making it the perfect amplifier to install into your motor vehicle. With an optimized 150-watt RMS output, you can give your music a huge boost in power that will have you and your passengers partying while on the road. This slim amplifier fits perfectly into any trunk so you can easily connect it to your stereo system. Get amped up for the Blaupunkt AMP1504 1500 Watts 4-Channel, Full-Range Amplifier and take your car to the next level. With a Full Range amplifier you not only have the option to run your speakers, but also your subwoofers. You have the control of exactly how much BASS you want to pump out to your subwoofer(s). Efficiency is the name of the game. Put your music into high gear and take off. This amplifier is ideal for your entire audio system.","45.00","1459121066.webp","343","2","20","100008","2021-02-28 23:55:37");
INSERT INTO products VALUES("1039","Bilstein B6 5100 Series Steering Damper","Bilstein 5100 Series Steering Damper Bilstein 5100 Series Steering Stabilizers utilize the same high gas pressure monotube design found in our shock absorbers, offering instantaneous response to suspension inputs. These steering stabilizers feature digressive valving, reducing vibration and wear & tear on steering components. Designed specifically to replace the vehicle's OE stabilizer, for easy installation. (zinc-plated steel body, Triple-C-Technology coating) Features and Benefits:","45.00","708354232.webp","330","13","2","100003","2021-02-28 23:57:48");
INSERT INTO products VALUES("1040","Rola Expandable Cargo Bag, Model # 59102","Always be ready to pack in more when on a trip with this Rola Expandable Cargo Bag. This item is designed to keep camping gear, sports equipment, luggage, food and other items clean and dry. The Rola cargo bag is for use with a hitch-mounted cargo tray, so you can free up valuable interior cargo space in your vehicle for other items. This one accommodates more by expanding from 95 cu ft to 115 cu ft. The Rola bag also has two interior pockets for the smaller items and other valuables you do not want to be mixed up with the rest of the cargo. It is made of durable rain-proof material and is sonically sealed, so you can rest assured that your stuff is safe even when it rains. This item comes in black to easily match with most types and colors of vehicles.Rola Expandable Cargo Bag, Model # 59102","45.00","1398541789.webp","1","0","68","100008","2021-02-28 23:59:17");
INSERT INTO products VALUES("1041","McGard 24210 Chrome Cone Seat Wheel Locks (M14 x 1","Protecting the world’s finest wheels and tires from theft since 1964. McGard manufactures wheel locks in the USA to meet or exceed OEM standards for safety and durability. Presently, McGard is an Original Equipment wheel lock supplier to over 30 car lines around the world. These easy-to-use, one-piece wheel locks function like regular lug nuts, but require a special key tool for installation and removal. The steel collar on the user friendly key guides the key into the lock pattern. The collar holds the key in alignment for easy installation and removal. The computer generated key designs allow for an infinite number of key patterns. The extra narrow pattern groove on the lock resists the intrusion of removal tools into the pattern. Every McGard wheel lock is fully machined from restricted chemistry steel made specifically for McGard and through-hardened for its unsurpassed level of security. McGard’s plating process includes three layers of nickel and one layer of microporous chrome producing a superior finish while protecting against rust. This product may contain globally sourced materials/components.","1.00","906538608.webp","1","0","0","0","2021-03-01 00:02:47");
INSERT INTO products VALUES("1042","Meguiar's Whole Car Air Re-Fresher Odor Eliminator","Has your car lost its “new car” smell? Meguiar's advanced Re-Fresher technology not only removes unwanted odors wherever they hide, but also replaces odors with a pleasant new car scent that lasts for weeks.* Meguiar's Whole Car Air-Re-Fresher penetrates the complete interior by moving through the ventilation system, across the headliner and in-between all other hard-to-reach areas. *Meguiar's Re-Fresher technology permanently removes existing bad odors through chemical bonding at a molecular level.","1.00","225109228.webp","1","0","0","0","2021-03-01 00:02:47");
INSERT INTO products VALUES("1043","Meguiar's Ultimate Waterless Wash & Wax, G3626, 26","Perfect for urban dwellers, those with limited access to water, or the hot rodder who just arrived at a cruise, Ultimate Waterless Wash & Wax safely lifts away dirt and grime while leaving behind a protective layer of hydrophobic wax. In as little as 15 minutes, this new formula can morph a drab and dirty appearance into a stunning, clean and shiny car, without a drop of water. What's more, depending on how dirty the car is, a single bottle, along with the help of a few microfiber towels, can wash and wax up to five average-sized cars. To use this spray, simply mist onto the surface of the vehicle and gently wipe away using a Meguiar's Supreme Shine or other high quality microfiber towel. Wash and Wax Anywhere spray's unique chemistry insures a scratch-free finish when used as directed, as special lubricants and cleaning agents safely loosen and then gently remove the dirt. Follow with a quick wipe from a clean, dry towel and the surface is left with a beautiful, glossy, just-waxed finish. Waterless Wash & Wax is also safe to use on all wheel types, plus rubber, vinyl and glass.","12.00","1906780213.webp","2420","1","13","100007","2021-03-01 00:03:20");
INSERT INTO products VALUES("1044","Garmin eTrex 10 Worldwide Handheld GPS Navigator","The Garmin eTrex 10 GPS 010-00970-00 provides core functionality with a rugged construction. The 2.2" monochrome display is easy to read in any lighting situation. The Garmin GPS has an easy-to-use interface that means you'll spend more time enjoying the outdoors and less time searching for information. It also features a built-in worldwide base map with multiple zoom levels and 500 waypoints with symbols.Garmin 010-00970-00 Golf GPS-HH, eTrex 10, 2.2" Monochrome, No Map:","2.00","1598714497.webp","32","0","68","100005","2021-03-01 00:09:20");
INSERT INTO products VALUES("1045","3M Auto Advanced Headlight Restoration System","Make your car look brand new again, starting with this 3M Auto Advanced Headlight Restoration System. This product is specially designed to give your old lenses an updated and back-to-shiny look. The 3M car care headlight lens restoration kit 39008 requires the use of a drill and a few household items to complete a project. It allows you to sand, refine and polish to restore headlights that have become yellowed over time. Use the 3M Auto Advanced Headlight Restoration System to improve the performance and clarity of lenses that have become cloudy or dull. The package includes discs, a holder, a pad, a rubbing compound and instructions. Include this with your basic automotive supplies to ensure that your vehicle always looks sharp and ready for the road.","213.00","1085159147.jpeg","23","0","0","0","2021-03-01 00:10:12");
INSERT INTO products VALUES("1046","Pyramid® Car Audio Pyramid® Car Audio Tweeter (1")","Pyramid Car Audio TW44 Tweeter (1") This pyramid® car audio tweeter (1") is a high quality tweeters item from our automotive, marine & gps , automotive speakers & amplifiers , speakers, subwoofers & tweeters , tweeters collections . This pyramid® car audio pyramid® car audio tweeter (1") is a great car,tweeters,automotive,marine,gps,automotive,speakers,amplifiers,speakers,subwoofers,tweeters,tweeters item at a reduced price under $20 you can't miss. This item is brand new, unopened and sealed in its original factory box. Its dimensions are 5.20 x 4.60 x 2.80 inches and it weighs 1.96 lbs. This pyramid® car audio pyramid® car audio tweeter (1") is a car tweeters item from our automotive, marine & gps , automotive speakers & amplifiers , speakers, subwoofers & tweeters , tweeters collections which comes with a full satisfaction guarantee.","1231.00","1340051568.webp","8","4","16","100004","2021-03-01 00:10:38");
INSERT INTO products VALUES("1047","Waterfall Eco Dynamic 215/55R17 94 W Tire","Equip a vehicle with the Waterfall Eco Dynamic All-Season Tire for year-round safe, stable driving. It has four generous grooves along the circumference to efficiently channel water, reducing skidding and hydroplaning. More central and lateral grooves with narrow shoulder blocks deliver reliable traction in both wet and dry conditions. With a five-pitch design pattern, this all-season performance tire offers a quiet and comfortable ride. High-rubber construction, a stiff center line and longitudinal ribs maintain stability and a straight path while going down the freeway. The Waterfall tire also has low rolling resistance, improving gas mileage. A black sidewall adds a sleek and stylish look.","123.00","447407350.webp","123","0","72","100020","2021-03-16 19:41:24");



CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100031 DEFAULT CHARSET=utf8mb4;

INSERT INTO supplier VALUES("0","No Supplier","","+639096384610");
INSERT INTO supplier VALUES("100002","Dyjnj auto parts trading","118-A Magsaysay Avenue, Poblacion District, Davao City, 8000 Davao del Sur","+63 (949) 964");
INSERT INTO supplier VALUES("100003","Judith Auto Parts","592 Elpidio Quirino Ave, Poblacion District, Davao City, 8000 Davao del Sur","+63 (955) 963");
INSERT INTO supplier VALUES("100004","EKV Auto Parts","Taiwan, Province Of ChinaVilla Abrille Bldg, Calinan District, Davao City, 8000 Davao del Sur","+63 (965) 064");
INSERT INTO supplier VALUES("100005","Denso Auto Parts","76 R. Magsaysay Ave, Poblacion District, Davao City, 8000 Davao del Sur","+63 (955) 963");
INSERT INTO supplier VALUES("100006","Charles Kent Auto Parts","232 Rosal St., Flores Village, Bangkal, Davao City, 8000 Davao del Sur","+63 (965) 064");
INSERT INTO supplier VALUES("100007","Wellcomeparts Auto & Tire Supply","Door 1, AMSON Building, Lapu-Lapu St, Agdao, Davao City, 8000 Davao del Sur","+63 (947) 639");
INSERT INTO supplier VALUES("100008","Madison Car Accessories","km 7, Orchid St, Talomo, Davao City, 8000 Davao del Sur","+63 (946) 074");
INSERT INTO supplier VALUES("100016","Poly Auto Supply & Hardware","Tulip Drive Corner, Quimpo Boulivard, Ecoland, Davao City, 8000 Davao del Sur","+63 (912) 836");
INSERT INTO supplier VALUES("100017","Tlg Auto Supply","Sta Ana Avenue, Davao City, 8000 Davao del Sur","+63 (921) 663");
INSERT INTO supplier VALUES("100018","Glowing Motor Parts Corportion","Libby Road, Talomo, Davao City, Davao del Sur","+63 (907) 815");
INSERT INTO supplier VALUES("100020","Master Maph Auto Parts","Fronting Long Hua Temple, Cabaguio Ave, Agdao, Davao City, 8000 Davao del Sur","+63 (947) 791");
INSERT INTO supplier VALUES("100024","Dee Soo Cho Auto Parts","Lim Building, Sta. Ana Ave, Poblacion District, Davao City, 8000 Davao del Sur","+63 (900) 011");
INSERT INTO supplier VALUES("100025","B A Auto Parts","127 A. Pichon St, Poblacion District, Davao City, 8000 Davao del Sur","+63 (916) 260");
INSERT INTO supplier VALUES("100029","Canadian Auto Supply, Inc","Door 1-2, YT Bldg, Gempesaw Street, Brgy. 27-C, Davao City, 8000 Davao del Sur","+63 (918) 545");
INSERT INTO supplier VALUES("100030","heh","awts","+63 (912) 378");



CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(128) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `contact` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `attempts` tinyint(4) NOT NULL DEFAULT 0,
  `date_registered` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("-2","AKEMI","GENEROSA","akemi_generosa@gmail.com","ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413","1","","","0","2020-12-16 01:42:02");
INSERT INTO users VALUES("-1","Walk-in","Customer","walkin@xyt.com","ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413","5","","","0","2020-12-01 01:42:02");
INSERT INTO users VALUES("100100","SALUDES MYLEN","MONDEJAR","sm.mondejar@gmail.com","ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413","0","+639096384610","PUROK 25 AZALEA ST. MAA PEPLES VILLAGE, MAA DAVAO CITY","3","2021-03-20 12:41:03");
INSERT INTO users VALUES("100101","INGKAL ROBELYN","MAASAN","ir.maasan@gmail.com","ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413","1","+639460063837","PRK 4 KM 24, BUNAWAN, DAVAO CITY","0","2020-12-16 01:42:02");
INSERT INTO users VALUES("100102","ANDERSON ALEXIE RAE","SARABIA","aa.sarabia@gmail.com","ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413","0","+639506119479","PUROK 32 BLK 1 LOT 19, NHA MAA, DAVAO CITY","0","2020-12-16 01:42:02");
INSERT INTO users VALUES("100103","CONSTANTINO WENDY","PILAPIL","cw.pilapil@gmail.com","ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413","0","+639219348570","PUROK 7, BUNAWAN, DAVAO CITY'","0","2020-12-16 01:42:02");
INSERT INTO users VALUES("100104","LUIS ARGIE","CAMINADE","la.caminade@gmail.com","ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413","1","+639076240441","PUROK 25, MAA PEOPLES VILLAGE, MAA DAVAO CITY","0","2020-12-16 01:42:02");
INSERT INTO users VALUES("100105","MILANA HARVI","SUICO","pamad@gmail.com","ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413","0","+639352127371","BLK 21 LOT 12, PHASE 1, S.I.R., NEW MATINA, DAVAO CITY","3","2021-03-19 06:35:39");

