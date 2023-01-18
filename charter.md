# Project AEDES Charter

## What is Project AEDES?

Advanced Early Dengue Prediction and Exploration Service (AEDES) aims to improve public health response against dengue in the Philippines by predicting dengue cases from climate and digital data and pinpointing possible hotspots from satellite data.

Effective: September 1, 2022
Last Updated: January 18, 2023

## Internal Team (AEDES Team)

|                :Roles:               |                       :Internal Team:                         |
|--------------------------------------|---------------------------------------------------------------|
|   :Executive                         |   :Chief Technology Officer                                   |
|   :Engineering                       |   :Data Engineer, Machine Learning Analyst, Geospatial Analyst|
|   :Community, design, and marketing  |   :Community Manager                                          |
|   :External Partners                 |   :Research Collaborators, Bike Scouts, and Health Offices    |
|                                      |   :(Zamboanga)                                                |

## Primary Stakeholders

|   :DOST R4   |   :Actual   |   :Department of Science and Technology   |
|   :Mosquito RealTime Census Project   |   :Actual   |   :Dengue Monitoring Advocacy Group   |
|   :Dr. Thaddeus Carvajal   |   :Actual   |   :Focus on vector biology, ecology & control of mosquitoes   |
|   :Dr. Michael Promentilla   |   :Actual   |   :Decision and Risk Analysis   |
|   :BARMM Ministry of Health   |   :Potential   |   :Monitoring of epidemic   |
|   :Ateneo de Zamboanga   |   :Potential   |   :Philippine Pediatric Society – Southwestern Mindanao Chapter   |
|   :Bike Scouts Philippines   |   :Potential   |   :Validation purposes   |

## Vision

Company: Cirrolytix was formed to achieve social impact through big data.  AEDES Labs aims to achieve a sustainable future for humanity by advancing innovations in risk management 

## Mission

- Improve risk identification and mitigation through 4IR technologies such as big data, AI, robotics, and IoT
- Through big data, enhance root cause analysis, design, planning, and monitoring to achieve positive outcomes and minimize harms to humanity
- Empower sustainable risk interventions towards quantifiable impacts to society

## Commitment Statement to the Open Source community

We aim to empower experts, enthusiasts, and even beginners from any backgrounds to contribute to reducing inequalities in health through code, dialogue, and ethical use of data for the benefit of the society. This platform is created to bring people together in a community that fosters innovation, technology, and social development. Join us as we democratize data and push the limits of innovation to create a better life and to sustain the future of humanity.

## Licensing Approach / Intellectual Property Policy

