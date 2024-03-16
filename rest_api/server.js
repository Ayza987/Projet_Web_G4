/*
 *   Copyright (c) 2024 
 *   All rights reserved.
 */
/**
 * @file server.js
 * @description 
 * @author 
 * @copyright 
 */


const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Middleware
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// MySQL Connection
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'bde'
});

connection.connect((err) => {
    if (err) {
        console.error('Error connecting to database: ', err);
        return;
    }
    console.log('Connected to MySQL database.');
});

// Routes

app.get('/produits', (req, res) => {
    connection.query('SELECT * FROM produits', (err, results) => {
        if (err) {
            console.error('Error retrieving products: ', err);
            res.status(500).send('Internal Server Error');
            return;
        }
        res.json(results);
    });
});
app.get('/alimentation', (req, res) => {
    connection.query('SELECT * FROM produits WHERE idCategorie=1', (err, results) => {
        if (err) {
            console.error('Error retrieving products: ', err);
            res.status(500).send('Internal Server Error');
            return;
        }
        res.json(results);
    });
});
app.get('/fournitures', (req, res) => {
    connection.query('SELECT * FROM produits WHERE idCategorie=2', (err, results) => {
        if (err) {
            console.error('Error retrieving products: ', err);
            res.status(500).send('Internal Server Error');
            return;
        }
        res.json(results);
    });
});
app.get('/electronique', (req, res) => {
    connection.query('SELECT * FROM produits WHERE idCategorie=3', (err, results) => {
        if (err) {
            console.error('Error retrieving products: ', err);
            res.status(500).send('Internal Server Error');
            return;
        }
        res.json(results);
    });
});
app.get('/hygiene', (req, res) => {
    connection.query('SELECT * FROM produits WHERE idCategorie=4', (err, results) => {
        if (err) {
            console.error('Error retrieving products: ', err);
            res.status(500).send('Internal Server Error');
            return;
        }
        res.json(results);
    });
});

app.get('/panier', (req, res) => {
    connection.query('SELECT * FROM panier', (err, results) => {
        if (err) {
            console.error('Error retrieving panier: ', err);
            res.status(500).send('Internal Server Error');
            return;
        }
        res.json(results);
    });
});

// Start server
app.listen(port, () => {
    console.log(`Server running on port ${port}`);
});
