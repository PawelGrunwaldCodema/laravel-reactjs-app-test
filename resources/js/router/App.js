import React, { Component } from "react";
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';

import UserListView from '../components/User/UserListView';
import UserAddView from '../components/User/UserAddView';

class App extends Component {
    render() {
        return (
            <Router>
                <div>
                    <h2>Laravel + React JS</h2>
                    <nav className="navbar navbar-expand-lg navbar-light bg-light">
                        <ul className="navbar-nav mr-auto">
                            <li>
                                <Link to={'/'} className="nav-link">List Users</Link>
                            </li>
                            <li>
                                <Link to={'/user/add'} className="nav-link">Add User</Link>
                            </li>
                        </ul>
                    </nav>
                    <hr />
                    <Routes>
                        <Route exact path='/' element={ <UserListView />} />
                        <Route path='/user/add' element={ <UserAddView /> } />
                    </Routes>
                </div>
            </Router>
        );
    }
}

export default App;
