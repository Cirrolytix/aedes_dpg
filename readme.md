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

## Local Dependency Setup

### Dependencies:

[requirements.txt](https://s3-us-west-2.amazonaws.com/secure.notion-static.com/81b50619-2017-44ca-b06a-7b314d517ba0/requirements.txt)

- python 3.6
- pip
    - matplotlib==3.1.3
    - numpy==1.19.5
    - pandas==1.0.1
    - scikit-learn==0.22.1
    - scipy==1.4.1
    - seaborn==0.10.0
    - statsmodels==0.11.0
- QGIS 3.6 or later
    - SCP plugin

## Local Repository Setup

## Documentation

---

[Documentation Page](https://www.notion.so/Documentation-Page-75d19fad0cf14f7daf12911321acd7c6)

[Explore User Documentation](https://www.notion.so/Explore-User-Documentation-e7f68f79151744babdb292c62c9e36f5) 

[Explore Implementer Documentation](https://www.notion.so/Explore-Implementer-Documentation-554549536cb648cabc4d97dc8b384b85) 

[Explore Updating Datasets](https://www.notion.so/Explore-Updating-Datasets-a68350a2a21043e39217b141838fca2e) 

## Browse by Topic

[Objectives and Principles](https://www.notion.so/Objectives-and-Principles-7141313311104f3facb94de1c3c24267) 

[Architecture Diagrams](https://www.notion.so/Architecture-Diagrams-64b5535acad74d69b703ed784a43ef4b) 

[Functional Documentation](https://www.notion.so/Functional-Documentation-6e26f547a2154368b8a3bf59779ac94e) 

[Model Documentation](https://www.notion.so/Model-Documentation-2a81518fda0846fbba8598e65bc135a1)


# Awards
-  Global Award for Best Use of Data, [2019 NASA Space Apps Challenge](https://2019.spaceappschallenge.org/challenges/living-our-world/smash-your-sdgs/teams/aedes-project/project)
-  2020 Earth Observation for the Sustainable Development Goals (GEO SDG) Award, [Group on Earth Observations](https://www.earthobservations.org/geo_blog_obs.php?id=472)

# Licenses

Project AEDES uses the following open licenses:

[MIT License](https://github.com/Cirrolytix/aedes_dpg/blob/main/MIT.md)

- Open AI Model

[Creative Commons Attribution Share Alike 4.0 International](https://github.com/Cirrolytix/aedes_dpg/blob/main/LICENSE)

- Open Content
- Open Data


# About

Project AEDES is in active development and continously maintained by Cirrolytix Research Services. 
We welcome collaborators. Contact us via email at support@aedesproject.org.

©️ 2019-2021, [Cirrolytix Research Services](https://www.cirrolytix.com/)
