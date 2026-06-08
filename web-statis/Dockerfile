# Kita gunakan web server nginx sebagai base image 
FROM nginx:alpine

#Kita copy file html dan gambar ke dalam folder html di nginx
COPY portfolio_khadik.html /usr/share/nginx/html/index.html
COPY kopet.jpg /usr/share/nginx/html/kopet.jpg

#kita expose port 80 untuk mengakses web server nginx
EXPOSE 80
