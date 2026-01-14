# HomeLab 2: Versioning & Deployment Practise by Deploying a PHP Gallery Webpage on a Local Laptop's Resources.
## Introduction
<p align="justify">
In this project, I created a a simple webpage that users can upload photos with description as a journal-like record keeping tool. The main purpose of this project is to learn the versioning + deployment's practise by using Git as the versioning tool and docker as the resource deployment tool. All the resources are from local laptop.
</p>

## Project Objective
<p align="justify">
- To practice simple versioning and deployment's practice by using Git and Docker.
</p>

## Steps and Methodologies
### 1. Develop the Webpage

<p align="center">
  <img width="60%" src="https://github.com/Yong-Wai-Chun/miscellaneous/blob/main/pic/Screenshot%202026-01-08%20105526.png?raw=true">
  <br> Figure 1: Main page and features
</p>
<p align="justify">
Homepage.php will be the default page when the webpage is start-up. ViewPhoto.php will be a feature where the photo is clicked, it will redirect the user to a new page where they can view the photo in detail.
</p>

<p align="center">
  <img width="30%" src="https://github.com/Yong-Wai-Chun/miscellaneous/blob/main/pic/Backend.png?raw=true">
  <br> Figure 2: Backend and Extra-features
</p>
<p align="justify">
Under the configuration folder, the files are backend database communication. Where the details of the attachments uploaded by the users are stored in. As for the coverupload folder, the files are the feature for cover image uploading where users can upload and override the existing cover with the one they want.
</p>

### 2. CICD of the Webpage
Continuous Integration will be using the Git tool for version controlling.
<p align="center">
  <img width="90%" src="https://github.com/Yong-Wai-Chun/miscellaneous/blob/main/pic/Dcokers.png?raw=true">
  <br> Figure 3: Docker Deployment
</p>
<p align="justify">
Continuous Deployment will be using Docker for the main tool. An SQL container is built by pulling the mirrored image. The PHP webpage container is also built with name of gallery-website. All the docker built config is stored in DockerFile.
</p>

### 3. Deployed Result as Shown.
<p align="center">
  <img width="70%" src="https://github.com/Yong-Wai-Chun/miscellaneous/blob/main/pic/webpageFin.png?raw=true">
  <br> Figure 4: Webpage Displayed
</p>
<p align="center">
  <img width="70%" src="https://github.com/Yong-Wai-Chun/miscellaneous/blob/main/pic/Screenshot%202026-01-08%20112706.png?raw=true">
  <br> Figure 5: Upload Image
</p>
<p align="center">
  <img width="70%" src="https://github.com/Yong-Wai-Chun/miscellaneous/blob/main/pic/Screenshot%202026-01-08%20132122.png?raw=true">
  <br> Figure 6: Image Displayed at Homepage
</p>
<p align="center">
  <img width="70%" src="https://github.com/Yong-Wai-Chun/miscellaneous/blob/main/pic/Screenshot%202026-01-08%20132624.png?raw=true">
  <br> Figure 7: Image Detailed Displayed when Clicked
</p>

## Summary and Finding

<p align="justify">
The project is great for learning the version controlling system and also deployment process which is a very crucial part for software development. Git for being a really good open-sourced website for versioning control allows developers to update or rollback the changes of programs. Docker utilizes lightweight containerization allows the program to be deployed seamlessly. 
</p>

## Credit & References

Webpage reference - https://youtube.com/playlist?list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-&si=9KcfTYVfSqlZhID9

Docker - https://docs.docker.com/

<p align="center">
  <img width="40%" src="https://github.com/Yong-Wai-Chun/Python-Maze-Library-Mod/blob/main/components/giphy.gif?raw=true">
</p>
