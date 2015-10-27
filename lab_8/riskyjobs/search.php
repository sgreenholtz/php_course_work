<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Risky Jobs - Search</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <img src="riskyjobs_title.gif" alt="Risky Jobs" />
    <img src="riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right" />
    <h3>Risky Jobs - Search Results</h3>

<?php
    function build_query($user_search, $sort)
    {
        $clean_search = str_replace(', ', ' ', $user_search);
        $search_words = explode(' ', $clean_search);
        $final_search_terms = array();

        if (count($search_words) > 0)
        {
            foreach ($search_words as $word)
            {
                if (!empty($word))
                {
                    array_push($final_search_terms, $word);
                }
            }
        }

        $search_query = "SELECT * FROM riskyjobs WHERE ";
        $where_list = array();

        foreach ($final_search_terms as $word)
        {
            array_push($where_list, "description LIKE '%$word%'");
        }

        if (!empty($where_list))
        {
            $where_string = implode(' OR ', $where_list);
        }

        $search_query .= $where_string;

        switch ($sort)
        {
        case 1:
            $search_query .= " ORDER BY title";
            break;
        case 2:
            $search_query .= " ORDER BY title DESC";
            break;
        case 3:
            $search_query .= " ORDER BY state";
            break;
        case 4:
            $search_query .= " ORDER BY state DESC";
            break;
        case 5:
            $search_query .= " ORDER BY date_posted";
            break;
        case 6:
            $search_query .= " ORDER BY date_posted DESC";
            break;
        default:
            // intentionally left blank
        }

        return $search_query;
    }


    function generate_sort_links($user_search, $sort)
    {
        $sort_links = '';

        switch ($sort)
        {
        case 1:
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] .
                '?usersearch=' . $user_search . '&sort=2">Job Title</a></td><td>Description</td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] .
                '?usersearch=' . $user_search . '&sort=3">State</a></td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] .
                '?usersearch=' . $user_search . '&sort=5">Date Posted</a></td>';
            break;
        case 3:
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] .
                '?usersearch=' . $user_search . '&sort=1">Job Title</a></td><td>Description</td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] .
                '?usersearch=' . $user_search . '&sort=4">State</a></td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] .
                '?usersearch=' . $user_search . '&sort=3">Date Posted</a></td>';
            break;
        case 5:
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] .
                '?usersearch=' . $user_search . '&sort=1">Job Title</a></td><td>Description</td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] .
                '?usersearch=' . $user_search . '&sort=3">State</a></td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] .
                '?usersearch=' . $user_search . '&sort=6">Date Posted</a></td>';
            break;
        default:
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] .
                '?usersearch=' . $user_search . '&sort=1">Job Title</a></td><td>Description</td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] .
                '?usersearch=' . $user_search . '&sort=3">State</a></td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] .
                '?usersearch=' . $user_search . '&sort=5">Date Posted</a></td>';
        }

        return $sort_links;
    }

    function generate_page_links($user_search, $sort, $cur_page, $num_pages)
    {
        $page_links = '';


        if ($cur_page > 1)
        {
            $page_links .= '<a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' .
                $user_search . '&sort=' . $sort . '&page=' . ($cur_page - 1) .
                '"><-</a> ';
        }
        else
        {
            $page_links .= '<- ';
        }


        for ($i = 1; $i <= $num_pages; $i++)
        {
            if ($cur_page == $i)
            {
                $page_links .= ' ' . $i;
            }
            else
            {
                $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] .
                    '?usersearch=' . $user_search . '&sort=' . $sort .
                    '&page=' . $i . '"> ' . $i . '</a>';
            }
        }


        if ($cur_page < $num_pages)
        {
            $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=' . $sort . '&page=' . ($cur_page + 1) . '">-></a>';
        }
        else
        {
            $page_links .= ' ->';
        }

        return $page_links;
    }

    $sort = $_GET['sort'];
    $user_search = $_GET['usersearch'];

    $cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $results_per_page = 5;
    $skip = (($cur_page - 1) * $results_per_page);
?>

    <table border="0" cellpadding="2">

        <tr class="heading">
        <?php echo generate_sort_links($user_search, $sort); ?>
        </tr>

<?php
    require_once('connectvars.php');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $query = build_query($user_search, $sort);
    $result = mysqli_query($dbc, $query);
    $total = mysqli_num_rows($result);
    $num_pages = ceil($total / $results_per_page);

    $query =  $query . " LIMIT $skip, $results_per_page";

    $result = mysqli_query($dbc, $query);
    while ($row = mysqli_fetch_array($result))
    {
    ?>
        <tr class="results">
            <td valign="top" width="20%"><?= $row['title'] ?></td>
            <td valign="top" width="50%"><?= substr($row['description'], 0, 100) ?>...</td>
            <td valign="top" width="10%"><?= $row['state'] ?></td>
            <td valign="top" width="20%"><?= substr($row['date_posted'], 0, 10) ?></td>
        </tr>
    <?php
    }
    ?>
    </table>

<?php
    if ($num_pages > 1)
    {
        echo generate_page_links($user_search, $sort, $cur_page, $num_pages);
    }
    mysqli_close($dbc);
?>

</body>
</html>
