##HideForGuest with Hide, Price and Add To Cart Button Extension

##Support: 
version - 2.3.x

##How to install Extension

1. Download the archive file. 
2. Unzip the files 
3. Create a folder path [Magento_Root]/app/code/CHK/HideForGuest 
4. Drop/move the unzipped files

#Enable Extension:
- php bin/magento module:enable CHK_HideForGuest
- php bin/magento setup:upgrade
- php bin/magento cache:clean
- php bin/magento setup:static-content:deploy
- php bin/magento cache:flush

#Disable Extension:
- php bin/magento module:disable CHK_HideForGuest
- php bin/magento setup:upgrade
- php bin/magento cache:clean
- php bin/magento setup:static-content:deploy
- php bin/magento cache:flush
