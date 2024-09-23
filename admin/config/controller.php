<?php

// query select data
function query($query)
{
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// create category
function store_category($data)
{
    global $db;

    $title  = sanitize($data['title']);        
    $slug   = sanitize($data['slug']);

    // query dengan prepare statement
    $stmt = $db->prepare("INSERT INTO categories (title, slug) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $slug);
    $stmt->execute();

    return $stmt->affected_rows;
}

// update category
function update_category($data)
{
    global $db;

    $id     = (int)$data['id_category'];
    $title  = sanitize($data['title']);
    $slug   = sanitize($data['slug']);

    $stmt = $db->prepare("UPDATE categories SET title = ?, slug = ? WHERE id_category = ?");
    $stmt->bind_param("ssi", $title, $slug, $id);
    $stmt->execute();

    return $stmt->affected_rows;
}

// delete category
function delete_category($id)
{
    global $db;

    $stmt = $db->prepare("DELETE FROM categories WHERE id_category = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    return $stmt->affected_rows;
}

// store film
function store_film($data)
{
    global $db;

    $url            = sanitize($data['url']);
    $title          = sanitize($data['title']);
    $slug           = sanitize($data['slug']);
    $description    = sanitize($data['description']);
    $release_date   = sanitize($data['release_date']);
    $studio         = sanitize($data['studio']);
    $category_id    = sanitize((int)$data['category_id']);

    $stmt = $db->prepare("INSERT INTO films (url, title, slug, description, release_date, studio, category_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $url, $title, $slug, $description, $release_date, $studio, $category_id);
    $stmt->execute();

    return $stmt->affected_rows;
}

// update film
function update_film($data)
{
    global $db;

    $id             = (int)$data['id_film'];
    $url            = sanitize($data['url']);
    $title          = sanitize($data['title']);
    $slug           = sanitize($data['slug']);
    $description    = sanitize($data['description']);
    $release_date   = sanitize($data['release_date']);
    $studio         = sanitize($data['studio']);
    $category_id    = sanitize((int)$data['category_id']);

    $stmt = $db->prepare("UPDATE films SET url = ?, title = ?, slug = ?, description = ?, release_date = ?, studio = ?, category_id = ? WHERE id_film = ?");
    $stmt->bind_param("ssssssii", $url, $title, $slug, $description, $release_date, $studio, $category_id, $id);
    $stmt->execute();

    return $stmt->affected_rows;
}

// delete film
function delete_film($id)
{
    global $db;

    $stmt = $db->prepare("DELETE FROM films WHERE id_film = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    return $stmt->affected_rows;
}

// store user
function store_user($data)
{
    global $db;

    $username   = sanitize($data['username']);
    $email      = sanitize($data['email']);
    $password   = sanitize(password_hash($data['password'], PASSWORD_DEFAULT));

    // query dengan prepare statement
    $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();

    return $stmt->affected_rows;
}
