# Project AEDES DPG Repository

## What is Project AEDES?

Advanced Early Dengue Prediction and Exploration Service (AEDES) aims to improve public health response against dengue in the Philippines by predicting dengue cases from climate and digital data and pinpointing possible hotspots from satellite data.

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

## Licenses

Project AEDES uses the following open licenses:

- [MIT License](https://github.com/Cirrolytix/aedes_dpg/blob/main/MIT.md)  
- [Creative Commons Attribution Share Alike 4.0 International](https://github.com/Cirrolytix/aedes_dpg/blob/main/LICENSE)


## About

Project AEDES is in active development and continously maintained by Cirrolytix Research Services.  

Team Members:
- [Dominic Ligot](https://www.linkedin.com/in/docligot/), Chief Technology Officer
- [Mark Toledo](https://www.linkedin.com/in/toledomark/), Solution Architect
- [Claire Tayco](https://www.linkedin.com/in/claire-san-juan-tayco-81361828/), Head of Research and Analytics
- [Rache Melendres](https://www.linkedin.com/in/rachemelendres/), Analytics Consultant
- [Cricket Soong](https://www.linkedin.com/in/cricketeer/), Emerging Technologies Consultant

We welcome collaborators. Contact us via email at support@aedesproject.org.

©️ 2019-2021, [Cirrolytix Research Services](https://www.cirrolytix.com/)
