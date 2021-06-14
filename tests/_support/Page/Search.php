<?php
namespace Page;

class Search
{
    /**
     * Локатор линка легковых на главной странице
     */
    public static $autoCarsLink = "//*[@data-alias = 'cars']";

    /**
     * Локатор ссылки расширенного поиска
     */
    public static $optionalSearchLink = "//*[@class = 'btn set-optional']";

    /**
     * Локатор поля с выбором типа кузова
     */
    public static $carBodyTypeField = "//*[@data-for = 'auto-car-body']";

    /**
     * Локатор типа кузова седан
     */
    public static $carBodyType = "//*[@data-alias = '%s']";


    /**
     * Локатор кнопки поиска
     */
    public static $searchButton = "//*[@type = 'submit']";
}