All contributions to implementation-agnostic metrics and standards, including associated scripts, SQL statements, and documentation, will be received and made available under the [MIT License](https://github.com/Cirrolytix/aedes_dpg/blob/main/LICENSE) and [Creative Commons Attribution Share Alike 4.0 International](https://github.com/Cirrolytix/aedes_dpg/blob/main/CC%20BY-SA%204.0.md).

## Code of Conduct

Our Project will operate in a transparent, open, collaborative, and ethical manner at all times. The output of all Project discussions, proposals, timelines, decisions, and status will be made open and easily visible to all.

To foster an open, welcoming, contributory environment you must adhere to the following practices:
- You may not post or link to content that is threatening, abusive, defamatory, libelous, derogatory, violent, harassing, bigoted, hateful, profane, obscene, lewd, lascivious, pornographic or otherwise objectionable, that gives rise to civil or criminal liability, or otherwise violates any applicable law
- You may not intentionally make false or misleading statements
- You may not offer to sell or buy any product or service
- You may not post material that infringes any copyright, trademark, patent, trade secret, right of privacy or right of publicity
- You may not disclose confidential information
- You may not disclose information that you do not lawfully possess
- You may not post, link to, upload or transmit software or other materials that contain viruses, worms, time bombs, Trojan horses, or other harmful or disruptive components 
- You may not restrict or inhibit any other user from using or enjoying this Website, for example, by cracking, spoofing, defacing, or impairing functionality
- You may not post political campaign materials, chain letters, mass mailings or spam
- You are solely responsible for the content You provide. 

Cirrolytix has the right, but not the duty, to pre-screen, refuse, edit, move or remove any content that violates these Terms of Use or that is unlawful. Cirrolytix may close comments if, in its sole discretion, the comments are no longer on topic, the commenting has devolved to personal attacks, or the Hitler card is played. Cirrolytix further has the right to limit or terminate Your registration with, or access to, the Website (which may include termination of access by anyone at your IP address) for breach of these Terms or Use or for conduct that, in Cirrolytix's sole discretion, subjects Cirrolytix to unreasonable legal risk

## Trademark Identification

The trademarks, logos and service marks ("Marks") displayed on this Website are the property of Cirrolytix or other parties. You may not use Cirrolytix or any confusingly similar mark as a trademark for your product or services, or use the trademark in any other manner that might cause confusion in the marketplace, including but not limited to in advertising, on auction sites, or on software or hardware. Cirrolytix does not claim any exclusive right to use the phrase "open source."

## Sustainable Governance
1. Cirrolytix Project AEDES Team (“AEDES Team”) shall be responsible for the overall management and oversight of the solution.
2. AEDES Team will set the standards and responsibilities that the community shall adhere to in the spirit of developing the application
3. Roles:
	a. Contributors: external contributors of code, use cases, and dialogue related to the project;
	b. Maintainers: shall be the responsibility of the AEDES Team in the interim until the Project has been productionized.
4. AEDES Team will establish the workflow procedures for maintaining and revising the Project, the community, and the roles as it sees fit.
5. AEDES Team shall also be responsible for:
	a. Setting and coordinating the vision of the Project;
	b. Establishing guidelines and policies for the maintenance and releases of the Project;
	c. Establishing policies for its licensing;
	d. Reviewing and approving the technical and strategic proposals for the Project;
	e. Establishing community standards for contribution and protecting its contributors;
	f. Facilitating the discussions and seeking consensus relating to how the Project should be maintained;
	g. Coordinate any communication efforts and events relating to the Project and projects of Cirrolytix.
6. AEDES Team desires to answer the following questions that will guide the development of the Project to set the tone for the future contributors. See the use-cases.

## Use Cases

- When is the dengue outbreak going to happen?
- Where is the dengue outbreak going to happen?
- What is the outbreak threshold?
- How long will the surge last?
- What are the contributing factors or risk drivers of the outbreak?










## The Problem
Dengue is now at epidemic levels in the Philippines with over 271,000 cases and more than 1,100 deaths as of August 2019. Data on dengue takes time to be manually gathered which hampers the health sector’s ability to deal with the threat. Dengue is spread between infected cases through the Aedes Aegypti mosquito and mosquitoes are known to breed in damp locations and stagnant water pools.

## Our Solution
We propose an automated information portal that correlates dengue cases and deaths with real-time data from climate, google searches, and satellite maps, giving an advance indicator of when dengue will emerge and potential dengue hotspot locations. This portal is accessible publicly but is targeted towards public health and local government agencies to give them advanced notice of dengue outbreaks and help prioritize resources.

The service relies on 3 data sets:

- Satellite Data: Satellite imaging data from [Sentinel Online Copernicus](https://sentinel.esa.int/web/sentinel/sentinel-data-access)
- Local Weather Data: Climate data from [DOST-PAGASA](http://bagong.pagasa.dost.gov.ph/climate/climatological-normals)
- Google Data: [Search trends for 'dengue' and related terms](https://trends.google.com/trends/explore?date=today%205-y&geo=PH&q=dengue)
- Disease Surveillance Data:  Regional cases and deaths data from [Department of Health](https://doh.gov.ph/statistics)

To populate the information portal, we propose 3 models:

- Predict dengue cases from climate and search data
- Predict dengue deaths from dengue cases
- Determine likely dengue hotspots by detecting stagnant water areas from satellite data

By doing this we are addressing 2 key challenges for public health and local government officials:

- Get ahead of the lagged delay of dengue reporting by using real-time information (e.g. climate, searches) to infer if dengue cases and deaths are about to spike.
- Precisely anticipate areas that may be affected by dengue to prioritize health aid, supplies, and proactive fumigation to prevent the outbreaks.

## Local Dependency Set up
**Required**
1. Install dependencies from requirements.txt
2. Browse `/datasets/Consolidated_regions.xlsx` to read or update cases, deaths, google trends, weather, and region data.
3. Run `denguemodel.py` under `/code` to produce the forecast data.
4. Run `selectdata.py` under `/code` to read data from the SQLite Database.
5. To export data, run `exporttocsv.py`.

## Deploy AEDES Portal
1. Download PHP7.
2. Copy `/site` to `htdocs` folder.
3. Browse `localhost/site/index.php` to locally deploy AEDES Portal.

## Documentation

To better understand the process workflow of Project AEDES, please read our [Documentation Wiki Page](https://github.com/Cirrolytix/aedes_dpg/wiki).

## Browse by Topic

[Objectives and Principles](https://github.com/Cirrolytix/aedes_dpg/wiki/Objectives-and-Principles)   
[Architecture Diagrams](https://github.com/Cirrolytix/aedes_dpg/wiki/Architecture-Diagrams)  
[Functional Documentation](https://github.com/Cirrolytix/aedes_dpg/wiki/Functional-Documentation) 


## Awards
Global Award for Best Use of Data, [2019 NASA Space Apps Challenge](https://2019.spaceappschallenge.org/challenges/living-our-world/smash-your-sdgs/teams/aedes-project/project)  
2020 Earth Observation for the Sustainable Development Goals (GEO SDG) Award, [Group on Earth Observations](https://www.earthobservations.org/geo_blog_obs.php?id=472)
Digital Public Good, [UNICEF Philippines, UNICEF Office of Global Innovation, and Digital Public Goods Alliance]
(https://digitalpublicgoods.net/blog/unicef-philippines-announces-its-first-digital-public-good-pathfinding-pilot/)

## Licenses

Project AEDES uses the following open licenses:




## About

Project AEDES is in active development and continously maintained by Cirrolytix Research Services.  


We welcome collaborators. Contact us via email at support@aedesproject.org.

©️ 2019-2021, [Cirrolytix Research Services](https://www.cirrolytix.com/)
