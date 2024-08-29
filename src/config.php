<?php


class Config{

	const filename_help =  __DIR__. '/help.txt';  

	//crud completo
	const dir_basepath_source =  '/home/ubiagio/Documenti/DocumentazioneLavori/202109_Gruppo4_centroImpiegoRegVeneto/lavorazioni_categoria/laravel_CRUD/crud_master/crud_master3_formForeachField/';  
	//const dir_basepath_target =   '/home/ubiagio/Documenti/DocumentazioneLavori/202109_Gruppo4_centroImpiegoRegVeneto/lavorazioni_categoria/laravel_CRUD/cruds_output/'; 
	const dir_basepath_target =   '/tmp/replace_output/'; 

	//Repositories
	//const dir_basepath_source =  '/home/ubiagio/Documenti/DocumentazioneLavori/202109_Gruppo4_centroImpiegoRegVeneto/lavorazioni_categoria/laravel_CRUD/crud_master/crud_master4_Type1entity/CRUD_{entitynames}/CRUD_{entitynames}_addFiles/app/Repositories/';  
	//const dir_basepath_target =   '/home/ubiagio/Documenti/DocumentazioneLavori/202109_Gruppo4_centroImpiegoRegVeneto/lavorazioni_categoria/laravel_CRUD/cruds_output/app_Repositories/'; 

	//app
	//const dir_basepath_source =  '/home/ubiagio/Documenti/DocumentazioneLavori/202109_Gruppo4_centroImpiegoRegVeneto/lavorazioni_categoria/laravel_CRUD/crud_master/crud_master4_Type1entity/CRUD_{entitynames}/CRUD_{entitynames}_addFiles/app/';  
	//const dir_basepath_target =  '/home/ubiagio/Documenti/DocumentazioneLavori/202109_Gruppo4_centroImpiegoRegVeneto/lavorazioni_categoria/laravel_CRUD/cruds_output/app/'; 

	const filename_placeholders = __DIR__. '/placeholders/placeholders_entityname1.php'; 
}

class ConfigPlaceholders{
	const entityname = 'product';
}
